<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Booking;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Paystack;
class BookingController extends Controller
{
    // paystack payment
    public function redirectToGateway(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'checkin_date' => 'required',
            'checkout_date' => 'required',
            'total_adults' => 'required',
            'roomprice' => 'required',
        ]);

        $formData = [
            'email' => request('email'),
            'first_name' => request('firstname'),
            'last_name' => request('lastname'),
            'phone' => request('phone'),
            'amount' => request('amount') * 100,
            'room_id' => request('room_id'),
            'checkin_date' => request('checkin_date'),
            'checkout_date' => request('checkout_date'),
            'total_adults' => request('total_adults'),
            'total_children' => request('total_children'),
            'currency'=> 'NGN'
        ];

        session(['recent_transaction' => $formData]);

        // dd($formData);
        $pay = json_decode($this->initiate_payment($formData));
        if ($pay) {
            if ($pay->status) {
                return redirect($pay->data->authorization_url);
            } else {
                // return back()->withError($pay->message);
                return back()->with('error', $pay->message);
            }
        } else {
            // return back()->withError("No internet connection");
            return back()->with('error', 'No internet connection');
        }
    }

    public function initiate_payment($formData)
    {
        $url = "https://api.paystack.co/transaction/initialize";

        $fields_string = http_build_query($formData);
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer " . env("PAYSTACK_SECRET_KEY"),
            "Cache-Control: no-cache",
        ));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
    public function verify_payment($reference)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . env("PAYSTACK_SECRET_KEY"),
                "Cache-Control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        return  $response;
    }


    public function handleGatewayCallback(Request $request)
    {
        $paymentDetails = Paystack::getPaymentData();
        $status = $paymentDetails['data']['status']; // Getting the status of the transaction
        $amount = $paymentDetails['data']['amount']; //Getting the Amount
        $number = $randnum = rand(1111111111, 9999999999); // this one is specific to application
        $number = 'year' . $number;
        $data = session('recent_transaction');
        if ($status == "success") { //Checking to Ensure the transaction was succesfull
            $booking = new Booking;
            $booking->user_id = Auth::id();
            $booking->room_id = $data['room_id'];
            $booking->checkin_date = $data['checkin_date'];
            $booking->checkout_date = $data['checkout_date'];
            $booking->total_adults = $data['total_adults'];
            $booking->total_children = $data['total_children'];
            $booking->amount = $amount / 100;
            $booking->number = $number;
            $booking->status = $status;
            $booking->ref = 'front';
            $booking->paid_with = 'paystack';
            // $booking->payment_id =   $trxref;
            $booking->save();
            return redirect('/book')->with('message', 'booked Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // Check Avaiable rooms
    function available_rooms(Request $request, $checkin_date)
    {
        $arooms = DB::SELECT("SELECT * FROM rooms WHERE id NOT IN (SELECT room_id FROM bookings WHERE '$checkin_date' BETWEEN checkin_date AND checkout_date)");
        $data = [];
        foreach ($arooms as $room) {
            $roomTypes = RoomType::find($room->id);
            $data[] = ['room' => $room, 'roomtype' => $roomTypes];
        }
        return response()->json(['data' => $data]);
    }
}
