<?php

namespace App\Http\Controllers\Admin;

use App\Models\Staffdepartment;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\Transaction;
class StaffdepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = new Staffdepartment();
        $staff = Staffdepartment::paginate(10);
        return view('admin.staff.index', compact('staff'));
    }
    public function index2($id)
    {
        $staff = new Staffdepartment();
        $department = Department::all();
        $staff = Staffdepartment::findorFail($id);
        return view('admin.staff.payment', compact('staff', 'department'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $staff = Staffdepartment::all();
        $department = Department::all();
        $department = Department::all();
        return view('admin.staff.create', compact('department'));
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
            'fullname' => 'required',
            'bio' => 'required',
            'department_id' => 'required',
            'image' => 'required',
            'salary_type' => 'required',
            'salary_amt' => 'required',
        ]);
        //****

        $staff = new Staffdepartment;
        $staff->fullname = $request->fullname;
        $staff->bio = $request->bio;
        $staff->department_id = $request->department_id;
        $staff->salary_type = $request->salary_type;
        $staff->salary_amt = $request->salary_amt;
        $staff->status = '0';
        $uploadPath = 'assets/uploads/staff/';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/staff/', $filename);
            $staff->image =  $uploadPath . $filename;
        }
        $staff->save();
        return redirect('/staff')->with('message', 'Staff Added Successfully');
    }

    public function store2(Request $request,$id)
    {
        //**** Validate the inputs here
        $request->validate([
            'fullname' => 'required',
            'bio' => 'required',
            'department_id' => 'required',
            'salary_type' => 'required',
            'salary_amt' => 'required',
            'date' => 'required',
        ]);
        //****
        $staff = new Transaction;
        $staff->fullname = $request->fullname;
        $staff->bio = $request->bio;
        $staff->department_id = $request->department_id;
        $staff->salary_type = $request->salary_type;
        $staff->salary_amt = $request->salary_amt;
        $staff->date = $request->date;
        $staff->status = '1';
        $staff->save();
        $staffs = Staffdepartment::find($id);
        $staffs->status = '1';
        $staffs->date = $staff->date;
        $staffs->update();
        return redirect('/staff')->with('message', 'Paid Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department = Department::all();
        $staff = Staffdepartment::findorFail($id);
        return view('admin.staff.show', compact('staff', 'department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = Department::all();
        $staff = Staffdepartment::findorFail($id);
        return view('admin.staff.edit', compact('staff', 'department'));
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
            'fullname' => 'required',
            'bio' => 'required',
            'department_id' => 'required',
            'salary_type' => 'required',
            'salary_amt' => 'required',
            'date' => 'required',
        ]);

        $staff = Staffdepartment::findOrFail($id);
        $staff->fullname = $request->fullname;
        $staff->bio = $request->bio;
        $staff->department_id = $request->department_id;
        $staff->salary_type = $request->salary_type;
        $staff->salary_amt = $request->salary_amt;
        $staff->date = $request->date;

        $uploadPath = 'assets/uploads/staff/';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/staff/', $filename);
            $staff->image =  $uploadPath . $filename;
        } else {
            $image = $request->image;
        }
        $staff->update();
        return redirect('/staff')->with('message', 'Staff Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roomtype = Staffdepartment::findOrFail($id);
        $roomtype->delete();
        return redirect('/staff')->with('message', 'Staff deleted successfully');
    }
}
