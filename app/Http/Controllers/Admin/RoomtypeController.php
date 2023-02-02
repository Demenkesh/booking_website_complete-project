<?php

namespace App\Http\Controllers\admin;

use App\Models\RoomType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomtype = new RoomType();
        $roomtype = RoomType::paginate(10);
        return view('admin.roomtype.index', compact('roomtype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roomtype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //**** Validate the inputs here
        $request->validate([
            'title' => 'required',
            'detail' => 'required',
            'image' => 'required',
        ]);
        //****
        $roomtype = new RoomType;
        $roomtype->title = $request->title;
        $roomtype->detail = $request->detail;
        $uploadPath = 'assets/uploads/roomtype/';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/roomtype/', $filename);
            $roomtype->image =  $uploadPath . $filename;
        }
        $roomtype->save();
        return redirect('/roomtype')->with('message', 'Roomtype Added Successfully');
        // try{
        //     $request->validate([
        //         'title' => 'required',
        //         'detail' => 'required',
        //     ]);
        //     //***
        //     $roomtype = new RoomType;
        //     $roomtype->title = $request->title;
        //     $roomtype->detail = $request->detail;
        //     $roomtype->save();
        //     return redirect('/roomtype')->with('message', 'Roomtype Added Successfully');
        // }catch(\Exception $e){
        //     return redirect()->back()->with('error', $e->getMessage());
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $roomtype = RoomType::find($id);
        return view('admin.roomtype.show', compact('roomtype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roomtype = RoomType::find($id);
        return view('admin.roomtype.edit', compact('roomtype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'detail' => 'required',
            // 'image' => 'required',
        ]);

        $roomtype = RoomType::findOrFail($id);
        $roomtype->title = $request->title;
        $roomtype->detail = $request->detail;
        $uploadPath = 'assets/uploads/roomtype/';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/roomtype/', $filename);
            $roomtype->image =  $uploadPath . $filename;
        } else {
            $image = $request->image;
        }
        $roomtype->update();
        return redirect('/roomtype')->with('message', 'Roomtype Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roomtype = RoomType::findOrFail($id);
        $roomtype->delete();
        return redirect('/roomtype')->with('message', 'Roomtype deleted successfully');
    }
}
