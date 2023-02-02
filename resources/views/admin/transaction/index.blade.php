{{-- <script src=" https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script> --}}
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@extends('layouts.admin')
@section('title')
Transaction Page
@endsection
@section('content')
    <div class="container py-3 shadow">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">Transaction Page
                        </h4>
                    </div>
                    <div class="card-body table-responsive">


                        <table id="example1" class="display ">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>

                                    <th scope="col">Fullname</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Bio</th>
                                    <th scope="col">Salary_type</th>
                                    <th scope="col">Salary_amt</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <div class="your-paginate mt-4">
                                    {{ $transaction->links() }}
                                </div>
                                @forelse ($transaction as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->fullname }}</td>
                                        <td>{{ $item->department_id}}</td>
                                        <td>{{ $item->bio }}</td>
                                        <td>{{ $item->salary_type }}</td>
                                        <td>{{ $item->salary_amt }}</td>
                                        <td>{{ $item->status }}Paid</td>
                                        <td>{{ $item->date }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">No transcation Avaliable</td>
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
