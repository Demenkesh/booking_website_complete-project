<script src=" https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> --}}
@extends('layouts.admin')
@section('title')
    Show staff Page
@endsection
@section('content')
    <div class="container py-3 shadow">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white"> Show staff- Page <a href="{{ url('staff') }}"
                                class="float-end btn btn-success btn-sm">
                                View All
                            </a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-bordered">
                                <tr>
                                    <th>Department</th>
                                    <td>
                                        <select readonly class="form-select-lg" name="department_id"
                                            id="form"value="{{ old('department_id') }}" disabled>
                                            @foreach ($department as $department)
                                                <option readonly value="{{ $department->id }}"
                                                    {{ $department->id == $staff->department_id ? 'selected' : '' }}>
                                                    {{ $department->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>

                                </tr>
                                <tr>
                                    <th>Fullname</th>
                                    <td><input readonly value="{{ $staff->fullname }}" name="title" text="text"
                                            class="form-control" /></td>
                                </tr>
                                <tr>
                                    <th>Bio</th>
                                    <td><input readonly value="{{ $staff->bio }}" name="bio" type="text"
                                            class="form-control" /></td>
                                </tr>
                                <tr>
                                    <th>Salary_type</th>
                                    <td><input readonly value="{{ $staff->salary_type }}" name="salary_type" type="text"
                                            class="form-control" /></td>
                                </tr>
                                <tr>
                                    <th>Salary_amt</th>
                                    <td><input readonly value="{{ $staff->salary_amt }}" name="salary_amt" type="number"
                                            class="form-control" /></td>
                                </tr>
                                <tr>
                                    <th>Date</th>
                                    <td><input readonly  value="{{ $staff->date }}" name="salary_amt"
                                            type="date" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <th>Image</th>
                                    <td>
                                        @if ($staff->image)
                                            <img src="{{ asset("$staff->image") }}" style="width: 70px;height:70px;"
                                                class="me-4 border" alt="img" />
                                        @else
                                            <h5>No image added</h5>
                                        @endif
                                    </td>
                                </tr>

                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
