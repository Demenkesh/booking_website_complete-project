<nav class="navbar navbar-area white-nav nav-absolute navbar-two navbar-expand-lg">
    <div class="container custom-container-one nav-container">
        <div class="logo-wrapper">
            <a href="{{ url('/') }}" class="logo">
                <img src="{{ asset('img/banner/02_logo.png') }}" alt="shapes">
            </a>
        </div>
        <div class="responsive-mobile-menu d-lg-none">
            <a href="javascript:void(0)" class="click-nav-right-icon">
                <i class="fa-solid fa-ellipsis-vertical"></i>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#hotel_booking_menu">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="hotel_booking_menu">
            <ul class="navbar-nav">
                <li><a href="{{ url('/') }}"> Home </a></li>
                <li><a href="about.html"> About </a></li>
                @guest
                @else
                    <li class="menu-item-has-children current-menu-item">
                        <a href="javascript:void(0)">Pages
                            <i class="fa-solid fa-angle-down"></i>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="hotel_details.html"> Hotel Details </a></li>
                            <li><a href="confirmation.html"> Confirmation </a></li>
                            <li>
                                <a href="dashboard_cancellation.html"> Cancellations </a>
                            </li>
                            <li>
                                <a href="dashboard_report_issue.html"> Report Issue </a>
                            </li>
                            <li><a href="dashboard_support.html"> Support </a></li>
                            <li>
                                <a href="dashboard_profile.html">Profile </a>
                            </li>
                            <li>
                                <a href="dashboard_pass_change.html"> Password Change </a>
                            </li>
                        </ul>
                    </li>
                @endguest

                @guest
                    <li><a href="{{ url('book') }}"> Bookings </a></li>
                @else
                    <li><a href="{{ url('book') }}"> Booking </a></li>
                @endguest

                <li><a href="about.html"> Blogs </a></li>
                <li><a href="contact.html"> Contact Us </a></li>
            </ul>
        </div>
        <div class="navbar-right-content show-nav-content">
            <div class="single-right-content">
                <div class="navbar-right-flex">
                    <div class="navbar-right-btn">

                        @guest
                            <div class="btn-wrapper">
                                @if (Route::has('login'))
                                    {{-- <div class="btn-wrapper"> --}}
                                    <a href="{{ route('login') }}"
                                        class="cmn-btn btn-bg-1 radius-10">{{ __('Log In ') }}</a>
                                    {{-- </div> --}}
                                @endif
                                @if (Route::has('register'))
                                    {{-- <div class="btn-wrapper"> --}}
                                    <a href="{{ route('register') }}" class="cmn-btn btn-bg-1 radius-10">
                                        {{ __('Sign Up') }}</a>
                                    {{-- </div> --}}
                                @endif
                            </div>
                        @else
                            <style>
                                #y {
                                    background-color: #2074D8;
                                    border: #2074D8;
                                }

                                .y {
                                    color: black !important;

                                }

                                .y:hover {
                                    color: orange !important;
                                }

                                #yyy {
                                    background-color: #2C7BD8;
                                }
                            </style>
                            <div class="btn-group " id="yyy">

                                <button class="cmn-btn btn-bg-1 radius-10 dropdown-toggle" id="y" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i
                                        class="fa-solid fa-user text-white">{{ Auth::user()->name }}<br />{{ Auth::user()->lastname }}</i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-white" id="yy">
                                    <li class="center-text ">
                                        <button class="text-black" id="btn-signup">
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                                                class="y">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </button>
                                    </li>
                                    <br />
                                    <li class="center-text">
                                        <button id="btn-signup">
                                            <a href="{{ url('my-orders') }}" class="y">
                                                My Orders
                                            </a>
                                        </button>
                                    </li>
                                    <br />
                                    <li class="center-text">
                                        <button id="btn-signup">
                                            <a href="{{ url('setting') }}"class="y">
                                                Setting
                                            </a>
                                        </button>
                                    </li>
                                    <br />
                                    <li class="center-text">
                                        <button id="btn-signup">
                                            <a href="{{ url('user/password') }}"class="y">
                                                Change Password
                                            </a>
                                        </button>
                                    </li>
                                    <br />
                                </ul>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
