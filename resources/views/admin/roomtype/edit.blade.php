<script src=" https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> --}}
@extends('layouts.admin')
@section('title')
    Edit room type Page
@endsection
@section('content')
    <div class="container py-3 shadow">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white"> Edit room-type Page <a href="{{ url('roomtype') }}"
                                class="float-end btn btn-success btn-sm">
                                View All
                            </a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form action="{{ url('update-roomtype/' . $roomtype->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Title</th>
                                        <td><input value="{{ $roomtype->title }}" name="title" type="text"
                                                class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <th>Details</th>
                                        <td>
                                            <textarea name="detail" class="form-control">{{ $roomtype->detail }}</textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Image</th>
                                        <td><input type="file" name="image" multiple class="form-control" />
                                        </td>
                                    </tr>
                                    <tr>
                                        @if ($roomtype->image)
                                            <img src="{{ asset("$roomtype->image") }}" style="width: 70px;height:70px;"
                                                class="me-4 border" alt="img" />
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
