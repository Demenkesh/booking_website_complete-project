<script src=" https://code.jquery.com/jquery-3.5.1.js"></script>
@extends('layouts.frontend')
@section('title')
    EvergoldHotel_booking page
@endsection
@section('content')
    <br />
    <br /><br />
    <section class="login-area padding-top-100 padding-bottom-100">
        <div class="container">
            <div class="login-wrapper login-shadow bg-white">
                <div class="login-wrapper-flex">
                    {{-- <div class="login-wrapper-thumb">
                        <img src="assets/img/single-page/login.jpg" alt="img">
                    </div> --}}
                    <div class=" {{-- login-wrapper-contents --}} login-padding">
                        <h2 class="single-title text-center"> BOOK YOUR ROOM! </h2>
                        <form action="{{ url('pay') }}" method="POST" enctype="multipart/form-data"
                            class="login-wrapper-contents-form custom-form" action="#">
                            @csrf
                            <input type="text" hidden name="first_name" value="{{ Auth::user()->name }}">
                            <input type="text" hidden name="last_name" value="{{ Auth::user()->lastname }}">
                            <input type="text" hidden name="email" value="{{ Auth::user()->email }}">
                            <input type="text" hidden name="phone" value="{{ Auth::user()->phone }}">
                            <input type="number" hidden name="amount" min="0" class="room-price" value="">
                            <input type="text" hidden name="reference" value="{{ Paystack::genTranxRef() }}">

                            <div class="single-input mt-4">
                                <label class="label-title mb-3 text-center"> Checkin Date </label>
                                <input class="form-control checkin-date" name="checkin_date" type="date"
                                    placeholder="Checkin Date">
                            </div>
                            <div class="single-input mt-4">
                                <label class="label-title mb-3 text-center"> Checkout Date </label>
                                <input class="form-control" name="checkout_date" type="date" placeholder="Checkout Date">
                            </div>
                            <div class="single-input mt-4">
                                <label class="label-title mb-3 text-center"> Avaliable Rooms </label>
                                <td>
                                    <select class="form-control room-list" name="room_id">
                                    </select>
                                    <p>Price: <span class="show-room-price"> </span></p>
                                </td>
                            </div>
                            <div class="single-input mt-4">
                                <label class="label-title mb-3 text-center"> Total Adults </label>
                                <input class="form-control" name="total_adults" type="text" placeholder="Total Adults">
                            </div>
                            <div class="single-input mt-4">
                                <label class="label-title mb-3 text-center"> Total Children </label>
                                <input class="form-control" name="total_children" type="text"
                                    placeholder="Total Children">
                            </div>
                            <tr>
                                <td colspan="2">
                                    <button class="submit-btn w-100 mt-4" type="submit"> Book </button>
                                </td>
                            </tr>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .navbar-area.navbar-two .nav-container {
                background-color: #1e84fe !important;
            }

            #y {
                background-color: #1e84fe !important;
                border: #1e84fe !important;
            }
        </style>
    </section>
    <script>
        $(document).ready(function() {
            $(".checkin-date").on('blur', function() {
                var _checkindate = $(this).val();
                // Ajax
                $.ajax({
                    url: "{{ url('/') }}/available-rooms/" + _checkindate,
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
                            '-' + row.roomtype.title +
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
