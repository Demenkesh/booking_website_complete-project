<script src=" https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
@extends('layouts.admin')
@section('title')
    Add Payment Page
@endsection
@section('content')
    <div class="container py-3 shadow">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">

                        <h4 class="text-white"> Add Payment Page <a href="{{ url('staff') }}"
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

                            <form action="{{ url('store-staffhistory/' . $staff->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <table class="table table-bordered">
                                    <tr hidden>
                                        <th>Department</th>
                                        <td>
                                            <select class="form-select-lg" name="department_id"
                                                id="form"value="{{ old('department_id') }}">
                                                @foreach ($department as $department)
                                                    <option value="{{ $department->id }}"
                                                        {{ $department->id == $staff->department_id ? 'selected' : '' }}>
                                                        {{ $department->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>

                                    </tr>
                                    <tr hidden>
                                        <th>Fullname</th>
                                        <td><input value="{{ $staff->fullname }}" name="fullname" text="text"
                                                class="form-control" /></td>
                                    </tr>
                                    <tr hidden>
                                        <th>Bio</th>
                                        <td><input value="{{ $staff->bio }}" name="bio" type="text"
                                                class="form-control" /></td>
                                    </tr>
                                    <tr hidden>
                                        <th>Salary_type</th>
                                        <td><input value="{{ $staff->salary_type }}" name="salary_type" type="text"
                                                class="form-control" /></td>
                                    </tr>
                                    <tr hidden>
                                        <th>Salary_amt</th>
                                        <td><input value="{{ $staff->salary_amt }}" name="salary_amt" type="number"
                                                class="form-control" /></td>
                                    </tr>
                                    @if ($staff->status == '0')
                                    <tr>
                                        <th>Date which the payment is made </th>
                                        <td><input name="date" type="date" class="form-control" /></td>
                                    </tr>
                                    {{-- @if ($staff->status == '0') --}}
                                        <tr>
                                            <td colspan="2">
                                                <button type="submit" id="d" class="btn btn-primary">Update
                                                    payment</button>
                                            </td>
                                        </tr>
                                    @else
                                        <td>
                                            <div class="class" id="dd">{{ $staff->status }} PAID</div>
                                        </td>
                                    @endif
                                    <style>
                                        #d {
                                            margin-left: 40%;
                                        }

                                        #dd {
                                            margin-left: 40%;
                                        }
                                    </style>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
