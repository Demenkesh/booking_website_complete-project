<script src=" https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
@extends('layouts.admin')
@section('title')
    Add Payment Page
@endsection
@section('content')
    <div class="container py-3 shadow">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        @forelse ($staff as $item)
                            <h4 class="text-white"> Add Payment Page <a href="{{ url('payment/' . $item->id) }}"
                                    class="float-end btn btn-success btn-sm">
                                    View All
                                </a>
                            </h4>
                        @empty
                        @endforelse
                        {{-- <h4 class="text-white"> Add Payment Page <a href="{{ url('payment/' . $item->id) }}"
                                class="float-end btn btn-success btn-sm">
                                View All
                            </a>
                        </h4> --}}
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

                            <form action="{{ url('store-staff') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Salary_amt</th>
                                        <td><input name="salary_amt" type="number" class="form-control" /></td>
                                    </tr>
                                    <tr>
                                        <th>Date</th>
                                        <td><input name="date" type="date" class="form-control" /></td>
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
