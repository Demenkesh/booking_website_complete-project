{{-- <script src=" https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script> --}}
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@extends('layouts.admin')
@section('title')
Booked History
@endsection
@section('content')
    <div class="container py-3 shadow">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">Booking History
                            <a href="{{ url('create-booking') }}" class="float-end btn btn-success btn-sm">
                                Add booking
                            </a>
                        </h4>
                    </div>
                    <div class="card-body table-responsive">


                        <table id="example1" class="display ">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>

                                    {{-- <th>#</th> --}}
                                    <th>User</th>
                                    <th>Room Type</th>
                                    <th>Room No.</th>
                                    <th>Room Name</th>
                                    <th>Checking Date</th>
                                    <th>Checkout Date</th>
                                    <th>Ref</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <div class="your-paginate mt-4">
                                    {{ $bookings->links() }}
                                </div>
                                @forelse ($bookings as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->room->Roomtype->title }}</td>
                                        <td>{{ $item->room->room_no }}</td>
                                        <td>{{ $item->room->title }}</td>
                                        <td>{{ $item->checkin_date }}</td>
                                        <td>{{ $item->checkout_date }}</td>
                                        <td>{{ $item->ref }}</td>
                                        <td>
                                            <a href="{{ url('show-department/' . $item->id) }}" class="btn btn-success"><i
                                                    class="fa-solid fa-eye"></i></a>
                                            <a href="{{ url('delete-department/' . $item->id) }}" class="btn btn-danger"
                                                onclick="myFunction()"><i class="fa-solid fa-trash"></i></a>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No room booked</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function myFunction() {
            alert("Do you want to delete this post!");
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#example1').DataTable({
                paging: false,
                ordering: false,
                info: false,
            });
        });
        // $(document).ready(function() {
        //     $('#example1').DataTable();
        // });
    </script>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #c0bfbf !important;
        }
    </style>
@endsection
