<script src=" https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
@extends('layouts.admin')
@section('title')
    Add staff Page
@endsection
@section('content')
    <div class="container py-3 shadow">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white"> Add staff Page <a href="{{ url('staff') }}"
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

                            <form action="{{ url('store-staff') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <table class="table table-bordered">
                                    <tr>
                                        <select class="form-select-lg" id="form"value="{{ old('department_id') }}"
                                            name="department_id">
                                            <option value="">Select a Department</option>
                                            @foreach ($department as $item)
                                                <option class="d"value="{{ $item->id }}">{{ $item->title }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </tr>

                                    <tr>
                                        <th>Fullname</th>
                                        <td><input name="fullname" type="text" class="form-control" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>bio</th>
                                        <td><input name="bio" type="text" class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <th>Salary_type</th>
                                        <td>
                                            <select name="salary_type">
                                                <option value="">Select a Salary_type</option>
                                                <option value="Daily">Daily</option>
                                                <option value="Monthly">Monthly</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Salary_amt</th>
                                        <td><input name="salary_amt" type="number" class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <th>Image</th>
                                        <td><input type="file" name="image" multiple class="form-control" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <input type="submit" class="btn btn-primary">
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
