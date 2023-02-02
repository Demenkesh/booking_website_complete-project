<script src=" https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> --}}
@extends('layouts.admin')
@section('title')
    Edit Staff Page
@endsection
@section('content')
    <div class="container py-3 shadow">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white"> Edit staff Page <a href="{{ url('staff') }}"
                                class="float-end btn btn-success btn-sm">
                                View All
                            </a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @if ($errors->any())
                                <div class="alert alert-danger shadow" id="demo">
                                    <ul>
                                        <button class="btn btn-warning float-end" onclick="myFunction()">X</button>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach

                                    </ul>
                                </div>
                            @endif
                            <form action="{{ url('update-staff/' . $staff->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Department</th>
                                        <td>
                                            <select  class="form-select-lg" name="department_id"
                                                id="form"value="{{ old('department_id') }}" >
                                                @foreach ($department as $department)
                                                    <option  value="{{ $department->id }}"
                                                        {{ $department->id == $staff->department_id ? 'selected' : '' }}>
                                                        {{ $department->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>

                                    </tr>
                                    <tr>
                                        <th>Fullname</th>
                                        <td><input  value="{{ $staff->fullname }}" name="fullname" text="text"
                                                class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <th>Bio</th>
                                        <td><input  value="{{ $staff->bio }}" name="bio" type="text"
                                                class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <th>Salary_type</th>
                                        <td><input  value="{{ $staff->salary_type }}" name="salary_type"
                                                type="text" class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <th>Salary_amt</th>
                                        <td><input  value="{{ $staff->salary_amt }}" name="salary_amt"
                                                type="number" class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <th>Date</th>
                                        <td><input  value="{{ $staff->date }}" name="date"
                                                type="date" class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <th>Image</th>
                                        <td><input type="file" name="image" multiple class="form-control" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Image</th>
                                        <br /> <br /> <br />
                                        <td>
                                            @if ($staff->image)
                                                <img src="{{ asset("$staff->image") }}" style="width: 70px;height:70px;"
                                                    class="me-4 border" alt="img" />
                                            @else
                                                <h5>No image added</h5>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </td>
                                    </tr>
                                </table>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
