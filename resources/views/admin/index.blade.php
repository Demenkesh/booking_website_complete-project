@extends('layouts.admin')
@section('title')
    Welcome admin
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                    Staff
                                </p>
                                <h5 class="font-weight-bolder">
                                    {{ $staff }}
                                </h5>
                                <p class="mb-0">
                                    <span class="text-success text-sm font-weight-bolder">+55%</span>
                                <p id="demo"></p>
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                    RoomTypes
                                </p>
                                <h5 class="font-weight-bolder">
                                    {{ $roomtype }}
                                </h5>
                                <p class="mb-0">
                                    <span class="text-success text-sm font-weight-bolder">+3%</span>
                                <p id="demo1"></p>
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                    Rooms
                                </p>
                                <h5 class="font-weight-bolder">
                                    {{ $room }}
                                </h5>
                                <p class="mb-0">
                                    <span class="text-danger text-sm font-weight-bolder">-2%</span>
                                <p id="demo2"></p>
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                    Department
                                </p>
                                <h5 class="font-weight-bolder">
                                    {{ $department }}
                                </h5>
                                <p class="mb-0">
                                    <span class="text-success text-sm font-weight-bolder">+5%</span>
                                <p id="demo3"></p>
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <h6 class="text-capitalize">Booking overview</h6>
                    <p class="text-sm mb-0">
                        <i class="fa fa-arrow-up text-success"></i>
                        <span class="font-weight-bold">4% more</span>
                    <p id="demofortime"></p>
                    </p>
                </div>
                <div class="card-body p-3">
                    <div class="chart">
                        <canvas id="chart-line" class="chart-canvas" height="600" width="1440"
                            style="display: block; box-sizing: border-box; height: 300px; width: 720px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 mb-lg-0 mb-4">
            <br />
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">RoomType Bookings</h6>
            </div>
            {{-- <div class="card" id="piechart"></div> --}}


            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->

                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        @foreach ($plabels as $label)
                            <span class="mr-2">
                                <i class="fas fa-circle"></i> {{ $label }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>




        </div>
    </div>
    {{-- pass data to line chart --}}
    <script type="text/javascript">
        var _labels = {!! json_encode($labels) !!};
        var _data = {!! json_encode($data) !!};
// for piechart
        var _plabels = {!! json_encode($plabels) !!};
        var _pdata = {!! json_encode($pdata) !!};
    </script>

    <script>
        const time = new Date().getHours();
        let greeting;
        if (time < 12) {
            greeting = "Good morning";
        } else if (time < 17) {
            greeting = "Good afternoon";
        } else {
            greeting = "Good evening";
        }
        document.getElementById("demo").innerHTML = greeting;
        document.getElementById("demo1").innerHTML = greeting;
        document.getElementById("demo2").innerHTML = greeting;
        document.getElementById("demo3").innerHTML = greeting;
    </script>
    <script>
        const d = new Date();
        d.setFullYear(d.getFullYear(), d.getMonth() - 6);
        document.getElementById("demofortime").innerHTML = d;
    </script>
@endsection
