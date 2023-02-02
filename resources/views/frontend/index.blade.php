@extends('layouts.frontend')
@section('title')
    EvergoldHotel
@endsection
@section('content')
    {{-- banner --}}
    <div class="banner-area banner-area-two banner-bg">
        @include('layouts.inc.frontend.banner')
    </div>
    {{-- banner ends --}}
    {{-- location --}}
    <div class="location-area">
        @include('layouts.inc.frontend.location')
    </div>
    {{-- location ends --}}

    <section class="booking-two-area pat-100 pab-50">
        @include('layouts.inc.frontend.booking')f
    </section>
    <section class="attraction-area pat-50 pab-50">
        <div class="container">
            <div class="section-title center-text">
                <h2 class="title">ROOMS </h2>
                <div class="section-title-line"></div>
            </div>
            <div class="row mt-5">
                <div class="col-12">
                    <div class="global-slick-init attraction-slider nav-style-one nav-color-two slider-inner-margin"
                        data-infinite="true" data-arrows="true" data-dots="false" data-slidesToShow="4"
                        data-swipeToSlide="true" data-autoplay="true" data-autoplaySpeed="2500"
                        data-prevArrow='<div class="prev-icon radius-parcent-50"><i class="fa-sharp fa-solid fa-angle-left"></i></div>'
                        data-nextArrow='<div class="next-icon radius-parcent-50"><i class="fa-sharp fa-solid fa-angle-right"></i></div>'
                        data-responsive='[{"breakpoint": 1400,"settings": {"slidesToShow": 4}},{"breakpoint": 1200,"settings": {"slidesToShow": 3}},{"breakpoint": 992,"settings": {"slidesToShow": 3}},{"breakpoint": 768,"settings": {"slidesToShow": 2}},{"breakpoint": 576, "settings": {"slidesToShow": 1} }]'>
                        @foreach ($room as $item)
                            <div class="col-md-3">
                                <div class="card">

                                    <h5 class="card-header shadow e" style="background-color: white;">{{ $item->title }}
                                    </h5>
                                    <div class="card-body">
                                        @foreach ($item->roomimages as $index => $img)
                                            <div class="attraction-item">
                                                <div class="single-attraction-two radius-20">
                                                    <div class="single-attraction-two-thumb">
                                                        <a href="{{ asset("$img->image") }}" class="gallery-popup"
                                                            data-lightbox="rgallery{{ $item->id }}">
                                                            @if ($index > 0)
                                                                <img class="img-fluid hide"
                                                                    src="{{ asset("$img->image") }}" />
                                                            @else
                                                                <img class="img-fluid" src="{{ asset("$img->image") }}" />
                                                            @endif
                                                        </a>
                                                        </td>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <style>
            .hide {
                display: none !important;
            }

            .e:hover {
                background-color: #ff8c32 !important;
                color: white !important;
            }
        </style>
    </section>

    <section class="guest-area pat-50 pab-50">
        <div class="container">
            <div class="section-title-three append-flex">
                <h2 class="title">Thoughts from our guests</h2>
                <div class="append-attraction append-color-two"></div>
            </div>
            <div class="row mt-5">
                <div class="col-12">
                    <div class="global-slick-init guest-two-slider nav-style-one slider-inner-margin"
                        data-appendArrows=".append-attraction" data-infinite="true" data-arrows="true" data-dots="false"
                        data-slidesToShow="3" data-swipeToSlide="true" data-autoplay="true" data-autoplaySpeed="2500"
                        data-prevArrow='<div class="prev-icon radius-parcent-50"><i class="fa-sharp fa-solid fa-angle-left"></i></div>'
                        data-nextArrow='<div class="next-icon radius-parcent-50"><i class="fa-sharp fa-solid fa-angle-right"></i></div>'
                        data-responsive='[{"breakpoint": 1400,"settings": {"slidesToShow": 3}},{"breakpoint": 1200,"settings": {"slidesToShow": 3}},{"breakpoint": 992,"settings": {"slidesToShow": 2}},{"breakpoint": 576, "settings": {"slidesToShow": 1} }]'>
                        <div class="guest-two-item">
                            <div class="single-guest-two single-guest-two-border radius-20">
                                <div class="single-guest-two-flex">
                                    <div class="single-guest-two-thumb">
                                        <a href="javascript:void(0)">
                                            <img src="assets/img/guest/g1.jpg" alt="img" />
                                        </a>
                                    </div>
                                    <div class="single-guest-two-contents">
                                        <h4 class="single-guest-two-contents-title">
                                            <a href="javascript:void(0)"> Guy Hawkins </a>
                                        </h4>
                                        <div class="single-guest-two-contents-country">
                                            <div class="single-guest-two-contents-country-flag">
                                                <img src="assets/img/guest/sweden.png" alt="flag" />
                                            </div>
                                            <span class="single-guest-two-contents-country-name">
                                                Sweden
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <p class="single-guest-two-para mt-3">
                                    Amet minim mollit non deserunt ullamco est sit aliq dolor do
                                    amet sint. Velit officia consequat duis enilk velit mollit.
                                </p>
                            </div>
                        </div>
                        <div class="guest-two-item">
                            <div class="single-guest-two single-guest-two-border radius-20">
                                <div class="single-guest-two-flex">
                                    <div class="single-guest-two-thumb">
                                        <a href="javascript:void(0)">
                                            <img src="assets/img/guest/g2.jpg" alt="img" />
                                        </a>
                                    </div>
                                    <div class="single-guest-two-contents">
                                        <h4 class="single-guest-two-contents-title">
                                            <a href="javascript:void(0)"> Guy Hawkins </a>
                                        </h4>
                                        <div class="single-guest-two-contents-country">
                                            <div class="single-guest-two-contents-country-flag">
                                                <img src="assets/img/guest/usa.png" alt="flag" />
                                            </div>
                                            <span class="single-guest-two-contents-country-name">
                                                USA
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <p class="single-guest-two-para mt-3">
                                    Amet minim mollit non deserunt ullamco est sit aliq dolor do
                                    amet sint. Velit officia consequat duis enilk velit mollit.
                                </p>
                            </div>
                        </div>
                        <div class="guest-two-item">
                            <div class="single-guest-two single-guest-two-border radius-20">
                                <div class="single-guest-two-flex">
                                    <div class="single-guest-two-thumb">
                                        <a href="javascript:void(0)">
                                            <img src="assets/img/guest/g3.jpg" alt="img" />
                                        </a>
                                    </div>
                                    <div class="single-guest-two-contents">
                                        <h4 class="single-guest-two-contents-title">
                                            <a href="javascript:void(0)"> Guy Hawkins </a>
                                        </h4>
                                        <div class="single-guest-two-contents-country">
                                            <div class="single-guest-two-contents-country-flag">
                                                <img src="assets/img/guest/netherland.png" alt="flag" />
                                            </div>
                                            <span class="single-guest-two-contents-country-name">
                                                Netherland
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <p class="single-guest-two-para mt-3">
                                    Amet minim mollit non deserunt ullamco est sit aliq dolor do
                                    amet sint. Velit officia consequat duis enilk velit mollit.
                                </p>
                            </div>
                        </div>
                        <div class="guest-two-item">
                            <div class="single-guest-two single-guest-two-border radius-20">
                                <div class="single-guest-two-flex">
                                    <div class="single-guest-two-thumb">
                                        <a href="javascript:void(0)">
                                            <img src="assets/img/guest/g2.jpg" alt="img" />
                                        </a>
                                    </div>
                                    <div class="single-guest-two-contents">
                                        <h4 class="single-guest-two-contents-title">
                                            <a href="javascript:void(0)"> Guy Hawkins </a>
                                        </h4>
                                        <div class="single-guest-two-contents-country">
                                            <div class="single-guest-two-contents-country-flag">
                                                <img src="assets/img/guest/usa.png" alt="flag" />
                                            </div>
                                            <span class="single-guest-two-contents-country-name">
                                                USA
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <p class="single-guest-two-para">
                                    Amet minim mollit non deserunt ullamco est sit aliq dolor do
                                    amet sint. Velit officia consequat duis enilk velit mollit.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="attraction-area pat-50 pab-50">
        <div class="container">
            <div class="section-title center-text">
                <h2 class="title">Clicks around our hotels</h2>
                <div class="section-title-line"></div>
            </div>
            <div class="row g-4 mt-4">
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="single-attraction-two radius-20">
                        <div class="single-attraction-two-thumb">
                            <a href="assets/img/single-page/cl1.jpg" class="gallery-popup-two">
                                <img src="assets/img/single-page/cl1.jpg" alt="img" />
                            </a>
                        </div>
                        <div class="single-attraction-two-contents">
                            <h4 class="single-attraction-two-contents-title">
                                <a href="hotel_details.html"> Eiffel Tower </a>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="single-attraction-two radius-20">
                        <div class="single-attraction-two-thumb">
                            <a href="assets/img/single-page/cl2.jpg" class="gallery-popup-two">
                                <img src="assets/img/single-page/cl2.jpg" alt="img" />
                            </a>
                        </div>
                        <div class="single-attraction-two-contents">
                            <h4 class="single-attraction-two-contents-title">
                                <a href="hotel_details.html"> Disneyland </a>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="single-attraction-two radius-20">
                        <div class="single-attraction-two-thumb">
                            <a href="assets/img/single-page/cl3.jpg" class="gallery-popup-two">
                                <img src="assets/img/single-page/cl3.jpg" alt="img" />
                            </a>
                        </div>
                        <div class="single-attraction-two-contents">
                            <h4 class="single-attraction-two-contents-title">
                                <a href="hotel_details.html"> Palace de justice </a>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="single-attraction-two radius-20">
                        <div class="single-attraction-two-thumb">
                            <a href="assets/img/single-page/cl4.jpg" class="gallery-popup-two">
                                <img src="assets/img/single-page/cl4.jpg" alt="img" />
                            </a>
                        </div>
                        <div class="single-attraction-two-contents">
                            <h4 class="single-attraction-two-contents-title">
                                <a href="hotel_details.html"> Arc de Trimorph </a>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="single-attraction-two radius-20">
                        <div class="single-attraction-two-thumb">
                            <a href="assets/img/single-page/cl5.jpg" class="gallery-popup-two">
                                <img src="assets/img/single-page/cl5.jpg" alt="img" />
                            </a>
                        </div>
                        <div class="single-attraction-two-contents">
                            <h4 class="single-attraction-two-contents-title">
                                <a href="hotel_details.html"> Disneyland </a>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="single-attraction-two radius-20">
                        <div class="single-attraction-two-thumb">
                            <a href="assets/img/single-page/cl6.jpg" class="gallery-popup-two">
                                <img src="assets/img/single-page/cl6.jpg" alt="img" />
                            </a>
                        </div>
                        <div class="single-attraction-two-contents">
                            <h4 class="single-attraction-two-contents-title">
                                <a href="hotel_details.html"> Disneyland </a>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="single-attraction-two radius-20">
                        <div class="single-attraction-two-thumb">
                            <a href="assets/img/single-page/cl7.jpg" class="gallery-popup-two">
                                <img src="assets/img/single-page/cl7.jpg" alt="img" />
                            </a>
                        </div>
                        <div class="single-attraction-two-contents">
                            <h4 class="single-attraction-two-contents-title">
                                <a href="hotel_details.html"> Disneyland </a>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="single-attraction-two radius-20">
                        <div class="single-attraction-two-thumb">
                            <a href="assets/img/single-page/cl8.jpg" class="gallery-popup-two">
                                <img src="assets/img/single-page/cl8.jpg" alt="img" />
                            </a>
                        </div>
                        <div class="single-attraction-two-contents">
                            <h4 class="single-attraction-two-contents-title">
                                <a href="hotel_details.html"> Disneyland </a>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="question-area pat-50 pab-50">
        <div class="container">
            <div class="section-title center-text">
                <h2 class="title">Frequently Asked Question</h2>
                <div class="section-title-line"></div>
            </div>
            <div class="row g-4 mt-4">
                <div class="col-xl-8 col-lg-7">
                    <div class="faq-wrapper">
                        <div class="faq-contents">
                            <div class="faq-item wow fadeInLeft" data-wow-delay=".1s">
                                <h3 class="faq-title">How does it works?</h3>
                                <div class="faq-panel">
                                    <p class="faq-para">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Non ipsum purus erat aliquam fermentum, tincidunt. Massa
                                        id faucibus orci nunc sed turpis nibh neque. Ut tellus
                                        curabitur arcu, mollis malesuada arcu.
                                    </p>
                                </div>
                            </div>
                            <div class="faq-item active open wow fadeInLeft" data-wow-delay=".2s">
                                <h3 class="faq-title">Do I get full refund if I cancel?</h3>
                                <div class="faq-panel">
                                    <p class="faq-para">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Non ipsum purus erat aliquam fermentum, tincidunt. Massa
                                        id faucibus orci nunc sed turpis nibh neque. Ut tellus
                                        curabitur arcu, mollis malesuada arcu.
                                    </p>
                                </div>
                            </div>
                            <div class="faq-item wow fadeInLeft" data-wow-delay=".3s">
                                <h3 class="faq-title">Do you offer pool service?</h3>
                                <div class="faq-panel">
                                    <p class="faq-para">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Non ipsum purus erat aliquam fermentum, tincidunt. Massa
                                        id faucibus orci nunc sed turpis nibh neque. Ut tellus
                                        curabitur arcu, mollis malesuada arcu.
                                    </p>
                                </div>
                            </div>
                            <div class="faq-item wow fadeInLeft" data-wow-delay=".1s">
                                <h3 class="faq-title">What if I want to cancel?</h3>
                                <div class="faq-panel">
                                    <p class="faq-para">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Non ipsum purus erat aliquam fermentum, tincidunt. Massa
                                        id faucibus orci nunc sed turpis nibh neque. Ut tellus
                                        curabitur arcu, mollis malesuada arcu.
                                    </p>
                                </div>
                            </div>
                            <div class="faq-item wow fadeInLeft" data-wow-delay=".1s">
                                <h3 class="faq-title">What’s the closure time?</h3>
                                <div class="faq-panel">
                                    <p class="faq-para">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        Non ipsum purus erat aliquam fermentum, tincidunt. Massa
                                        id faucibus orci nunc sed turpis nibh neque. Ut tellus
                                        curabitur arcu, mollis malesuada arcu.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="faq-question faq-question-border radius-10 sticky-top">
                        <h3 class="faq-question-title">Still got questions?</h3>
                        <div class="faq-question-form custom-form mat-20">
                            <form action="#">
                                <div class="single-input">
                                    <label class="label-title"> Name </label>
                                    <input type="text" class="form--control radius-10" placeholder="Type Name" />
                                </div>
                                <div class="single-input">
                                    <label class="label-title"> Email </label>
                                    <input type="text" class="form--control radius-10" placeholder="Type Email" />
                                </div>
                                <div class="single-input">
                                    <label class="label-title"> Questions </label>
                                    <textarea name="message" class="form--control form-message radius-10" placeholder="Type Your Questons..."></textarea>
                                </div>
                                <button class="submit-btn w-100 radius-10" type="submit">
                                    Submit
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-area pat-50 pab-50">
        <div class="container">
            <div class="section-title center-text">
                <h2 class="title">Latest News</h2>
                <div class="section-title-line"></div>
            </div>
            <div class="row gy-4 mt-4">
                <div class="col-xxl-4 col-lg-4 col-md-6">
                    <div class="single-blog blog-two">
                        <div class="single-blog-thumbs">
                            <a href="blog_details.html">
                                <img class="lazyloads" src="assets/img/blog/blog1.jpg" alt="" />
                            </a>
                            <div class="single-blog-thumbs-date">
                                <a href="javascript:void(0)">
                                    <span class="date"> 18 </span>
                                    <span class="month"> Jun </span>
                                </a>
                            </div>
                        </div>
                        <div class="single-blog-contents mt-3">
                            <div class="single-blog-contents-tags mt-3">
                                <span class="single-blog-contents-tags-item">
                                    <a href="javascript:void(0)">
                                        <i class="fa-solid fa-tag"></i> Hotel
                                    </a>
                                </span>
                                <span class="single-blog-contents-tags-item">
                                    <a href="javascript:void(0)"> 22 Comments </a>
                                </span>
                            </div>
                            <h4 class="single-blog-contents-title mt-3">
                                <a href="blog_details.html">
                                    Great Deals to Send Your Loved Ones Somewhere Nice
                                </a>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-lg-4 col-md-6">
                    <div class="single-blog blog-two">
                        <div class="single-blog-thumbs">
                            <a href="blog_details.html">
                                <img class="lazyloads" src="assets/img/blog/blog2.jpg" alt="" />
                            </a>
                            <div class="single-blog-thumbs-date">
                                <a href="javascript:void(0)">
                                    <span class="date"> 19 </span>
                                    <span class="month"> Jun </span>
                                </a>
                            </div>
                        </div>
                        <div class="single-blog-contents mt-3">
                            <div class="single-blog-contents-tags mt-3">
                                <span class="single-blog-contents-tags-item">
                                    <a href="javascript:void(0)">
                                        <i class="fa-solid fa-tag"></i> Hotel
                                    </a>
                                </span>
                                <span class="single-blog-contents-tags-item">
                                    <a href="javascript:void(0)"> 25 Comments </a>
                                </span>
                            </div>
                            <h4 class="single-blog-contents-title mt-3">
                                <a href="blog_details.html">
                                    Read Real Guest Reviews. 24/7 Customer Service and others.
                                </a>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-lg-4 col-md-6">
                    <div class="single-blog blog-two">
                        <div class="single-blog-thumbs">
                            <a href="blog_details.html">
                                <img class="lazyloads" src="assets/img/blog/blog3.jpg" alt="" />
                            </a>
                            <div class="single-blog-thumbs-date">
                                <a href="javascript:void(0)">
                                    <span class="date"> 20 </span>
                                    <span class="month"> Jun </span>
                                </a>
                            </div>
                        </div>
                        <div class="single-blog-contents mt-3">
                            <div class="single-blog-contents-tags mt-3">
                                <span class="single-blog-contents-tags-item">
                                    <a href="javascript:void(0)">
                                        <i class="fa-solid fa-tag"></i> Hotel
                                    </a>
                                </span>
                                <span class="single-blog-contents-tags-item">
                                    <a href="javascript:void(0)"> 12 Comments </a>
                                </span>
                            </div>
                            <h4 class="single-blog-contents-title mt-3">
                                <a href="blog_details.html">
                                    Compare hotel prices and find an amazing price for the
                                    Resort
                                </a>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="brand-area pat-50 pab-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="global-slick-init attraction-slider slider-inner-margin" data-slidesToShow="6"
                        data-infinite="true" data-arrows="false" data-dots="false" data-swipeToSlide="true"
                        data-autoplay="true" data-autoplaySpeed="2500"
                        data-prevArrow='<div class="prev-icon"><i class="las la-angle-left"></i></div>'
                        data-nextArrow='<div class="next-icon"><i class="las la-angle-right"></i></div>'
                        data-responsive='[{"breakpoint": 1400,"settings": {"slidesToShow": 5}},{"breakpoint": 1200,"settings": {"slidesToShow": 4}},{"breakpoint": 992,"settings": {"slidesToShow": 3}},{"breakpoint": 576, "settings": {"slidesToShow": 2} }]'>
                        <div class="single-brand">
                            <a href="javascript:void(0)" class="single-brand-thumb">
                                <img src="assets/img/single-page/logo1.png" alt="brandLogo" />
                            </a>
                        </div>
                        <div class="single-brand">
                            <a href="javascript:void(0)" class="single-brand-thumb">
                                <img src="assets/img/single-page/logo2.png" alt="brandLogo" />
                            </a>
                        </div>
                        <div class="single-brand">
                            <a href="javascript:void(0)" class="single-brand-thumb">
                                <img src="assets/img/single-page/logo3.png" alt="brandLogo" />
                            </a>
                        </div>
                        <div class="single-brand">
                            <a href="javascript:void(0)" class="single-brand-thumb">
                                <img src="assets/img/single-page/logo4.png" alt="brandLogo" />
                            </a>
                        </div>
                        <div class="single-brand">
                            <a href="javascript:void(0)" class="single-brand-thumb">
                                <img src="assets/img/single-page/logo5.png" alt="brandLogo" />
                            </a>
                        </div>
                        <div class="single-brand">
                            <a href="javascript:void(0)" class="single-brand-thumb">
                                <img src="assets/img/single-page/logo6.png" alt="brandLogo" />
                            </a>
                        </div>
                        <div class="single-brand">
                            <a href="javascript:void(0)" class="single-brand-thumb">
                                <img src="assets/img/single-page/logo3.png" alt="brandLogo" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
