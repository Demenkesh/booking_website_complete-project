<script src=" https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
@extends('layouts.admin')
@section('title')
    Add room Page
@endsection
@section('content')
    <div class="container py-3 shadow">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white"> Add room Page <a href="{{ url('room') }}"
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

                            <form action="{{ url('store-room') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <table class="table table-bordered">
                                    <tr>
                                        <select class="form-select-lg" id="form"value="{{ old('roomtype_id') }}"
                                            name="roomtype_id">
                                            <option value="">Select a Category</option>
                                            @foreach ($roomtype as $item)
                                                <option class="d"value="{{ $item->id }}">{{ $item->title}}
                                                </option>
                                            @endforeach

                                        </select>
                                    </tr>

                                    <tr>
                                        <th>Title</th>
                                        <td><input name="title" type="text" class="form-control" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Price</th>
                                        <td><input  name="price" type="number"
                                                class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <th>Room_No</th>
                                        <td><input  name="room_no" type="number"
                                                class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <th>Image</th>
                                        <td><input type="file" name="image[]" multiple class="form-control" />
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
