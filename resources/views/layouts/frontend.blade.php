<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/lineawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/flatpicker.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/intlTelInput.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.css"
        integrity="sha512-Woz+DqWYJ51bpVk5Fv0yES/edIMXjj3Ynda+KWTIkGoynAMHrqTcDUQltbipuiaD5ymEo9520lyoVOo9jCQOCA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- exzoom --}}
    {{-- <link href="{{ asset('frontend/productimageslider/style.css') }}" rel="stylesheet" /> --}}
    {{-- exzoomends --}}
    <!-- Scripts -->
    {{-- @vite(['resources/js/app.js']) --}}

</head>

<body>
    {{-- nav --}}
    <header class="header-style-01">
        @include('layouts.inc.frontend.nav')
    </header>
    @yield('content')
    <footer class="footer-area footer-area-two footer-bg-1">
        @include('layouts.inc.frontend.footer')
    </footer>

    <div class="back-to-top bg-color-two">
        @include('layouts.inc.frontend.back-top')
    </div>

    <div class="mouse-cursor-two">
        @include('layouts.inc.frontend.mouse-cursor')
    </div>
    <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-migrate.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/wow.js') }}"></script>
    <script src="{{ asset('frontend/js/slick.js') }}"></script>
    <script src="{{ asset('frontend/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.nice-select.js') }}"></script>
    <script src="{{ asset('frontend/js/flatpicker.js') }}"></script>
    <script src="{{ asset('frontend/js/nouislider-8.5.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/intlTelInput.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script data-cfasync="false" src="{{ asset('frontend/js/email-decode.min.js') }}"></script>
    {{-- <script src="{{ asset('frontend/productimageslider/custom.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"
        integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session('message'))
        <script>
            swal("Good job!", "{{ session('message') }}!", "success");
        </script>
    @endif

    @if (session('error'))
        <script>
            swal("Error!", "{{ session('error') }}!", "warning");
        </script>
    @endif
    @yield('scripts')
</body>

</html>
