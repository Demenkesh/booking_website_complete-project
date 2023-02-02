<script src=" https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> --}}
@extends('layouts.admin')
@section('title')
    Edit room Page
@endsection
@section('content')
    <div class="container py-3 shadow">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white"> Edit room Page <a href="{{ url('room') }}"
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
                            <form action="{{ url('update-room/' . $room->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Roomtype</th>
                                        <td>
                                            <select class="form-select-lg" name="roomtype_id"
                                                id="form"value="{{ old('roomtype_id') }}">
                                                @foreach ($roomtype as $roomtype)
                                                    <option value="{{ $roomtype->id }}"
                                                        {{ $roomtype->id == $room->roomtype_id ? 'selected' : '' }}>
                                                        {{ $roomtype->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>

                                    </tr>
                                    <tr>
                                        <th>Title</th>
                                        <td><input value="{{ $room->title }}" name="title" type="text"
                                                class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <th>Price</th>
                                        <td><input value="{{ $room->price }}" name="price" type="number"
                                                class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <th>Room_No</th>
                                        <td><input value="{{ $room->room_no }}" name="no" type="number"
                                                class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <th>Image</th>
                                        <td><input type="file" name="image[]" multiple class="form-control" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Image</th>
                                        <br /> <br /> <br />
                                        @if ($room->roomimages)
                                            <td class="row">
                                                @foreach ($room->roomimages as $image)
                                                    <div class="col-md-2">
                                                        <br />
                                                        <img src="{{ asset($image->image) }}"
                                                            style="width: 80px;height:80px;" class="me-4 border"
                                                            alt="Img" />

                                                        <h4 class="text-white ">
                                                            <a href="{{ url('admin/room-image/' . $image->id . '/delete') }}"
                                                                class=" btn btn-danger btn-sm py-0" onclick="myFunction()">
                                                                Remove
                                                            </a>
                                                        </h4>
                                                    </div>
                                                @endforeach
                                            </td>
                                        @else
                                            <h5>No image added</h5>
                                        @endif
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
