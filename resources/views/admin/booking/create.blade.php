<script src=" https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
@extends('layouts.admin')
@section('title')
    Add Booking Page
@endsection
@section('content')
    <div class="container py-3 shadow">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white"> Add booking Page <a href="{{ url('booking') }}"
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

                            <form action="{{ url('store-booking') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Select User <span class="text-danger">*</span></th>
                                        <td>
                                            <select class="form-control" name="user_id">
                                                <option>--- Select User ---</option>
                                                @foreach ($user as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>CheckIn Date <span class="text-danger">*</span></th>
                                        <td><input name="checkin_date" type="date" class="form-control checkin-date" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>CheckOut Date <span class="text-danger">*</span></th>
                                        <td><input name="checkout_date" type="date" class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <th>Avaiable Rooms <span class="text-danger">*</span></th>
                                        <td>
                                            <select class="form-control room-list" name="room_id">

                                            </select>
                                            <p>Price: <span class="show-room-price"></span></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Total Adults <span class="text-danger">*</span></th>
                                        <td><input name="total_adults" type="text" class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <th>Total Children</th>
                                        <td><input name="total_children" type="text" class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <input type="hidden" name="roomprice" class="room-price" value="" />
                                            <input type="submit" class="btn btn-primary" />
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
    <script>
        $(document).ready(function() {
            $(".checkin-date").on('blur', function() {
                var _checkindate = $(this).val();
                // Ajax
                $.ajax({
                    url: "{{ url('booking') }}/available-rooms/" + _checkindate,
                    type: 'get',
                    dataType: 'json',
                    beforeSend: function() {
                        $(".room-list").html('<option>--- Loading ---</option>');

                    },
                    success: function(res) {
                        var _html = '';
                        $.each(res.data, function(index, row) {
                            _html += '<option data-price="' + row.room.price +
                                '" value="' + row.room.id + '">' + row.room.title +
                                "<br>"
                            // '-' + row.roomtype.title +
                            '</option>';
                        });
                        $(".room-list").html(_html);
                        var _selectedPrice = $(".room-list").find('option:selected').attr(
                            'data-price');
                        $(".room-price").val(_selectedPrice);
                        $(".show-room-price").text(_selectedPrice);
                    }
                });
            });
            $(document).on("change", ".room-list", function() {
                var _selectedPrice = $(this).find('option:selected').attr('data-price');
                $(".room-price").val(_selectedPrice);
                $(".show-room-price").text(_selectedPrice);
            });
        });
    </script>
@endsection
