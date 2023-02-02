<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\RoomType;
use App\Models\Department;
use App\Models\Room;
use App\Models\Staffdepartment;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index()
    {
        $booking = Booking::count();
        $roomtype = RoomType::count();
        $department = Department::count();
        $room = Room::count();
        $staff = Staffdepartment::count();

        $bookings = Booking::selectRaw('count(id) as total_bookings,checkin_date')->groupBy('checkin_date')->get();
        $labels = [];
        $data = [];
        foreach ($bookings as $booking) {
            $labels[] = $booking['checkin_date'];
            $data[] = $booking['total_bookings'];
        }

        // For Pie Chart
        $rtbookings = DB::table('room_types as rt')
            ->join('rooms as r', 'r.roomtype_id', '=', 'rt.id')
            ->join('bookings as b', 'b.room_id', '=', 'r.id')
            ->select('rt.*', 'r.*', 'b.*', DB::raw('count(b.id) as total_bookings'))
            ->groupBy('r.roomtype_id')
            ->get();
        $plabels = [];
        $pdata = [];
        foreach ($rtbookings as $rbooking) {
            $plabels[] = $rbooking->detail;
            $pdata[] = $rbooking->total_bookings;
        }
        return view('admin.index', compact('booking','labels', 'data' , 'pdata' ,'plabels','roomtype', 'department', 'room', 'staff'));
    }

    // function dashboard(){
    //     $bookings=Booking::selectRaw('count(id) as total_bookings,checkin_date')->groupBy('checkin_date')->get();
    //     $labels=[];
    //     $data=[];
    //     foreach($bookings as $booking){
    //         $labels[]=$booking['checkin_date'];
    //         $data[]=$booking['total_bookings'];
    //     }

    //     // For Pie Chart
    //     $rtbookings=DB::table('room_types as rt')
    //         ->join('rooms as r','r.room_type_id','=','rt.id')
    //         ->join('bookings as b','b.room_id','=','r.id')
    //         ->select('rt.*','r.*','b.*',DB::raw('count(b.id) as total_bookings'))
    //         ->groupBy('r.room_type_id')
    //         ->get();
    //     $plabels=[];
    //     $pdata=[];
    //     foreach($rtbookings as $rbooking){
    //         $plabels[]=$rbooking->detail;
    //         $pdata[]=$rbooking->total_bookings;
    //     }
    //     // End

    //     // echo '<pre>';
    //     // print_r($rtbookings);

    //     return view('dashboard',['labels'=>$labels,'data'=>$data,'plabels'=>$plabels,'pdata'=>$pdata]);
    // }
}
