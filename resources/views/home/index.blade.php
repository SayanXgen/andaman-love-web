@extends('layouts.layout')

@section('content')
<style>
    .text-center.home-loader {
        margin-top: 15%;
    }

    @media screen and (max-width: 556px) {
        .text-center.home-loader {
            margin-top: 60%;
        }
    }
</style>
<!-- banner -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12 p-0">
            <div class="ferry_banner" id="bookConsole">
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">

                        <!-- @php
                    $first = true;
                @endphp
                @foreach ($banners as $banner)
                    <div class="carousel-item {{ $first ? 'active' : '' }}">
                       <img src="{{ env('UPLOADED_ASSETS') .'uploads/home_banner/'. $banner->banner_image }}" class="d-block " alt="banner">
                    </div>
                    @php
                       $first = false; // Set the flag to false after the first iteration
                    @endphp
                @endforeach -->

                        <div class="carousel-item active">
                            <img src="{{ asset('asset/img/Banner-1.webp') }}"
                                class="d-block w-md-100 w-auto h-md-auto h-100 d-none d-md-block" alt="banner">
                            <img src="{{ asset('asset/img/Banner-1.webp') }}"
                                class="d-block w-md-100 w-auto h-md-auto h-100 d-block d-md-none" alt="banner">
                            <div class="carousel-caption ">
                                <h1>First slide label</h1>
                                <p class="mb-2">Some representative placeholder content for the first slide.</p>
                                <div class="d-flex justify-content-center flex-wrap">
                                    <div class="d-flex justify-content-center align-items-center mx-2">
                                        <i class="bi bi-ticket-fill me-2"></i> <span class="fw-semibold">1,50,000+ tickets booked</span>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center mx-2">
                                        <div class="starRating me-2">
                                            <span class="bi bi-star-fill checked"></span>
                                            <span class="bi bi-star-fill checked"></span>
                                            <span class="bi bi-star-fill checked"></span>
                                            <span class="bi bi-star-fill checked"></span>
                                            <span class="bi bi-star-fill"></span>

                                        </div>
                                        <span class="fw-semibold">4 rated service</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('asset/img/about-company-banner-min.webp') }}"
                                class="d-block w-md-100 w-auto h-md-auto h-100 d-none d-md-block" alt="banner">
                            <img src="{{ asset('asset/img/about-company-banner-min.webp') }}"
                                class="d-block w-md-100 w-auto h-md-auto h-100 d-block d-md-none" alt="banner">
                            <div class="carousel-caption ">
                                <h1>First slide label</h1>
                                <p class="mb-2">Some representative placeholder content for the first slide.</p>
                                <div class="d-flex justify-content-center flex-wrap">
                                    <div class="d-flex justify-content-center align-items-center mx-2">
                                        <i class="bi bi-ticket-fill me-2"></i> <span class="fw-semibold">1,50,000+ tickets booked</span>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center mx-2">
                                        <div class="starRating me-2">
                                            <span class="bi bi-star-fill checked"></span>
                                            <span class="bi bi-star-fill checked"></span>
                                            <span class="bi bi-star-fill checked"></span>
                                            <span class="bi bi-star-fill checked"></span>
                                            <span class="bi bi-star-fill"></span>

                                        </div>
                                        <span class="fw-semibold">4 rated service</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <button class="carousel-control-prev" name="prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" name="next" type="button" data-bs-target="#carouselExampleAutoplaying"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="bookingConsole">
                    <div class="tabBtns  d-flex align-items-center">
                        <div class="d-flex align-items-start tabBtn tabBtn1 active" data-list="1" id="one-way">
                            <img src="{{ asset('asset/img/one-way-inactive.webp') }}" class="icon-inactive" alt="icon" width="20" height="20">
                            <img src="{{ asset('asset/img/one-way-active.webp') }}" class="icon-active" alt="icon" width="20" height="20">
                            <p class="mb-0 ms-2">One Way</p>
                        </div>
                        <div class="d-flex align-items-center tabBtn tabBtn2" data-list="2" id="round-trip">
                            <img src="{{ asset('asset/img/return-inactive.webp') }}" class="icon-inactive" alt="icon" width="20" height="20">
                            <img src="{{ asset('asset/img/return-active.webp') }}" class="icon-active" alt="icon" width="20" height="20">
                            <p class="mb-0 ms-2">Round</p>
                        </div>
                    </div>

                    <div class="position-relative tabContainer">
                        <form action="{{ route('search-result-ferry') }}" id="one-way-form" method="GET">
                            <input type="hidden" name="trip_type" id="trip_type" value="1">
                            <div class="tabs tabs1 row mx-0">
                                <div class="col-12 col-md-6 col-sm-6 col-lg-3 mb-2 mb-lg-0 border-0 border-md-end">
                                    <label for="form_location">From</label>
                                    <select name="form_location" class="form-select border-0 p-0" id="form_location">
                                        @foreach ($ferry_locations as $index => $ferry_location)
                                        <option value="{{ $ferry_location->id }}"
                                            {{ $index + 1 == 1 ? 'selected' : '' }}>
                                            {{ $ferry_location->title }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0 border-0 border-md-end">
                                    <label for="to_location">To</label>
                                    <select name="to_location" class="form-select border-0 p-0" id="to_location">
                                        @foreach ($ferry_locations as $index => $ferry_location)
                                        <option value="{{ $ferry_location->id }}"
                                            {{ $index + 1 == 2 ? 'selected' : '' }}>
                                            {{ $ferry_location->title }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0 border-0 border-md-end">
                                    <label for="date">Date</label>
                                    <input type="text" class="my_date_picker" placeholder="Select Date" id="date" name="date" readonly>
                                </div>
                                <div class="col-12 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0 border-0 border-md-end">
                                    <label for="passenger">Passengers (1+ yr)</label>
                                    <input type="number" name="passenger" value="1" max="9" min="1" id="passenger" placeholder="No. of Pax" required>
                                </div>
                                <div class="col-12 col-md-6 col-sm-6 col-lg  mb-2 mb-lg-0 ">
                                    <label for="location6">Infant (0-1 years)</label>
                                    <input type="number" name="infant" id="location6" max="4" placeholder="No. of Infant">
                                </div>
                                <div class="col-12 col-md-6 col-sm-6 col-lg-2 mb-2 mb-lg-0">
                                    <button class="btn button w-100 searchBtn"><i class="bi bi-search"></i>Search</button>
                                </div>
                            </div>
                        </form>

                        <form action="{{ route('search-result-ferry') }}" method="GET" id="round-trip-form">
                            <input type="hidden" name="trip_type" id="trip_type_round" value="3">
                            <div class="tabs tabs2 mx-0">
                                <!-- First Section -->
                                <div class="row border-bottom pb-3 align-items-center" id="section1">
                                    <!-- Form fields for section 1 -->
                                    <div class="col-12 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0 border-0 border-md-end">
                                        <label for="form_location">From</label>
                                        <select name="form_location" class="form-select border-0 p-0" id="form_location1">
                                            @foreach ($ferry_locations as $index => $ferry_location)
                                            <option value="{{ $ferry_location->id }}" {{ $index + 1 == 1 ? 'selected' : '' }}>
                                                {{ $ferry_location->title }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0 border-0 border-md-end">
                                        <label for="to_location">To</label>
                                        <select name="to_location" class="form-select border-0 p-0" id="to_location1">
                                            @foreach ($ferry_locations as $index => $ferry_location)
                                            <option value="{{ $ferry_location->id }}" {{ $index + 1 == 2 ? 'selected' : '' }}>
                                                {{ $ferry_location->title }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0 border-0 border-md-end">
                                        <label for="date">Date</label>
                                        <input type="text" name="date" class="my_date_picker" placeholder="Select Date" id="round_date" min="<?php echo date('Y-m-d'); ?>" readonly>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0 border-0 border-md-end">
                                        <label for="passenger2">Passengers (1+ yr)</label>
                                        <input type="number" name="passenger" max="9" min="1" value="1" id="passenger2" placeholder="No. of Pax" required>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0">
                                        <label for="location10">Infant (0-1 years)</label>
                                        <input type="number" name="infant" id="location10" min="1" max="4" placeholder="No. of Infant">
                                    </div>
                                    <div class="col-3 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0"></div>
                                </div>

                                <!-- Second Section -->
                                <div class="row pt-4 border-bottom pb-3 align-items-center" id="section2">
                                    <!-- Form fields for section 2 -->
                                    <div class="col-12 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0 border-0 border-md-end">
                                        <label for="form_location">From</label>
                                        <select name="round1_from_location" class="form-select border-0 p-0" id="form_location2">
                                            @foreach ($ferry_locations as $index => $ferry_location)
                                            <option value="{{ $ferry_location->id }}" {{ $index + 1 == 2 ? 'selected' : '' }}>
                                                {{ $ferry_location->title }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0 border-0 border-md-end">
                                        <label for="to_location">To</label>
                                        <select name="round1_to_location" class="form-select border-0 p-0" id="to_location2">
                                            @foreach ($ferry_locations as $index => $ferry_location)
                                            <option value="{{ $ferry_location->id }}" {{ $index + 1 == 3 ? 'selected' : '' }}>
                                                {{ $ferry_location->title }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-9 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0 border-0 border-md-end">
                                        <label for="date">Date</label>
                                        <input type="text" name="round1_date" class="my_date_picker1" placeholder="Select Date" id="round1_date" min="<?php echo date('Y-m-d'); ?>" readonly>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0">
                                        <label for="passenger3">Passengers (1+ yr)</label>
                                        <input type="number" name="round1_passenger" value="1" max="9" min="1" id="passenger3" required>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0">
                                        <label for="location14">Infant (0-1 years)</label>
                                        <input type="number" name="round1_infant" max="4" id="location14">
                                    </div>
                                    <div class="col-3 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0">
                                        <button type="button" class="btn btn-outline-danger delete" data-section="section2">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- Third Section -->
                                <div class="row border-bottom pb-3 align-items-center" id="section3">
                                    <!-- Form fields for section 3 -->
                                    <div class="col-12 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0 border-0 border-md-end">
                                        <label for="form_location">From</label>
                                        <select name="round2_from_location" class="form-select border-0 p-0" id="form_location3">
                                            @foreach ($ferry_locations as $index => $ferry_location)
                                            <option value="{{ $ferry_location->id }}" {{ $index + 1 == 3 ? 'selected' : '' }}>
                                                {{ $ferry_location->title }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0 border-0 border-md-end">
                                        <label for="to_location">To</label>
                                        <select name="round2_to_location" class="form-select border-0 p-0" id="to_location3">
                                            @foreach ($ferry_locations as $index => $ferry_location)
                                            <option value="{{ $ferry_location->id }}" {{ $index + 1 == 1 ? 'selected' : '' }}>
                                                {{ $ferry_location->title }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-9 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0 border-0 border-md-end">
                                        <label for="date">Date</label>
                                        <input type="text" name="round2_date" class="my_date_picker2" placeholder="Select Date" id="round2_date" min="<?php echo date('Y-m-d'); ?>" readonly>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0">
                                        <label for="passenger4">Passengers (1+ yr)</label>
                                        <input type="number" name="round2_passenger" max="9" min="1" value="1" id="passenger4" required>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0">
                                        <label for="location18">Infant (0-1 years)</label>
                                        <input type="number" name="round2_infant" max="4" id="location18">
                                    </div>
                                    <div class="col-3 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0">
                                        <button type="button" class="btn btn-outline-danger delete" data-section="section3">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="row justify-content-center">
                                    <div class="col-8 col-lg-3 mb-2 mb-lg-0">
                                        <button type="submit" class="btn button w-100 searchBtn mt-3">
                                            <i class="bi bi-search"></i> Search
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- banner -->
<section class="bk_with_us">
    <div class="container">
        <div class="col-12 text-center">
            <h2 class="withus">Why Book<b>With Us?</b></h2>
        </div>
        <div class="ourservicetop">
            <div class="row mt-5 d-flex justify-content-center ourservices">
                <div class="col-3 text-center">
                    <div class="icon_back"> <img src="{{ asset('asset/img/medal-tick-check-mark-svgrepo-com.svg') }}" alt="icon" height="40" width="40" class="img3"></div>
                    <h3 class="pt-3 subh">100% Trusted Agency</h3>
                </div>

                <div class="col-3 text-center">
                    <div class="icon_back"><img src="{{ asset('asset/img/thumbs-up-svgrepo-com.svg') }}" alt="icon" class="img3" height="40" width="40"></div>
                    <h3 class="pt-3 subh">Delightful Customer experience</h3>
                </div>
                <div class="col-3 text-center">
                    <div class="icon_back"><img src="{{ asset('asset/img/shield-tick-svgrepo-com.svg') }}" alt="icon" class="img3" height="40" width="40"></div>
                    <h3 class="pt-3 subh">Authorized Travel Agent</h3>
                </div>
                <div class="col-3 text-center">
                    <div class="icon_back"><img src="{{ asset('asset/img/services.svg') }}" alt="icon" class="img3" height="40" width="40"></div>
                    <h3 class="pt-3 subh">Excellent Customer Support</h3>
                </div>
            </div>
        </div>

    </div>
</section>

<section class="mt-5">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 p-2">
                <div class="card border-0">
                    <img src="{{ asset('asset/img/about-company-banner-min1.webp') }}" class="card-img-top" alt="banner" height="188" width="100">
                    <div class="card-body">
                        <h4 class="card-title">Makruzz <span>Operated by MAK Logistics</span></h4>
                        <div class="  paisa row">
                            <div class=" py-4  class_bx col-12">
                                <h4 class="mb-2">Premium</h4>
                                <p>The economical Premium Class is located on the lower deck and is the most spacious of all the classes, offering the best front and side panoramic views with an inboard kiosk at the centre serving delicious food.</p>
                                <div class="d-flex flex-row justify-content-around prime_icon">
                                    <div class="p-2 class-icn"><img src="{{ asset('asset/img/ship.webp') }}" alt="ship_icon" width="25" height="25"></div>
                                    <div class="p-2 class-icn"><i class="bi bi-thermometer-snow fs-3"></i></div>
                                    <div class="p-2 class-icn"><img src="{{ asset('asset/img/music.svg') }}" alt="music_icon" width="25" height="25"></div>
                                    <div class="p-2 class-icn"><img src="{{ asset('asset/img/cafeteria.webp') }}" alt="cafeteria_icon" width="25" height="25"></div>
                                </div>
                            </div>
                            <div class=" py-4  class_Deluxe col-12">
                                <h4 class="mb-2">Deluxe</h4>
                                <p>Designed for those who cannot bear the cramped seats in airlines, the Deluxe Class is located on the upper deck with 64 comfortable, comfortable seat with extra leg space for the highest standards of comfort.</p>
                                <div class="d-flex flex-row justify-content-around prime_icon">
                                    <div class="p-2 class-icn"><img src="{{ asset('asset/img/ship.webp') }}" alt="ship_icon" width="25" height="25"></div>
                                    <div class="p-2 class-icn"><i class="bi bi-thermometer-snow fs-3"></i></div>
                                    <div class="p-2 class-icn"><img src="{{ asset('asset/img/music.svg') }}" alt="music_icon" width="25" height="25"></div>
                                    <div class="p-2 class-icn"><img src="{{ asset('asset/img/cafeteria.webp') }}" alt="cafeteria_icon" width="25" height="25"></div>
                                </div>
                            </div>
                            <div class=" py-4  class_Royal col-12">
                                <h4 class="mb-2">Royal</h4>
                                <p>Made for those who like to enjoy good views in the luxury of their private cabins, the luxurious Royal Class comes with 8 super comfortable seats and value-added benefits such as priority check-in, charging point, etc. for utmost comfort.</p>
                                <div class="d-flex flex-row  justify-content-around prime_icon ">
                                    <div class="p-2 class-icn"><img src="{{ asset('asset/img/ship.webp') }}" alt="ship_icon" width="25" height="25"></div>
                                    <div class="p-2 class-icn"><i class="bi bi-thermometer-snow fs-3"></i></div>
                                    <div class="p-2 class-icn"><img src="{{ asset('asset/img/music.svg') }}" alt="music_icon" width="25" height="25"></div>
                                    <div class="p-2 class-icn"><img src="{{ asset('asset/img/cafeteria.webp') }}" alt="cafeteria_icon" width="25" height="25"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-lg-6 p-2">
                <div class="card border-0">
                    <img src="{{ asset('asset/img/Banner-2.webp') }}" class="card-img-top" alt="banner" height="188" width="100">
                    <div class="card-body">
                        <h4 class="card-title">Nautika</h4>
                        <div class="  paisa row">
                            <div class=" py-4  class_bx col-12">
                                <h4 class="mb-2">Luxury</h4>
                                <div class="d-flex flex-row justify-content-around prime_icon">
                                    <div class="p-2 class-icn"><img src="{{ asset('asset/img/ship.webp') }}" alt="ship_icon" width="25" height="25"></div>
                                    <div class="p-2 class-icn"><i class="bi bi-thermometer-snow fs-3"></i></div>
                                    <div class="p-2 class-icn"><img src="{{ asset('asset/img/music.svg') }}" alt="music_icon" width="25" height="25"></div>
                                    <div class="p-2 class-icn"><img src="{{ asset('asset/img/cafeteria.webp') }}" alt="cafeteria_icon" width="25" height="25"></div>
                                </div>
                            </div>
                            <div class=" py-4  class_Deluxe col-12">
                                <h4 class="mb-2">Royal</h4>
                                <div class="d-flex flex-row justify-content-around prime_icon">
                                    <div class="p-2 class-icn"><img src="{{ asset('asset/img/ship.webp') }}" alt="ship_icon" width="25" height="25"></div>
                                    <div class="p-2 class-icn"><i class="bi bi-thermometer-snow fs-3"></i></div>
                                    <div class="p-2 class-icn"><img src="{{ asset('asset/img/music.svg') }}" alt="music_icon" width="25" height="25"></div>
                                    <div class="p-2 class-icn"><img src="{{ asset('asset/img/cafeteria.webp') }}" alt="cafeteria_icon" width="25" height="25"></div>
                                </div>
                            </div>
                            <div class=" py-4  class_Royal col-12 bg-transparent">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 col-lg-4 order-lg-2 mb-5 mb-lg-0">
                <img src="{{ asset('asset/img/map.png') }}" class="img-responsive w-100" alt="">
            </div>
            <div class="col-12 col-lg-8 order-lg-1 align-items-center ">
                <div class="text-start">
                    <h2 class="fw-bold  withus">Ferry Routes in <b>Andaman</b></h2>
                    <div class="">
                        <p class="text-start">
                            Andaman &amp; Nicobar Islands is a union territory of India with around 572 islands, of which 38 are inhabited. The primary language in use is Andaman Creole Hindi* and the currency in use is the Indian rupee. Most islands are inhabited by settlers from all over India and in addition, the islands are home to 5 indigenous tribes.
                        </p>
                    </div>

                    <div class="text-start mb-5">
                        <a href="#search-ferry" class="text-white subs btn font-semibold">
                            Book Ferry
                        </a>
                    </div>
                </div>
                <div class="ferryNumbers">
                    <div class="row align-items-center border-bottom pb-2">
                        <div class="col-lg-1 col-2">
                            <img src="{{ asset('asset/img/cruise-ship.png') }}" alt="icon" class="w-100">
                        </div>
                        <div class="col-lg-6 col-5">
                            <h3> Port Blair to Havelock</h3>
                        </div>
                        <div class="col-5">
                            <h3> 14 ferries per day</h3>
                        </div>
                    </div>
                    <div class="row mt-2 align-items-center border-bottom pb-2">
                        <div class="col-lg-1 col-2">
                            <img src="{{ asset('asset/img/cruise-ship.png') }}" alt="icon" class="w-100">
                        </div>
                        <div class="col-lg-6 col-5">
                            <h3> Havelock to Port Blair</h3>
                        </div>
                        <div class="col-5">
                            <h3> 8 ferries per day</h3>
                        </div>
                    </div>
                    <div class="row mt-2 align-items-center border-bottom pb-2">
                        <div class="col-lg-1 col-2">
                            <img src="{{ asset('asset/img/cruise-ship.png') }}" alt="icon" class="w-100">
                        </div>
                        <div class="col-lg-6 col-5">
                            <h3> Havelock to Neil Island</h3>
                        </div>
                        <div class="col-5">
                            <h3> 7 ferries per day</h3>
                        </div>
                    </div>
                    <div class="row mt-2 align-items-center border-bottom pb-2">
                        <div class="col-lg-1 col-2">
                            <img src="{{ asset('asset/img/cruise-ship.png') }}" alt="icon" class="w-100">
                        </div>
                        <div class="col-lg-6 col-5">
                            <h3> Neil Island to Port Blair</h3>
                        </div>
                        <div class="col-5">
                            <h3> 7 ferries per day</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<section>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="withus mb-0"><b>Testimonials</b></h2>
            </div>
        </div>
        <div class="swiper mySwiper2 pt-5">
            <div class="swiper-wrapper">
                <div class="swiper-slide testimonial-slide">
                    <p class="outer_bx">
                        Google
                    </p>
                    <div>
                        <span class="star_no pe-2">5.0</span><span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                    </div>
                    <div class="testimonial_review mt-3">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit officiis nulla
                            libero dolorem. Beatae, magni itaque? Nobis excepturi laborum dolor nemo assumenda
                            nam, deserunt voluptatum, fuga facilis expedita, sit maiores?</p>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <!--<div class="testimonial_img">
                            M
                        </div>-->
                        <div class="testimonial_name">
                            <p class="mb-0">Jondo Ipsum</p>
                            <span class="mb-0">29 May 2024</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide testimonial-slide">
                    <p class="outer_bx">
                        Google
                    </p>
                    <div>
                        <span class="star_no pe-2">5.0</span><span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                    </div>
                    <div class="testimonial_review mt-3">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit officiis nulla
                            libero dolorem. Beatae, magni itaque? Nobis excepturi laborum dolor nemo assumenda
                            nam, deserunt voluptatum, fuga facilis expedita, sit maiores?</p>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <!--<div class="testimonial_img">
                            M
                        </div>-->
                        <div class="testimonial_name">
                            <p class="mb-0">Jondo Ipsum</p>
                            <span class="mb-0">29 May 2024</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide testimonial-slide">
                    <p class="outer_bx">
                        Google
                    </p>
                    <div>
                        <span class="star_no pe-2">5.0</span><span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                    </div>
                    <div class="testimonial_review mt-3">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit officiis nulla
                            libero dolorem. Beatae, magni itaque? Nobis excepturi laborum dolor nemo assumenda
                            nam, deserunt voluptatum, fuga facilis expedita, sit maiores?</p>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <!--<div class="testimonial_img">
                            M
                        </div>-->
                        <div class="testimonial_name">
                            <p class="mb-0">Jondo Ipsum</p>
                            <span class="mb-0">29 May 2024</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide testimonial-slide">
                    <p class="outer_bx">
                        Google
                    </p>
                    <div>
                        <span class="star_no pe-2">5.0</span><span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                    </div>
                    <div class="testimonial_review mt-3">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit officiis nulla
                            libero dolorem. Beatae, magni itaque? Nobis excepturi laborum dolor nemo assumenda
                            nam, deserunt voluptatum, fuga facilis expedita, sit maiores?</p>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <!--<div class="testimonial_img">
                            M
                        </div>-->
                        <div class="testimonial_name">
                            <p class="mb-0">Jondo Ipsum</p>
                            <span class="mb-0">29 May 2024</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide testimonial-slide">
                    <p class="outer_bx">
                        Google
                    </p>
                    <div>
                        <span class="star_no pe-2">5.0</span><span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                    </div>
                    <div class="testimonial_review mt-3">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit officiis nulla
                            libero dolorem. Beatae, magni itaque? Nobis excepturi laborum dolor nemo assumenda
                            nam, deserunt voluptatum, fuga facilis expedita, sit maiores?</p>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <!--<div class="testimonial_img">
                            M
                        </div>-->
                        <div class="testimonial_name">
                            <p class="mb-0">Jondo Ipsum</p>
                            <span class="mb-0">29 May 2024</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide testimonial-slide">
                    <p class="outer_bx">
                        Google
                    </p>
                    <div>
                        <span class="star_no pe-2">5.0</span><span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                    </div>
                    <div class="testimonial_review mt-3">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit officiis nulla
                            libero dolorem. Beatae, magni itaque? Nobis excepturi laborum dolor nemo assumenda
                            nam, deserunt voluptatum, fuga facilis expedita, sit maiores?</p>
                    </div>
                    <div class="d-flex align-items-center pt-3">
                        <!--<div class="testimonial_img">
                            M
                        </div>-->
                        <div class="testimonial_name">
                            <p class="mb-0">Jondo Ipsum</p>
                            <span class="mb-0">29 May 2024</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
<section>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="withus mb-0"><b>FAQs</b></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="accordion bg-transparent" id="accordionExample">
                    <div class="accordion-item bg-transparent">
                        <h2 class="accordion-header bg-transparent">
                            <button class="accordion-button bg-transparent collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapseOne">
                                How do I reach the Andaman Islands?
                            </button>
                        </h2>
                        <div id="collapse1" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="">
                            <div class="accordion-body">
                                The Andaman and Nicobar Islands are a famed vacation destination known for their
                                scenic
                                beauty and beaches. The quickest way to get to Andaman is by flight. There are

                            </div>
                        </div>
                    </div>
                    <div class="accordion-item bg-transparent">
                        <h2 class="accordion-header bg-transparent">
                            <button class="accordion-button bg-transparent collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapseOne">
                                When is the best time of year to visit the Andaman and Nicobar Islands?
                            </button>
                        </h2>
                        <div id="collapse2" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                The best time to visit the Andaman and Nicobar Islands is generally from November to April. During these months, the weather is typically pleasant with clear skies, calm seas, and minimal rainfall, making it ideal for outdoor activities such as swimming, snorkeling, and sightseeing. Additionally, the water visibility for diving is at its best during this period, offering excellent opportunities to explore the vibrant marine life of the region.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item bg-transparent">
                        <h2 class="accordion-header bg-transparent">
                            <button class="accordion-button bg-transparent collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapseOne">
                                Which are the most beautiful beaches to visit?
                            </button>
                        </h2>
                        <div id="collapse3" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Radhanagar Beach (Havelock Island): Often hailed as one of Asia's best beaches, Radhanagar Beach mesmerizes visitors with its crystal-clear turquoise waters, powdery white sand, and lush greenery.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item bg-transparent">
                        <h2 class="accordion-header bg-transparent">
                            <button class="accordion-button bg-transparent collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapseOne">
                                When is the best time of year to visit the Andaman and Nicobar Islands?
                            </button>
                        </h2>
                        <div id="collapse4" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                The best time to visit the Andaman and Nicobar Islands is generally from November to April. During these months, the weather is typically pleasant with clear skies, calm seas, and minimal rainfall, making it ideal for outdoor activities such as swimming, snorkeling, and sightseeing. Additionally, the water visibility for diving is at its best during this period, offering excellent opportunities to explore the vibrant marine life of the region.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        var swiper = new Swiper(".mySwiper2", {
            slidesPerView: 3,
            spaceBetween: 40,
            freeMode: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
        });

        $(".searchBtn").on("click", function() {
            // Show the loader
            $(".loaderBG").fadeIn();

            // Simulate a delay for demonstration (e.g., an AJAX call)
            setTimeout(function() {
                // Hide the loader after a delay
                $(".loaderBG").fadeOut();

                // Scroll to search results
                var isMobile = window.innerWidth <= 556; // Define mobile breakpoint
                var offset = isMobile ? -95 : -100; // Offset for mobile or desktop
                $('html, body').animate({
                    scrollTop: $(".Search_Resultss").offset().top + offset
                }, 1000);
            }, 40000); // 10000ms delay to simulate the loader being shown
        });
    });
</script>

<script>
    //One Way Form Location to To Location Validation
    $(document).ready(function() {
        // Define the locations mapping
        var locations = {
            1: ["1", "2", "3"], // When "From" is Location A (1), available "To" options are Location B (2) and Location C (3)
            2: ["1", "2", "3"], // When "From" is Location B (2), available "To" options are Location A (1) and Location C (3)
            3: ["1", "2", "3"] // When "From" is Location C (3), available "To" options are Location A (1) and Location B (2)
        };

        function updateToLocationOptions() {
            var selectedValue = $('#form_location').val(); // Get the selected value from "From" dropdown
            var options = locations[selectedValue] || []; // Get the available "To" options

            $('#to_location').empty(); // Clear existing options in "To" dropdown

            // Populate "To" dropdown with options that are valid and not the same as the selected "From" value
            $('#form_location option').each(function() {
                var value = $(this).val();
                var text = $(this).text();

                // Add options to "To" dropdown if they are valid and different from the selected "From" value
                if (options.includes(value) && value != selectedValue) {
                    $('#to_location').append('<option value="' + value + '">' + text + '</option>');
                }
            });

        }
        // Attach the change event to update options
        $('#form_location').change(updateToLocationOptions);
        // Trigger the change event on page load to initialize "To" options
        updateToLocationOptions();
    });
</script>

<script>
    //Round Way Form Location to To Location Validation
    $(document).ready(function() {
        // Define the locations mapping
        var locations = {
            1: ["1", "2", "3"], // When "From" is Location A (1), available "To" options are Location B (2) and Location C (3)
            2: ["1", "2", "3"], // When "From" is Location B (2), available "To" options are Location A (1) and Location C (3)
            3: ["1", "2", "3"] // When "From" is Location C (3), available "To" options are Location A (1) and Location B (2)
        };

        function updateToLocationOptions() {
            var selectedValue = $('#form_location1').val(); // Get the selected value from "From" dropdown
            var options = locations[selectedValue] || []; // Get the available "To" options

            $('#to_location1').empty(); // Clear existing options in "To" dropdown

            // Populate "To" dropdown with options that are valid and not the same as the selected "From" value
            $('#form_location1 option').each(function() {
                var value = $(this).val();
                var text = $(this).text();

                // Add options to "To" dropdown if they are valid and different from the selected "From" value
                if (options.includes(value) && value != selectedValue) {
                    $('#to_location1').append('<option value="' + value + '">' + text + '</option>');
                }
            });

        }
        // Attach the change event to update options
        $('#form_location1').change(updateToLocationOptions);
        // Trigger the change event on page load to initialize "To" options
        updateToLocationOptions();
    });

    $(document).ready(function() {
        // Define the locations mapping
        var locations = {
            1: ["2", "3"], // When "From" is Location A (1), available "To" options are Location B (2) and Location C (3)
            2: ["3", "1"], // When "From" is Location B (2), available "To" options are Location A (1) and Location C (3)
            3: ["1", "2"] // When "From" is Location C (3), available "To" options are Location A (1) and Location B (2)
        };

        function updateToLocationOptions() {
            var selectedValue = $('#form_location2').val(); // Get the selected value from "From" dropdown
            var options = locations[selectedValue] || []; // Get the available "To" options

            $('#to_location2').empty(); // Clear existing options in "To" dropdown

            // Populate "To" dropdown with options that are valid and different from the selected "From" value
            $.each(options, function(index, value) {
                var optionText = $('#form_location2 option[value="' + value + '"]').text();
                $('#to_location2').append('<option value="' + value + '">' + optionText + '</option>');
            });
        }

        // Attach the change event to update options
        $('#form_location2').change(updateToLocationOptions);

        // Trigger the change event on page load to initialize "To" options
        updateToLocationOptions();
    });


    $(document).ready(function() {
        // Define the locations mapping
        var locations = {
            1: ["1", "2", "3"], // When "From" is Location A (1), available "To" options are Location B (2) and Location C (3)
            2: ["1", "2", "3"], // When "From" is Location B (2), available "To" options are Location A (1) and Location C (3)
            3: ["1", "2", "3"] // When "From" is Location C (3), available "To" options are Location A (1) and Location B (2)
        };

        function updateToLocationOptions() {
            var selectedValue = $('#form_location3').val(); // Get the selected value from "From" dropdown
            var options = locations[selectedValue] || []; // Get the available "To" options

            $('#to_location3').empty(); // Clear existing options in "To" dropdown

            // Populate "To" dropdown with options that are valid and not the same as the selected "From" value
            $('#form_location3 option').each(function() {
                var value = $(this).val();
                var text = $(this).text();

                // Add options to "To" dropdown if they are valid and different from the selected "From" value
                if (options.includes(value) && value != selectedValue) {
                    $('#to_location3').append('<option value="' + value + '">' + text + '</option>');
                }
            });

        }
        // Attach the change event to update options
        $('#form_location3').change(updateToLocationOptions);
        // Trigger the change event on page load to initialize "To" options
        updateToLocationOptions();
    });
</script>

<script>
    $(document).ready(function() {
        // Function to format date as 'dd-mm-yy'
        function formatDate(date) {
            return $.datepicker.formatDate('dd-mm-yy', date);
        }

        // Function to get formatted date for a specific number of days from today
        function getDateOffset(days) {
            var date = new Date();
            date.setDate(date.getDate() + days);
            return formatDate(date);
        }

        // Function to update date pickers based on selected date
        function updateDatePickers() {
            var firstDate = $("#round_date").datepicker("getDate");

            if (firstDate) {
                // Update the second date picker to be one day after the first date
                var secondDate = new Date(firstDate);
                secondDate.setDate(firstDate.getDate() + 1);
                $("#round1_date").datepicker("setDate", secondDate);

                // Update the third date picker to be one day after the second date
                var thirdDate = new Date(secondDate);
                thirdDate.setDate(secondDate.getDate() + 1);
                $("#round2_date").datepicker("setDate", thirdDate);
            }
        }

        // Initialize datepickers with specific default dates and synchronize them
        $(".my_date_picker").datepicker({
            dateFormat: 'dd-mm-yy',
            minDate: 1,
            defaultDate: getDateOffset(1), // Tomorrow
            onSelect: function(dateText) {
                $(this).val(dateText);
                updateDatePickers(); // Update subsequent date pickers
            }
        }).datepicker('setDate', getDateOffset(1)); // Set default date to tomorrow

        $(".my_date_picker1").datepicker({
            dateFormat: 'dd-mm-yy',
            minDate: 1,
            onSelect: function(dateText) {
                $(this).val(dateText);
            }
        }).datepicker('setDate', getDateOffset(2)); // Set default date to 2 days from today

        $(".my_date_picker2").datepicker({
            dateFormat: 'dd-mm-yy',
            minDate: 1,
            onSelect: function(dateText) {
                $(this).val(dateText);
            }
        }).datepicker('setDate', getDateOffset(3)); // Set default date to 3 days from today
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const passenger1 = document.getElementById('passenger2');
        const passenger2 = document.getElementById('passenger3');
        const passenger3 = document.getElementById('passenger4');

        // Function to update all passenger fields
        function syncPassengers() {
            let value = passenger1.value;
            if (value === '0') {
                value = '1';
            }
            passenger2.value = value;
            passenger3.value = value;
        }

        // Attach event listener to the first passenger input
        passenger1.addEventListener('input', syncPassengers);
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const infant1 = document.getElementById('location10');
        const infant2 = document.getElementById('location14');
        const infant3 = document.getElementById('location18');

        // Function to update all infant fields
        function syncInfants() {
            let value = infant1.value;
            // Ensure the value is numeric and greater than 0
            if (isNaN(value) || value < 1) {
                value = '1'; // Default to 1 if the value is invalid
            }
            infant2.value = value;
            infant3.value = value;
        }

        // Attach event listener to the first infant input
        infant1.addEventListener('input', syncInfants);
    });
</script>

<script>
    $(document).ready(function() {
        $('#passenger').on('input', function() {
            var minValue = 1;
            var currentValue = parseInt($(this).val(), 10);

            // Ensure the value is at least the minimum
            if (currentValue < minValue) {
                $(this).val(minValue);
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Handle changes to the input value
        $('#passenger2').on('input', function() {
            var minValue = 1;
            var currentValue = parseInt($(this).val(), 10);

            // Ensure the value is at least the minimum
            if (currentValue < minValue) {
                $(this).val(minValue);
            }
        });
        // Optionally, also handle when the input loses focus
        $('#passenger2').on('blur', function() {
            var minValue = 1;
            var currentValue = parseInt($(this).val(), 10);

            // Ensure the value is at least the minimum
            if (currentValue < minValue) {
                $(this).val(minValue);
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Function to update trip_type based on section deletion
        function updateTripType(sectionId) {
            console.log('updateTripType called with sectionId:', sectionId);

            let currentValue = parseInt($("#trip_type_round").val());
            $("#trip_type_round").val(currentValue - 1);
            console.log($("#trip_type_round").val());
        }

        // Handle delete button click
        $(document).on('click', '.delete', function(e) {
            e.preventDefault();
            console.log('delete button clicked');

            // Get the section ID from the button's data attribute
            const sectionId = $(this).attr('data-section');
            console.log('sectionId:', sectionId);

            // Update the trip_type hidden input
            updateTripType(sectionId);

            // Clear the section content
            const row = $(this).closest(".row");
            row.html(""); // Clear HTML content
            row.removeClass("border-bottom"); // Remove bottom border
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Array of input field IDs
        var inputIds = [
            'passenger3',
            'passenger4',
            'location6',
            'location10',
            'location14',
            'location18'
        ];

        // Function to handle input event
        function handleInput(event) {
            if (event.target.value === '0') {
                event.target.value = '1';
            }
        }

        // Attach event listeners to all specified input fields
        inputIds.forEach(function(id) {
            var inputElement = document.getElementById(id);
            if (inputElement) {
                inputElement.addEventListener('input', handleInput);
            }
        });
    });
</script>

<script>
    document.getElementById('location6').addEventListener('input', function() {
        if (this.value > 4) {
            this.value = 4;
        }
    });
    document.getElementById('location10').addEventListener('input', function() {
        if (this.value > 4) {
            this.value = 4;
        }
    });
    document.getElementById('location14').addEventListener('input', function() {
        if (this.value > 4) {
            this.value = 4;
        }
    });
    document.getElementById('location18').addEventListener('input', function() {
        if (this.value > 4) {
            this.value = 4;
        }
    });
</script>

@endsection