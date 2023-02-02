<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Models\RoomType;
use App\Models\Roomimages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\RoomFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room = new Room();
        $room = Room::paginate(10);
        return view('admin.room.index', compact('room'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $room = Room::all();
        $roomtype = RoomType::all();
        $roomtype = RoomType::all();
        return view('admin.room.create', compact('roomtype'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomFormRequest $request)
    {
        //**** Validate the inputs here
        $request->validate([
            'title' => 'required',
            'image' => 'required',
            'price' => 'required',
            'room_no' => 'required',
        ]);
        //****
        $validatedData = $request->validated();
        $roomtype = RoomType::findOrFail($validatedData['roomtype_id']);
        $room = $roomtype->rooms()->create([
            'roomtype_id' => $validatedData['roomtype_id'],
            'title' => $validatedData['title'],
            'price' => $validatedData['price'],
            'room_no' => $validatedData['room_no']
        ]);
        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/room/';
            $i = 1;
            foreach ($request->file('image') as $imageFile) {
                $extention = $imageFile->getClientOriginalExtension();
                $filename = time() . $i++ . '.' . $extention;
                $imageFile->move($uploadPath, $filename);
                $finalImagePathName = $uploadPath . $filename;

                $room->roomImages()->create([
                    'room_id' => $room->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }
        return redirect('/room')->with('message', 'Room Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $roomtype = RoomType::all();
        $room = Room::findorFail($id);
        return view('admin.room.show', compact('room', 'roomtype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roomtype = RoomType::all();
        $room = Room::findorFail($id);
        return view('admin.room.edit', compact('room', 'roomtype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoomFormRequest $request, int $room_id)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
            'room_no' => 'required',
        ]);
        $validatedData = $request->validated();
        $room = RoomType::findOrFail($validatedData['roomtype_id'])->rooms()->where('id', $room_id)->first();
        if ($room) {
            $room->update([
                'roomtype_id' => $validatedData['roomtype_id'],
                'title' => $validatedData['title'],
                'price' => $validatedData['price'],
                'room_no' => $validatedData['room_no']
            ]);
            if ($request->hasFile('image')) {
                $uploadPath = 'uploads/room/';
                $i = 1;
                foreach ($request->file('image') as $imageFile) {
                    $extention = $imageFile->getClientOriginalExtension();
                    $filename = time() . $i++ . '.' . $extention;
                    $imageFile->move($uploadPath, $filename);
                    $finalImagePathName = $uploadPath . $filename;

                    $room->roomImages()->create([
                        'room_id' => $room->id,
                        'image' => $finalImagePathName,
                    ]);
                }
            }else{
                $image=$request->image;
            }
            return redirect('/room')->with('message', 'Room Updated Succesfully');
        } else {
            return redirect('/room')->with('message', 'No Such Product Id Found');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $room_id)
    {
        $room = Room::findOrFail($room_id);
        if ($room->roomImage) {
            foreach ($room->Image as $image) {
                if (File::exists($image->image)) {
                    File::delete($image->image);
                }
            }
        }
        $room->delete();
        return redirect()->back()->with('message', 'Room Deleted');
    }

    public function destroyImage(int $room_image_id)
    {
        $roomImage = Roomimages::findOrFail($room_image_id);
        if (File::exists($roomImage->image)) {
            File::delete($roomImage->image);
        }
        $roomImage->delete();
        return redirect()->back()->with('message', 'room Image Deleted');
    }
}
