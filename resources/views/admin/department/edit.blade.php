<script src=" https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> --}}
@extends('layouts.admin')
@section('title')
    Edit department Page
@endsection
@section('content')
    <div class="container py-3 shadow">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white"> Edit department Page <a href="{{ url('department') }}"
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
                            <form action="{{ url('update-department/' . $department->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Title</th>
                                        <td><input value="{{ $department->title }}" name="title" type="text"
                                                class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <th>Details</th>
                                        <td><input value="{{ $department->detail }}" name="detail" type="text"
                                            class="form-control" /></td>
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
                                            @if ($department->image)
                                                <img src="{{ asset("$department->image") }}"
                                                    style="width: 70px;height:70px;" class="me-4 border" alt="img" />
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
