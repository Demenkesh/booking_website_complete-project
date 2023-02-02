<?php

namespace App\Http\Controllers\admin;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department = new Department();
        $department = Department::paginate(10);
        return view('admin.department.index', compact('department'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.department.create');
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
        $department = new Department;
        $department->title = $request->title;
        $department->detail = $request->detail;
        $uploadPath = 'assets/uploads/department/';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/department/', $filename);
            $department->image =  $uploadPath . $filename;
        }
        $department->save();
        return redirect('/department')->with('message', 'Department Added Successfully');
        // try{
        //     $request->validate([
        //         'title' => 'required',
        //         'detail' => 'required',
        //     ]);
        //     //***
        //     $department = new Department;
        //     $Department->title = $request->title;
        //     $Department->detail = $request->detail;
        //     $Department->save();
        //     return redirect('/Department')->with('message', 'Department Added Successfully');
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
        $department = Department::find($id);
        return view('admin.department.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::find($id);
        return view('admin.department.edit', compact('department'));
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
            
        ]);

        $department = Department::findOrFail($id);
        $department->title = $request->title;
        $department->detail = $request->detail;
        $uploadPath = 'assets/uploads/department/';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/department/', $filename);
            $department->image =  $uploadPath . $filename;
        } else {
            $image = $request->image;
        }
        $department->update();
        return redirect('/department')->with('message', 'department Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();
        return redirect('/department')->with('message', 'department deleted successfully');
    }
}
