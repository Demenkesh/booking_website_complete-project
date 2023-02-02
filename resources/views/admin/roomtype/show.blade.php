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
                        <h4 class="text-white"> Show room-type Page <a href="{{ url('roomtype') }}"
                                class="float-end btn btn-success btn-sm">
                                View All
                            </a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-bordered">
                                <tr>
                                    <th>Title</th>
                                    <td><input readonly value="{{ $roomtype->title }}" name="title" type="text"
                                            class="form-control" /></td>
                                </tr>

                                <tr>
                                    <th>Details</th>
                                    <td><input readonly value="{{ $roomtype->details }}" name="name" type="text"
                                            class="form-control" /></td>
                                </tr>

                                <tr>
                                    <th>image</th>
                                    <td>
                                        {{-- <tr> --}}
                                        @if ($roomtype->image)
                                            <img src="{{ asset("$roomtype->image") }}" style="width: 70px;height:70px;"
                                                class="me-4 border" alt="img" />
                                        @endif
                                        {{-- </tr> --}}

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
