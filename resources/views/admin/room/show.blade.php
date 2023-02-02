<script src=" https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> --}}
@extends('layouts.admin')
@section('title')
    Show room type Page
@endsection
@section('content')
    <div class="container py-3 shadow">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white"> Show room-type Page <a href="{{ url('room') }}"
                                class="float-end btn btn-success btn-sm">
                                View All
                            </a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-bordered">
                                <tr>
                                    <th>Roomtype</th>
                                    <td>
                                        <select readonly class="form-select-lg" name="roomtype_id"
                                            id="form"value="{{ old('roomtype_id') }}" disabled>
                                            @foreach ($roomtype as $roomtype)
                                                <option readonly value="{{ $roomtype->id }}"
                                                    {{ $roomtype->id == $room->roomtype_id ? 'selected' : '' }}>
                                                    {{ $roomtype->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>

                                </tr>
                                <tr>
                                    <th>Title</th>
                                    <td><input readonly value="{{ $room->title }}" name="title" type="text"
                                            class="form-control" /></td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td><input readonly value="{{ $room->price }}" name="price" type="number"
                                            class="form-control" /></td>
                                </tr>
                                <tr>
                                    <th>Room_No</th>
                                    <td><input  value="{{ $room->room_no }}" name="no" type="number"
                                            class="form-control" /></td>
                                </tr>
                                <tr>
                                    <th>Image</th>
                                    @if ($room->roomimages)
                                        <td class="row">
                                            @foreach ($room->roomimages as $image)
                                                <div class="col-md-2">
                                                    <br />
                                                    <img src="{{ asset($image->image) }}" style="width: 80px;height:80px;"
                                                        class="me-4 border" alt="Img" />
                                                </div>
                                            @endforeach
                                        </td>
                                    @else
                                        <h5>No image added</h5>
                                    @endif
                                </tr>

                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
