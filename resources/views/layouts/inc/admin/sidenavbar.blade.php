<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/dashboard') }}">
            {{-- <i class="fa-solid fa-tv" style="color: #1c7ed6;"></i> --}}
            <div class="fa-solid fa-tv">
                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('roomtype') }}">
            <div class="fa-solid fa-bed">
                <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">RoomCategories</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('room') }}">
            <div class="fa-solid fa-bed">
                <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Room</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('booking') }}">
            <div class="fa-solid fa-bed">
                <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Booking rooms</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('department') }}">
            <div class="fa-solid fa-bed">
                <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Department</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('staff') }}">
            <div class="fa-solid fa-bed">
                <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Staff</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('transactions') }}">
            <div class="fa-solid fa-bed">
                <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Transactions</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="../pages/billing.html">
            <div
                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Billing</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="../pages/virtual-reality.html">
            <div
                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-app text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Virtual Reality</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="../pages/rtl.html">
            <div
                class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">RTL</span>
        </a>
    </li>
    <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
            Account pages
        </h6>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="../pages/profile.html">

            <div class="fa-solid fa-user">
                <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="../pages/sign-in.html">
            <div class="fa-solid fa-user-plus">
                <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Sign In</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="../pages/sign-up.html">
            <div class="fa-solid fa-right-to-bracket">
                <i class="ni ni-collection text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Sign Up</span>
        </a>
    </li>
</ul>
<style>
    a:focus {
    background-color: rgb(46, 46, 46);
    }
    </style>
