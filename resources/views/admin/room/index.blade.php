{{-- <script src=" https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script> --}}
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@extends('layouts.admin')
@section('title')
    Room Page
@endsection
@section('content')
    <div class="container py-3 shadow">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">Room Page
                            <a href="{{ url('create-room') }}" class="float-end btn btn-success btn-sm">
                                Add room
                            </a>
                        </h4>
                    </div>
                    <div class="card-body table-responsive">


                        <table id="example1" class="display ">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">RoomType</th>
                                    <th scope="col">RoomName</th>
                                    <th scope="col">RoomNo</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <div class="your-paginate mt-4">
                                    {{ $room->links() }}
                                </div>
                                @forelse ($room as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->roomtype->title}}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->room_no }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>
                                            <a href="{{ url('show-room/' . $item->id) }}" class="btn btn-success"><i
                                                    class="fa-solid fa-eye"></i></a>
                                            <a href="{{ url('edit-room/' . $item->id) }}" class="btn btn-warning"> <i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="{{ url('delete-room/' . $item->id) }}" class="btn btn-danger"
                                                onclick="myFunction()"><i class="fa-solid fa-trash"></i></a>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No Room Avaliable</td>
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
