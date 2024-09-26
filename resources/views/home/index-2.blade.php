@extends('layouts.app')

@section('content')
<main>
    <section class="banner">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($banners as $banner)
                <div class="carousel-item active" data-bs-interval="2000">
                    <img src="{{ env('UPLOADED_ASSETS') .'uploads/home_banner/'. $banner->banner_image }}" class="d-block bannerImg" alt="...">

                    <!-- <img src="images/banner.jpg" class="d-block bannerImg" alt="..."> -->
                    <div class="container bannerDetails">
                        <h1><span>{{ $banner->title }}</span> <label></label></h1>
                        <p>{{ $banner->subtitle }}</p>
                        <div class="bannerBtns"><a href="{{ url('/ferry-booking') }}" class="me-3 btn">Book
                                Ferry</a><a href="{{ url('/boat-list') }}" class="btn">Book
                                Boat</a></div>
                    </div>
                    <div class="socialIcon">
                        <a href="#" class="me-2"><img src="{{ asset('assets/images/instagram.svg') }}" alt=""></a>
                        <a href="#" class="me-2"><img src="{{ asset('assets/images/facebook.svg') }}" alt=""></a>
                        <a href="#" class="me-2"><img src="{{ asset('assets/images/youtube.svg') }}" alt=""></a>
                    </div>

                </div>
                @endforeach

            </div>

        </div>
    </section>

    <section class="ourStats mb-5 py-1">
        <div class="container">
            <div class="d-flex justify-content-between ourStatsScroll  align-items-center">
                <div class="mb-sm-0 d-flex align-items-center justify-content-center">
                    <div class="d-flex align-items-center justify-content-center">
                        <!-- <img src="images/Google.svg" width="30px" alt=""> -->
                        <img src="{{ asset('assets/images/Google.svg') }}" width="30px" alt="">
                        <p class="mb-0 ms-1 fw-bold fs-4">4.2</p>
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <!-- <img src="images/star-rate.svg" width="30px" alt=""> -->
                        <img src="{{ asset('assets/images/star-rate.svg') }}" width="30px" alt="">
                        <p class="mb-0">Rated</p>
                    </div>
                </div>
                <div class=" mb-sm-0">
                    <div class="d-flex align-items-center justify-content-center ">
                        <img src="{{ asset('assets/images/green-tick.svg') }}" width="30px" alt="">
                        <!-- <img src="images/green-tick.svg" width="30px" alt=""> -->
                        <p class="mb-0 ms-1 ">100% Rating</p>
                    </div>

                </div>
                <div class=" mb-sm-0">
                    <div class="d-flex align-items-center justify-content-center ">
                        <img src="{{ asset('assets/images/green-tick.svg') }}" width="30px" alt="">
                        <!-- <img src="images/green-tick.svg" width="30px" alt=""> -->
                        <p class="mb-0 ms-1 ">100% Rating</p>
                    </div>

                </div>
                <div class=" mb-sm-0">
                    <div class="d-flex align-items-center justify-content-center ">
                        <img src="{{ asset('assets/images/green-tick.svg') }}" width="30px" alt="">
                        <!-- <img src="images/green-tick.svg" width="30px" alt=""> -->
                        <p class="mb-0 ms-1 ">100% Rating</p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="bookingCardSec">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <a href="{{ url('/ferry-booking') }}" class="bookingCard text-decoration-none">
                        <p class="mb-0"> Book <span>FERRY</span> <br>
                            Book Your Suitable Ferry</p>
                        <img src="{{ 'assets/images/ferry_curved.png' }}" alt="hello">
                        <!-- <img src="images/ferry.png" alt=""> -->
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 mt-3 mt-md-0">
                    <a href="{{ url('/boat-list') }}" class="bookingCard text-decoration-none">
                        <p class="mb-0"> Book <span>Boat</span> <br>
                            Book Your Suitable Boat</p>
                        <img src="{{ 'assets/images/boat.png' }}" alt="">
                        <!-- <img src="images/boat.png" alt=""> -->
                    </a>
                </div>

            </div>
        </div>
    </section>

    <section class=" mt-5 pt-3">
        <div class="container">
            <div class="row secHead">
                <div class="col-12 text-center">
                    <h2>We are collaborated with</h2>
                </div>
            </div>
            <div class="cardSlider mt-4">
                <div class="row">
                    <div class="col-12 secHead">
                        <h3>Ferries to Choose From</h3>
                    </div>
                    <div class="col-12">
                        <div class="ferryCardSlider owl-carousel owl-theme" id="ferryCardSlider">
                            @foreach ($collaborated as $collaborate)
                            <div class="item">
                                <div class="ferryCard ferrySearch border-1 border d-block text-center mb-3">
                                    <div class="ferryImg mb-3" style="width: 100%; height: 200px; object-fit: cover;">

                                        {{-- <img src="{{ url($collaborate->image) }}" alt="hello"> --}}
                                        <img src="{{ env('UPLOADED_ASSETS') . $collaborate->image }}" alt="Ferry Image" style="">
                                    </div>
                                    <div class="ferryDetails ms-3 d-grid align-content-between">
                                        <h4 class=" mb-3">{{ $collaborate->title }}</h4>
                                        <p></p>
                                        <a href="{{ url('/ferry-booking') }}" class="btn justify-content-center">Book
                                            Now</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12 secHead">
                        <h3>Boats to Choose From</h3>
                    </div>
                    <div class="col-12">
                        <div class="ferryCardSlider owl-carousel owl-theme" id="boatCardSlider">
                            @foreach ($boat_lists as $boat_list)
                            <div class="item">
                                <div class="ferryCard boatCard ferrySearch  mb-3">
                                    <div class="ferryImg" >
                                        <img src="{{ env('UPLOADED_ASSETS') . 'uploads/boat/' . $boat_list->image }}">
                                    </div>
                                    <div class="ferryDetails ms-3 d-block d-lg-grid align-content-between">
                                        <h4 class="mb-3 mb-lg-0">{{ $boat_list->title }}</h4>

                                        <p class="mb-3 mb-lg-0">
                                            ₹ @if (is_null($boat_list->price))
                                            {{ $boat_schedule_prices->has($boat_list->id) ? $boat_schedule_prices[$boat_list->id]->per_passenger_price : '' }}
                                            @else
                                            {{ $boat_list->price }}
                                            @endif
                                        </p>
                                        <a href="{{ url('/boat-list') }}" class="btn">Book Now</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class=" mt-5 py-5 weOffer">
        <div class="container">

            <div class="row justify-content-center align-items-center">
                <div class="col-12">
                    <div class="row secHead">
                        <div class="col-12 text-center">
                            <h2>Why Book With Us?</h2>

                        </div>
                    </div>
                </div>
                <div class="col-12 p-0">
                    <div class="row weOfferPoints mt-4">
                        <div class="col-3 px-3 text-center mb-3">
                            <img src="{{ asset('assets/images/trusted.svg') }}" alt="">
                            <!-- <img src="images/trusted.svg" alt=""> -->
                            <h3>100% Trusted Agency</h3>
                        </div>
                        <div class="col-3 px-3 text-center mb-3">
                            <img src="{{ asset('assets/images/approval.svg') }}" alt="">
                            <!-- <img src="images/approval.svg" alt=""> -->
                            <h3>Delightful Customer experience</h3>
                        </div>
                        <div class="col-3 px-3 text-center mb-3">
                            <img src="{{ asset('assets/images/authorized.svg') }}" alt="">
                            <!-- <img src="images/authorized.svg" alt=""> -->
                            <h3>Authorized in-house travel</h3>
                        </div>
                        <div class="col-3 px-3 text-center mb-3">
                            <img src="{{ asset('assets/images/customer-support.svg') }}" alt="">
                            <!-- <img src="images/customer-support.svg" alt=""> -->
                            <h3>Excellent Customer Support</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class=" mt-5 pt-3">
        <div class="container">
            <div class="row secHead">
                <div class="col-12 text-center">
                    <h2>Top Destination In Andaman </h2>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 owl-carousel owl-theme" id="topDestinations">
                    @foreach ($tourlocations as $tourlocation)
                    <div class="item">
                        <a href="#" class="destinationCard">
                            <img src="{{ env('UPLOADED_ASSETS') . 'uploads/location/' . $tourlocation->path }}" alt="">
                            <h3>{{ $tourlocation->name }}</h3>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="blogs mt-5 pt-3" id="blog">
        <div class="row secHead w-100 m-0">
            <div class="col-12 text-center">
                <h2>Our Journey Blogs </h2>
            </div>
        </div>
        <div class="blogCards">
            <div class=" container">
                <div class="row mt-4">
                    <div class="col-12 owl-carousel owl-theme" id="blogs">
                        @foreach ($blogs as $blog)
                        <div class="item ">
                            <div class="blogcard">
                                <div class="blogImg">
                                    <img src="{{ env('UPLOADED_ASSETS') .'uploads/blog/'. $blog->path }}" alt="">
                                    <!-- <img src="images/scuba-diving.png" alt=""> -->
                                </div>
                                <div class="blogCardInfo">
                                    <span>{{ $blog->author_name }}
                                        {{ date('d M, Y', strtotime($blog->created_at)) }}</span>
                                    <h3>{{ $blog->title }}</h3>                                                                                                                                                                                                                                                                           
                                    <a href="{{ url('blog/' . $blog->id) }}">Read More <img src="{{ asset('assets/images/read-more.svg') }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="{{ url('/blog_list') }}" class="btn btn-light px-4">View More</a>
            </div>
        </div>

    </section>

    <section class="mt-5 pt-3">
        <div class="row justify-content-center secHead w-100 m-0">
            <div class="col-12 col-lg-6 text-center">
                <h2>What They Say About Us</h2>
            </div>
        </div>
        <div class="testimonials">
            <div class="container">
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        @foreach ($testimonials as $key =>$testimonial)
                        @if ($key==0)
                        <div class="carousel-item active">
                            <div class="row align-items-center">
                                <div class="col-12 col-sm-12 col-md-7">
                                    <div class="comment">
                                        <div class="text-white">
                                            <p>{{ $testimonial->subtitle }}</p>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-5">
                                    <div class="profileInfo">
                                        <div class="profilePic">
                                            <img src="{{ env('UPLOADED_ASSETS'). $testimonial->path }}" alt="">
                                        </div>
                                        <h3>{{ $testimonial->title }}</h3>
                                        <p class="text-white">

                                            {{ $testimonial->designation }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else

                        <div class="carousel-item ">
                            <div class="row align-items-center">
                                <div class="col-12 col-sm-12 col-md-7">
                                    <div class="comment">
                                        <div class="text-white">

                                            <p>{{ $testimonial->subtitle }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-5">
                                    <div class="profileInfo">
                                        <div class="profilePic">
                                            <img src="{{ env('UPLOADED_ASSETS') . $testimonial->path }}" alt="">
                                        </div>
                                        <div>
                                            <h3>{{ $testimonial->title }}</h3>
                                            <p class="text-white">
                                                {{ $testimonial->designation }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <img src="images/left_arrow_white.svg" alt="">
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <img src="images/right_arrow_white.svg" alt="">
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

            </div>
        </div>
    </section>


    <section class="faqSec mt-5" id="faq">
        <div class="row secHead w-100 m-0">
            <div class="col-12 text-center">
                <h2>FAQs</h2>
            </div>
        </div>
        <div class="container mt-4">
            <div class="row">
                <div class="col-12">
                    <div class="accordion bg-transparent" id="accordionExample">
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($faqs as $faq)
                        <div class="accordion-item bg-transparent">
                            <h2 class="accordion-header bg-transparent">
                                <button class="accordion-button bg-transparent collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $i }}" aria-expanded="true" aria-controls="collapseOne">
                                    {{ $faq->questions }}
                                </button>
                            </h2>
                            <div id="collapse{{ $i++ }}" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    {{ $faq->answers }}
                                </div>
                            </div>
                        </div>
                        @endforeach

                        {{-- <div class="accordion-item bg-transparent">
                                <h2 class="accordion-header bg-transparent">
                                    <button class="accordion-button bg-transparent collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="true"
                                        aria-controls="collapse2">
                                        What is Fronted Mentor, and how will it help me?
                                    </button>
                                </h2>
                                <div id="collapse2" class="accordion-collapse collapse "
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Frontend Mentor offers realistc coding challenges to help developers improve
                                        their fronted coding skills with projects in HTML, CSS, and JavaScript. It’s
                                        suitable for all levels and ideal for porfolio building.
                                    </div>
                                </div>
                            </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection