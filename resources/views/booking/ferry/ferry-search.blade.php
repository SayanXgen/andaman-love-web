@extends('layouts.layout')

@section('content')

    <style>
        #luxuryContainer {
            display: none;
        }

        #luxuryContainer .luxury-down {
            height: 51%;
            width: 100%;
            bottom: 28%;
        }

        #royalContainer .luxury-down {

            width: 100%;
            bottom: 27%;
        }

        .seat {
            width: 25px;
            background: #fff;
            display: inline-flex;

            border: 1px solid #ccc;
            padding: 2px 0px;
            justify-content: center;
            align-items: center;
            font-size: 14px;
            cursor: pointer;
        }

        .seat:hover {
            background-color: aqua;
        }

        .seat.selected {
            background: #39b300;
        }

        .seat.booked {
            background: #b8b8b8 !important;
            cursor: not-allowed;
        }

        @media screen and (max-width: 575px) {
            #luxuryContainer {
                width: 100% !important;
            }

            .seat {
                font-size: 12px;
            }
        }

        @media screen and (max-width: 412px) {
            #luxuryContainer {
                width: 100% !important;
            }

            .seat {
                font-size: 12px;
                width: 21px;
            }
        }

        #exampleModal{
            z-index: 99999;
        }
    </style>

    {{-- ************** Seat Layout *************** --}}

    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Select Seat</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="">
                        <div class="row py-4">
                            <div class="col-4 d-flex justify-content-center">
                                <div class="seat me-1"></div>
                                <p class="m-0">Vaccant</p>
                            </div>
                            <div class="col-4 d-flex justify-content-center">
                                <div class="seat selected me-1"></div>
                                <p class="m-0">Selected</p>
                            </div>
                            <div class="col-4 d-flex justify-content-center">
                                <div class="seat booked me-1"></div>
                                <p class="m-0">Booked</p>
                            </div>
                        </div>
                    </div>
                    <div class="position-relative h-100 m-auto" id="luxuryContainer" style="width: 90%;">
                        <div class="position-absolute luxury-down">
                            <div class="position-relative h-100 " style="width: 90%; margin: 0px auto;">
                                <div class="position-absolute " style="top: 1%;">
                                    <div><span class="seat luxury 2A">2A</span><span class="seat luxury 2B">2B</span><span
                                            class="seat luxury 2C">2C</span></div>
                                    <div><span class="seat luxury 3A">3A</span><span class="seat luxury 3B">3B</span><span
                                            class="seat luxury 3C">3C</span></div>
                                    <div><span class="seat luxury 4A">4A</span><span class="seat luxury 4B">4B</span><span
                                            class="seat luxury 4C">4C</span></div>
                                    <div><span class="seat luxury 5A">5A</span><span class="seat luxury 5B">5B</span><span
                                            class="seat luxury 5C">5C</span></div>
                                    <div><span class="seat luxury 6A">6A</span><span class="seat luxury 6B">6B</span><span
                                            class="seat luxury 6C">6C</span></div>
                                </div>
                                <div class="position-absolute end-0" style="top: 1%;">
                                    <div><span class="seat luxury 2J">2J</span><span class="seat luxury 2K">2K</span><span
                                            class="seat luxury 2L">2L</span></div>
                                    <div><span class="seat luxury 3J">3J</span><span class="seat luxury 3K">3K</span><span
                                            class="seat luxury 3L">3L</span></div>
                                    <div><span class="seat luxury 4J">4J</span><span class="seat luxury 4K">4K</span><span
                                            class="seat luxury 4L">4L</span></div>
                                    <div><span class="seat luxury 5J">5J</span><span class="seat luxury 5K">5K</span><span
                                            class="seat luxury 5L">5L</span></div>
                                    <div><span class="seat luxury 6J">6J</span><span class="seat luxury 6K">6K</span><span
                                            class="seat luxury 6L">6L</span></div>

                                </div>
                                <div class="position-absolute start-50 translate-middle-x " style="top: 0;">
                                    <div style="text-align: center;"><span class="seat luxury 1E">1E</span><span
                                            class="seat luxury 1F">1F</span><span class="seat luxury 1G">1G</span><span
                                            class="seat luxury 1H">1H</span><span class="seat luxury 1I">1I</span>
                                    </div>
                                    <div><span class="seat luxury 2D">2D</span><span class="seat luxury 2E">2E</span><span
                                            class="seat luxury 2F">2F</span><span class="seat luxury 2G">2G</span><span
                                            class="seat luxury 2H">2H</span><span class="seat luxury 2I">2I</span></div>
                                    <div><span class="seat luxury 3D">3D</span><span class="seat luxury 3E">3E</span><span
                                            class="seat luxury 3F">3F</span><span class="seat luxury 3G">3G</span><span
                                            class="seat luxury 3H">3H</span><span class="seat luxury 3I">3I</span></div>
                                    <div><span class="seat luxury 4D">4D</span><span class="seat luxury 4E">4E</span><span
                                            class="seat luxury 4F">4F</span><span class="seat luxury 4G">4G</span><span
                                            class="seat luxury 4H">4H</span><span class="seat luxury 4I">4I</span></div>
                                    <div><span class="seat luxury 5D">5D</span><span class="seat luxury 5E">5E</span><span
                                            class="seat luxury 5F">5F</span><span class="seat luxury 5G">5G</span><span
                                            class="seat luxury 5H">5H</span><span class="seat luxury 5I">5I</span></div>
                                    <div><span class="seat luxury 6D">6D</span><span class="seat luxury 6E">6E</span><span
                                            class="seat luxury 6F">6F</span><span class="seat luxury 6G">6G</span><span
                                            class="seat luxury 6H">6H</span><span class="seat luxury 6I">6I</span>
                                    </div>
                                    <div><span class="seat luxury 7D">7D</span><span class="seat luxury 7E">7E</span><span
                                            class="seat luxury 7F">7F</span><span class="seat luxury 7G">7G</span><span
                                            class="seat luxury 7H">7H</span><span class="seat luxury 7I">7I</span>
                                    </div>
                                </div>


                                <div class="position-absolute bottom-0">
                                    <div><span class="seat luxury 7A">7A</span><span class="seat luxury 7B">7B</span><span
                                            class="seat luxury 7C">7C</span>
                                    </div>
                                    <div><span class="seat luxury 8A">8A</span><span class="seat luxury 8B">8B</span><span
                                            class="seat luxury 8C">8C</span>
                                    </div>
                                    <div><span class="seat luxury 9A">9A</span><span class="seat luxury 9B">9B</span><span
                                            class="seat luxury 9C">9C</span>
                                    </div>
                                    <div><span class="seat luxury 10A">10A</span><span
                                            class="seat luxury 10B">10B</span><span class="seat luxury 10C">10C</span>
                                    </div>
                                    <div><span class="seat luxury 11A">11A</span><span
                                            class="seat luxury 11B">11B</span><span class="seat luxury 11C">11C</span>
                                    </div>
                                    <div><span class="seat luxury 12A">12A</span><span
                                            class="seat luxury 12B">12B</span><span class="seat luxury 12C">12C</span>
                                    </div>
                                    <div><span class="seat luxury 13A">13A</span><span
                                            class="seat luxury 13B">13B</span><span class="seat luxury 13C">13C</span>
                                    </div>
                                    <div><span class="seat luxury 14A">14A</span><span
                                            class="seat luxury 14B">14B</span><span class="seat luxury 14C">14C</span>
                                    </div>
                                    <div><span class="seat luxury 15A">15A</span><span
                                            class="seat luxury 15B">15B</span><span class="seat luxury 15C">15C</span>
                                    </div>
                                    <div><span class="seat luxury 16A">16A</span><span
                                            class="seat luxury 16B">16B</span><span class="seat luxury 16C">16C</span>
                                    </div>
                                    <div><span class="seat luxury 17A">17A</span><span
                                            class="seat luxury 17B">17B</span><span class="seat luxury 17C">17C</span>
                                    </div>

                                </div>
                                <div class="position-absolute start-50 translate-middle-x bottom-0">
                                    <div><span class="seat luxury 7D">7D</span><span class="seat luxury 7E">7E</span><span
                                            class="seat luxury 7F">7F</span><span class="seat luxury 7G">7G</span><span
                                            class="seat luxury 7H">7H</span><span class="seat luxury 7I">7I</span>
                                    </div>
                                    <div><span class="seat luxury 8D">8D</span><span class="seat luxury 8E">8E</span><span
                                            class="seat luxury 8F">8F</span><span class="seat luxury 8G">8G</span><span
                                            class="seat luxury 8H">8H</span><span class="seat luxury 8I">8I</span>
                                    </div>
                                    <div><span class="seat luxury 9D">9D</span><span class="seat luxury 9E">9E</span><span
                                            class="seat luxury 9F">9F</span><span class="seat luxury 9G">9G</span><span
                                            class="seat luxury 9H">9H</span><span class="seat luxury 9I">9I</span>
                                    </div>
                                    <div><span class="seat luxury 10D">10D</span><span
                                            class="seat luxury 10E">10E</span><span
                                            class="seat luxury 10F">10F</span><span
                                            class="seat luxury 10G">10G</span><span
                                            class="seat luxury 10H">10H</span><span class="seat luxury 10I">10I</span>
                                    </div>
                                    <div><span class="seat luxury 11D">11D</span><span
                                            class="seat luxury 11E">11E</span><span
                                            class="seat luxury 11F">11F</span><span
                                            class="seat luxury 11G">11G</span><span
                                            class="seat luxury 11H">11H</span><span class="seat luxury 11I">11I</span>
                                    </div>
                                    <div><span class="seat luxury 12D">12D</span><span
                                            class="seat luxury 12E">12E</span><span
                                            class="seat luxury 12F">12F</span><span
                                            class="seat luxury 12G">12G</span><span
                                            class="seat luxury 12H">12H</span><span class="seat luxury 12I">12I</span>
                                    </div>
                                    <div><span class="seat luxury 13D">13D</span><span
                                            class="seat luxury 13E">13E</span><span
                                            class="seat luxury 13F">13F</span><span
                                            class="seat luxury 13G">13G</span><span
                                            class="seat luxury 13H">13H</span><span class="seat luxury 13I">13I</span>
                                    </div>
                                    <div><span class="seat luxury 14D">14D</span><span
                                            class="seat luxury 14E">14E</span><span
                                            class="seat luxury 14F">14F</span><span
                                            class="seat luxury 14G">14G</span><span
                                            class="seat luxury 14H">14H</span><span class="seat luxury 14I">14I</span>
                                    </div>
                                    <div><span class="seat luxury 15D">15D</span><span
                                            class="seat luxury 15E">15E</span><span
                                            class="seat luxury 15F">15F</span><span
                                            class="seat luxury 15G">15G</span><span
                                            class="seat luxury 15H">15H</span><span class="seat luxury 15I">15I</span>
                                    </div>
                                    <div><span class="seat luxury 16D">16D</span><span
                                            class="seat luxury 16E">16E</span><span
                                            class="seat luxury 16F">16F</span><span
                                            class="seat luxury 16G">16G</span><span
                                            class="seat luxury 16H">16H</span><span class="seat luxury 16I">16I</span>
                                    </div>
                                    <div class="text-center"><span class="seat luxury 17E">17E</span><span
                                            class="seat luxury 17F">17F</span><span
                                            class="seat luxury 17G">17G</span><span
                                            class="seat luxury 17H">17H</span><span class="seat luxury 17I">17I</span>
                                    </div>

                                </div>
                                <div class="position-absolute end-0 bottom-0">
                                    <div><span class="seat luxury 7J">7J</span><span class="seat luxury 7K">7K</span><span
                                            class="seat luxury 7L">7L</span>
                                    </div>
                                    <div><span class="seat luxury 8J">8J</span><span class="seat luxury 8K">8K</span><span
                                            class="seat luxury 8L">8L</span>
                                    </div>
                                    <div><span class="seat luxury 9J">9J</span><span class="seat luxury 9K">9K</span><span
                                            class="seat luxury 9L">9L</span>
                                    </div>
                                    <div><span class="seat luxury 9J">9J</span><span class="seat luxury 9K">9K</span><span
                                            class="seat luxury 9L">9L</span>
                                    </div>
                                    <div><span class="seat luxury 10J">10J</span><span
                                            class="seat luxury 10K">10K</span><span class="seat luxury 10L">10L</span>
                                    </div>
                                    <div><span class="seat luxury 11J">11J</span><span
                                            class="seat luxury 11K">11K</span><span class="seat luxury 11L">11L</span>
                                    </div>
                                    <div><span class="seat luxury 12J">12J</span><span
                                            class="seat luxury 12K">12K</span><span class="seat luxury 12L">12L</span>
                                    </div>
                                    <div><span class="seat luxury 13J">13J</span><span
                                            class="seat luxury 13K">13K</span><span class="seat luxury 13L">13L</span>
                                    </div>
                                    <div><span class="seat luxury 14J">14J</span><span
                                            class="seat luxury 14K">14K</span><span class="seat luxury 14L">14L</span>
                                    </div>
                                    <div><span class="seat luxury 15J">15J</span><span
                                            class="seat luxury 15K">15K</span><span class="seat luxury 15L">15L</span>
                                    </div>
                                    <div><span class="seat luxury 16J">16J</span><span
                                            class="seat luxury 16K">16K</span><span class="seat luxury 16L">16L</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <img src="{{ asset('asset/img/nautika-luxury.png') }}" alt="" width="100%"
                            height="1100px">
                    </div>

                    <div class="position-relative h-100 m-auto" id="royalContainer" style="width: 90%;">
                        <div class="position-absolute luxury-down">
                            <div class="position-relative h-100 " style="width: 82%; margin: 0px auto;">

                                <div class="position-absolute bottom-0">
                                    <div><span class="seat royal 1A">1A</span><span class="seat royal 1B">1B</span>
                                    </div>
                                    <div><span class="seat royal 2A">2A</span><span class="seat royal 2B">2B</span>
                                    </div>
                                    <div><span class="seat royal 3A">3A</span><span class="seat royal 3B">3B</span>
                                    </div>
                                    <div><span class="seat royal 4A">4A</span><span class="seat royal 4B">4B</span>
                                    </div>
                                    <div><span class="seat royal 5A">5A</span><span class="seat royal 5B">5B</span>
                                    </div>
                                    <div><span class="seat royal 6A">6A</span><span class="seat royal 6B">6B</span>
                                    </div>
                                    <div><span class="seat royal 7A">7A</span><span class="seat royal 7B">7B</span>
                                    </div>
                                    <div><span class="seat royal 8A">8A</span><span class="seat royal 8B">8B</span>
                                    </div>
                                    <div><span class="seat royal 9A">9A</span><span class="seat royal 9B">9B</span>
                                    </div>
                                    <div><span class="seat royal 10A">10A</span><span class="seat royal 10B">10B</span>
                                    </div>
                                    <div><span class="seat royal 11A">11A</span><span class="seat royal 11B">11B</span>
                                    </div>
                                    <div><span class="seat royal 12A">12A</span><span class="seat royal 12B">12B</span>
                                    </div>
                                </div>
                                <div class="position-absolute start-50 translate-middle-x bottom-0">
                                    <div><span class="seat royal 5C">5C</span><span class="seat royal 5D">5D</span><span
                                            class="seat royal 5E">5E</span><span class="seat royal 5F">5F</span><span
                                            class="seat royal 5G">5G</span><span class="seat royal 5H">5H</span></div>
                                    <div><span class="seat royal 6C">6C</span><span class="seat royal 6D">6D</span><span
                                            class="seat royal 6E">6E</span><span class="seat royal 6F">6F</span><span
                                            class="seat royal 6G">6G</span><span class="seat royal 6H">6H</span></div>
                                    <div><span class="seat royal 7C">7C</span><span class="seat royal 7D">7D</span><span
                                            class="seat royal 7E">7E</span><span class="seat royal 7F">7F</span><span
                                            class="seat royal 7G">7G</span><span class="seat royal 7H">7H</span></div>
                                    <div><span class="seat royal 8C">8C</span><span class="seat royal 8D">8D</span><span
                                            class="seat royal 8E">8E</span><span class="seat royal 8F">8F</span><span
                                            class="seat royal 8G">8G</span><span class="seat royal 8H">8H</span></div>
                                    <div><span class="seat royal 5C">5C</span><span class="seat royal 9D">9D</span><span
                                            class="seat royal 9E">9E</span><span class="seat royal 9F">9F</span><span
                                            class="seat royal 9G">9G</span><span class="seat royal 9H">9H</span></div>
                                    <div><span class="seat royal 10C">10C</span><span
                                            class="seat royal 10D">10D</span><span class="seat royal 10E">10E</span><span
                                            class="seat royal 10F">10F</span><span class="seat royal 10G">10G</span><span
                                            class="seat royal 10H">10H</span>
                                    </div>
                                    <div><span class="seat royal 11C">11C</span><span
                                            class="seat royal 11D">11D</span><span class="seat royal 11E">11E</span><span
                                            class="seat royal 11F">11F</span><span class="seat royal 11G">11G</span><span
                                            class="seat royal 10H">10H</span>
                                    </div>
                                </div>
                                <div class="position-absolute bottom-0 text-end end-0">
                                    <div><span class="seat royal 1I">1I</span><span class="seat royal 1J">1J</span><span
                                            class="seat royal 1K">1K</span></div>
                                    <div><span class="seat royal 2I">2I</span><span class="seat royal 2J">2J</span><span
                                            class="seat royal 2K">2K</span></div>
                                    <div><span class="seat royal 3J">3J</span><span class="seat royal 3K">3K</span>
                                    </div>
                                    <div><span class="seat royal 4J">4J</span><span class="seat royal 4K">4K</span>
                                    </div>
                                    <div><span class="seat royal 5J">5J</span><span class="seat royal 5K">5K</span>
                                    </div>
                                    <div><span class="seat royal 6J">6J</span><span class="seat royal 6K">6K</span>
                                    </div>
                                    <div><span class="seat royal 7J">7J</span><span class="seat royal 7K">7K</span>
                                    </div>
                                    <div><span class="seat royal 8J">8J</span><span class="seat royal 8K">8K</span>
                                    </div>
                                    <div><span class="seat royal 9J">9J</span><span class="seat royal 9K">9K</span>
                                    </div>
                                    <div><span class="seat royal 10J">10J</span><span class="seat royal 10K">10K</span>
                                    </div>
                                    <div><span class="seat royal 11J">11J</span><span class="seat royal 11K">11K</span>
                                    </div>
                                    <div><span class="seat royal 12J">12J</span><span class="seat royal 12K">12K</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <img src="{{ asset('asset/img/nautika-royal.png') }}" alt="" width="100%"
                            height="1150px">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="nautika_proceed" class="btn btn-primary">Proceed</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                <div class="ferry_banner search-result" id="bookConsole">

                    <div class="bookingConsole">
                        <div class="tabBtns  d-flex align-items-center">
                            <!-- One Way Tab -->
                            <div class="d-flex align-items-start tabBtn tabBtn1 {{ request('trip_type') == 1 ? 'active' : '' }}"
                                data-list="1">
                                <img src="{{ asset('asset/img/one-way-inactive.webp') }}" class="icon-inactive"
                                    alt="icon" width="20">
                                <img src="{{ asset('asset/img/one-way-active.webp') }}" class="icon-active"
                                    alt="icon" width="20">
                                <p class="mb-0 ms-2">One Way</p>
                            </div>
                            <!-- Round Tab -->
                            <div class="d-flex align-items-center tabBtn tabBtn2 {{ request('trip_type') > 1 ? 'active' : '' }}"
                                data-list="2">
                                <img src="{{ asset('asset/img/return-inactive.webp') }}" class="icon-inactive"
                                    alt="icon" width="20">
                                <img src="{{ asset('asset/img/return-active.webp') }}" class="icon-active" alt="icon"
                                    width="20">
                                <p class="mb-0 ms-2">Round</p>
                            </div>
                        </div>
                        <div class="position-relative tabContainer">

                            <form
                                action="{{ route('search-result-ferry', ['form_location' => request('form_location'), 'to_location' => request('to_location'), 'date' => request('date'), 'passenger' => request('passenger'), 'infant' => request('infant')]) }}"
                                method="GET" id="one_way_form">
                                <input type="hidden" name="trip_type" id="trip_type" value="1">
                                <div class="tabs tabs1 row mx-0" {{ request('trip_type') == 1 ? 'active' : '' }}>
                                    <div class="col-12 col-md-6 col-sm-6 col-lg-3 mb-2 mb-lg-0 border-0 border-md-end">
                                        <label for="form_location">From</label>
                                        <select name="form_location" class="form-select border-0 p-0" id="form_location">
                                            @foreach ($ferry_locations as $ferry_location)
                                                <option value="{{ $ferry_location->id }}"
                                                    {{ old('form_location', request('form_location')) == $ferry_location->id ? 'selected' : '' }}>
                                                    {{ $ferry_location->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0 border-0 border-md-end">
                                        <label for="to_location">To</label>
                                        <select name="to_location" class="form-select border-0 p-0" id="to_location">
                                            @foreach ($ferry_locations as $ferry_location)
                                                <option value="{{ $ferry_location->id }}"
                                                    {{ old('to_location', request('to_location')) == $ferry_location->id ? 'selected' : '' }}>
                                                    {{ $ferry_location->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0 border-0 border-md-end">
                                        <label for="date_1">Date</label>
                                        <input type="text" name="date" id="date_1" class="my_date_picker"
                                            placeholder="Select Date" min="<?php echo date('d-m-Y'); ?>"
                                            value="{{ old('date', request('date')) }}" readonly>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0 border-0 border-md-end">
                                        <label for="passenger">Passengers (1+ yr)</label>
                                        <input type="number" name="passenger" max="9" min="1"
                                            id="passenger" value="{{ old('passenger', request('passenger')) }}"
                                            onkeyup="maxpassenger(this)" required>
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-6 col-lg  mb-2 mb-lg-0 ">
                                        <label for="locationFerry4">Infant (0-1 years)</label>
                                        <input type="number" name="infant" max="4" maxlength="1" id="locationFerry4"
                                            placeholder="No. of Infant" value="{{ old('infant', request('infant')) }}">
                                    </div>
                                    <div class="col-12 col-md-6 col-sm-6 col-lg-2 mb-2 mb-lg-0">
                                        <button class="btn button w-100 searchBtn"><i
                                                class="bi bi-search"></i>Search</button>
                                    </div>
                                </div>
                            </form>

                            <form
                                action="{{ route('search-result-ferry', ['form_location' => request('form_location'), 'to_location' => request('to_location'), 'date' => request('date'), 'passenger' => request('passenger'), 'infant' => request('infant')]) }}"
                                method="GET" id="round_way_form">
                                <input type="hidden" name="trip_type" id="trip_type_round" value="3">
                                <div class="tabs tabs2 mx-0" {{ request('trip_type') > 1 ? 'active' : '' }}>
                                    <!-- First Section -->
                                    <div class="row border-bottom pb-3 align-items-center" id="section1">
                                        <div class="col-12 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0 border-0 border-md-end">
                                            <label for="form_location">From</label>
                                            <select name="form_location" class="form-select border-0 p-0"
                                                id="form_location1">
                                                @foreach ($ferry_locations as $index => $ferry_location)
                                                    <option value="{{ $ferry_location->id }}"
                                                        {{ old('form_location', request('form_location')) == $ferry_location->id ? 'selected' : '' }}>
                                                        {{ $ferry_location->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0 border-0 border-md-end">
                                            <label for="to_location">To</label>
                                            <select name="to_location" class="form-select border-0 p-0"
                                                id="to_location1">
                                                @foreach ($ferry_locations as $index => $ferry_location)
                                                    <option value="{{ $ferry_location->id }}"
                                                        {{ old('to_location', request('to_location')) == $ferry_location->id ? 'selected' : '' }}>
                                                        {{ $ferry_location->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0 border-0 border-md-end">
                                            <label for="locationFerry7">Date</label>
                                            <input type="text" id="locationFerry7" name="date"
                                                class="my_date_picker" placeholder="Select Date"
                                                min="<?php echo date('Y-m-d'); ?>" value="{{ old('date', request('date')) }}" readonly>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0 border-0 border-md-end">
                                            <label for="passenger2">Passengers (1+ yr)</label>
                                            <input type="number" name="passenger" max="9" min="1"
                                                id="passenger2"
                                                value="{{ old('passenger', request('passenger')) }}" required>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0">
                                            <label for="locationFerry9">Infant (0-1 years)</label>
                                            <input type="number" name="infant" max="4" maxlength="1" id="locationFerry9"
                                                placeholder="No. of Infant"
                                                value="{{ old('infant', request('infant')) }}">
                                        </div>
                                        <div class="col-3 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0"></div>
                                    </div>

                                    <!-- Second Section -->
                                    <div class="row pt-4 border-bottom pb-3 align-items-center" id="section2">
                                        <div class="col-12 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0 border-0 border-md-end">
                                            <label for="form_location">From</label>
                                            @php
                                                $defaultValue = request()->has('round1_from_location') 
                                                    ? request('round1_from_location') 
                                                    : (isset($ferry_locations[1]) ? $ferry_locations[1]->id : 'default_value'); // Replace 'default_value' with the actual ID if needed
                                            @endphp
                                            
                                            <select name="round1_from_location" class="form-select border-0 p-0" id="form_location2">
                                                @foreach ($ferry_locations as $ferry_location)
                                                    <option value="{{ $ferry_location->id }}"
                                                        {{ $defaultValue == $ferry_location->id ? 'selected' : '' }}>
                                                        {{ $ferry_location->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0 border-0 border-md-end">
                                            <label for="to_location">To</label>
                                            <select name="round1_to_location" class="form-select border-0 p-0"
                                                id="to_location2">
                                                @foreach ($ferry_locations as $index => $ferry_location)
                                                    <option value="{{ $ferry_location->id }}"
                                                        {{ old('round1_to_location', request('round1_to_location')) == $ferry_location->id ? 'selected' : '' }}>
                                                        {{ $ferry_location->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-9 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0 border-0 border-md-end">
                                            <label for="date_2">Date</label>
                                            <input type="text" id="date_2" name="round1_date"
                                                class="my_date_picker" placeholder="Select Date"
                                                value="{{ old('round1_date', request('round1_date')) }}" readonly>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0">
                                            <label for="passenger3">Passengers (1+ yr)</label>
                                            <input type="number" name="round1_passenger" max="9" min="1"
                                                id="passenger3"
                                                value="{{ old('round1_passenger', request('round1_passenger', 1)) }}"
                                                required readonly>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0">
                                            <label for="days_1">Infant (0-1 years)</label>
                                            <input type="number" name="round1_infant" max="4" maxlength="1" id="days_1"
                                                value="{{ old('round1_infant', request('round1_infant')) }}">
                                        </div>
                                        <div class="col-3 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0">
                                            <button type="button" class="btn btn-outline-danger delete"
                                                data-section="section2"><i class="bi bi-trash3-fill"></i></button>
                                        </div>
                                    </div>

                                    <!-- Third Section -->
                                    <div class="row border-bottom pb-3 align-items-center" id="section3">
                                        <div class="col-12 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0 border-0 border-md-end">
                                            <label for="form_location">From</label>
                                            @php
                                                $defaultValue = request()->has('round2_from_location') 
                                                    ? request('round2_from_location') 
                                                    : (isset($ferry_locations[2]) ? $ferry_locations[2]->id : 'default_value'); // Replace 'default_value' with the actual ID if needed
                                            @endphp
                                            <select name="round2_from_location" class="form-select border-0 p-0" id="form_location3">
                                                @foreach ($ferry_locations as $ferry_location)
                                                    <option value="{{ $ferry_location->id }}"
                                                        {{ $defaultValue == $ferry_location->id ? 'selected' : '' }}>
                                                        {{ $ferry_location->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0 border-0 border-md-end">
                                            <label for="to_location">To</label>
                                            <select name="round2_to_location" class="form-select border-0 p-0"
                                                id="to_location3">
                                                @foreach ($ferry_locations as $index => $ferry_location)
                                                    <option value="{{ $ferry_location->id }}"
                                                        {{ old('round2_to_location', request('round2_to_location')) == $ferry_location->id ? 'selected' : '' }}>
                                                        {{ $ferry_location->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-9 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0 border-0 border-md-end">
                                            <label for="date_5">Date</label>
                                            <input type="text" name="round2_date" id="date_5"
                                                class="my_date_picker" placeholder="Select Date"
                                                value="{{ old('round2_date', request('round2_date')) }}" readonly>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0">
                                            <label for="passenger4">Passengers (1+ yr)</label>
                                            <input type="number" name="round2_passenger" max="9" min="1"
                                                id="passenger4"
                                                value="{{ old('round2_passenger', request('round2_passenger', 1)) }}"
                                                required readonly>
                                        </div>
                                        <div class="col-12 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0">
                                            <label for="days_7">Infant (0-1 years)</label>
                                            <input type="number" name="round2_infant" max="4" maxlength="1" id="days_7"
                                                value="{{ old('round2_infant', request('round2_infant')) }}">
                                        </div>
                                        <div class="col-3 col-md-6 col-sm-6 col-lg mb-2 mb-lg-0">
                                            <button type="button" class="btn btn-outline-danger delete"
                                                data-section="section3"><i class="bi bi-trash3-fill"></i></button>
                                        </div>
                                    </div>

                                    <!-- Search Button -->
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-8 col-lg-3 mb-2 mb-lg-0">
                                            <button type="submit" class="btn button w-100 searchBtn mt-3"><i
                                                    class="bi bi-search"></i> Search</button>
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

    <input type="hidden" name="trip1details" id="trip1details" value="">
    <input type="hidden" name="trip2details" id="trip2details" value="">
    <input type="hidden" name="trip3details" id="trip3details" value="">
    <input type="hidden" name="trip1seatcount" id="trip1seatcount" value="0">
    <input type="hidden" name="trip2seatcount" id="trip2seatcount" value="0">
    <input type="hidden" name="trip3seatcount" id="trip3seatcount" value="0">
    <input type="hidden" name="trip1seatNo" id="trip1seatNo" value="">
    <input type="hidden" name="trip2seatNo" id="trip2seatNo" value="">
    <input type="hidden" name="trip3seatNo" id="trip3seatNo" value="">

    <div class="text-center  loaderDiv">
        <div id="lds-spinner" class="lds-spinner d-none">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <section id="result" class="Search_Resultss {{ request('trip_type') > 1 ? 'marginSec2' : '' }}">
        <div>
            <div class="row w-100  heading mx-0">
                <h2 class="text-center">Search Results <span>For Ferry</span></h2>
            </div>

            <div class="contentImg">
                <div class="container">
                    <div class="route row px-2 justify-content-end">
                        <div class="col-lg-9 col-md-10">
                            <nav class="mb-3 tabNav">
                                <div class="row w-100 m-0 nav nav-tabs border-0 firstBtn" id="nav-tab" role="tablist">
                                    <button class="nav-link active col-4 border-0" id="nav-profile-tab"
                                        data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab"
                                        aria-controls="nav-profile" aria-selected="true" tabindex="-1">
                                        {{ $route_titles['from_location'] }} → {{ $route_titles['to_location'] }}
                                    </button>
                                    @if (!empty($round1_route_titles))
                                        <button class="nav-link col-4 border-0" id="nav-contact-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-contact" type="button" role="tab"
                                            aria-controls="nav-contact" aria-selected="false" tabindex="-1" disabled>
                                            {{ $round1_route_titles['from_location'] }} →
                                            {{ $round1_route_titles['to_location'] }}
                                        </button>
                                    @endif
                                    @if (!empty($round2_route_titles))
                                        <button class="nav-link col-4 border-0" id="nav-buttonn-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-buttonn" type="button" role="tab"
                                            aria-controls="nav-buttonn" aria-selected="false" tabindex="-1" disabled>
                                            {{ $round2_route_titles['from_location'] }} →
                                            {{ $round2_route_titles['to_location'] }}
                                        </button>
                                    @endif
                                </div>
                            </nav>
                        </div>
                        <div class="d-block d-lg-none col-12 col-md-2">
                            <button data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                class="btn filter_btn w-100">Filter <i class="bi bi-funnel-fill"></i></button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 mt-3 d-none d-lg-block">
                            <div class="filter">
                                <div class="filt">
                                    <h3 class="border-bottom">Filters</h3>
                                </div>

                                {{-- First Button Filter --}}
                                <div id="nav-profile-filter" class="filter-content nav-profile-filter"
                                    style="display: none;">
                                    <div>
                                        <h3 class="ferryy mt-3">Ferry</h3>
                                        <div class="ferry_nme">
                                            <input type="radio" id="Makruzz1" name="ferry" value="Makruzz">
                                            <label for="Makruzz1">Makruzz</label>
                                        </div>
                                        <div class="ferry_nme mt-3">
                                            <input type="radio" id="Nautika1" name="ferry" value="Nautika">
                                            <label for="Nautika1">Nautika</label>
                                        </div>
                                    </div>
                                    <div class="mt-4 shrt_by">
                                        <div>
                                            <h3>Sort by</h3>
                                        </div>
                                        <div>
                                            <input type="radio" id="lowHigh1" name="sortOrder" value="lowHigh">
                                            <label for="lowHigh1">Low to High</label>
                                        </div>
                                        <div class="mt-2">
                                            <input type="radio" id="highLow1" name="sortOrder" value="highLow">
                                            <label for="highLow1">High to Low</label>
                                        </div>
                                    </div>
                                </div>

                                {{-- Second Button Filter --}}
                                <div id="nav-contact-filter" class="filter-content nav-contact-filter"
                                    style="display: none;">
                                    <div>
                                        <h3 class="ferryy mt-3">Ferry</h3>
                                        <div class="ferry_nme">
                                            <input type="radio" for="makruzz" id="Makruzz2" name="ferry"
                                                value="Makruzz">
                                            <label for="Makruzz2">Makruzz</label>
                                        </div>
                                        <div class="ferry_nme mt-3">
                                            <input type="radio" id="Nautika2" name="ferry" value="Nautika">
                                            <label for="Nautika2">Nautika</label>
                                        </div>
                                    </div>
                                    <div class="mt-4 shrt_by">
                                        <div>
                                            <h3>Sort by</h3>
                                        </div>
                                        <div>
                                            <input type="radio" id="lowHigh2" name="sortOrder" value="lowHigh">
                                            <label for="lowHigh2">Low to High</label>
                                        </div>
                                        <div class="mt-2">
                                            <input type="radio" id="highLow2" name="sortOrder" value="highLow">
                                            <label for="highLow2">High to Low</label>
                                        </div>
                                    </div>
                                </div>

                                {{-- Third Button Filter --}}
                                <div id="nav-buttonn-filter" class="filter-content nav-buttonn-filter"
                                    style="display: none;">
                                    <div>
                                        <h3 class="ferryy mt-3">Ferry</h3>
                                        <div class="ferry_nme">
                                            <input type="radio" for="makruzz" id="Makruzz3" name="ferry"
                                                value="Makruzz">
                                            <label for="Makruzz3">Makruzz</label>
                                        </div>
                                        <div class="ferry_nme mt-3">
                                            <input type="radio" id="Nautika3" name="ferry" value="Nautika">
                                            <label for="Nautika3">Nautika</label>
                                        </div>
                                    </div>
                                    <div class="mt-4 shrt_by">
                                        <div>
                                            <h3>Sort by</h3>
                                        </div>
                                        <div>
                                            <input type="radio" id="lowHigh3" name="sortOrder" value="lowHigh">
                                            <label for="lowHigh3">Low to High</label>
                                        </div>
                                        <div class="mt-2">
                                            <input type="radio" id="highLow3" name="sortOrder" value="highLow">
                                            <label for="highLow3">High to Low</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-9 p-0">
                            <div class="tab-content p-3 border bg-transparent border-0" id="nav-tabContent">

                                <div class="tab-pane fade active show" id="nav-profile" role="tabpanel"
                                    aria-labelledby="nav-profile-tab">
                                    <div class="row justify-content-end">
                                        <div class="col-12 searchResults" data-filter-id="nav-profile-filter">
                                            @if (isset($apiScheduleData))
                                                @foreach ($apiScheduleData as $key => $shipSchedule)
                                                    @if ($shipSchedule['ship_name'] == 'Nautika')
                                                        <div class="ferryCard ferrySearch mb-3 flex-lg-row flex-column itemCard"
                                                            data-ferry="{{ $shipSchedule['ship_name'] }}"
                                                            data-price="{{ $shipSchedule['fares']->pBaseFare }}">
                                                            <div class="ferryImg"
                                                                data-ferry-id="{{ $shipSchedule['id'] }}">
                                                                <img src="{{ env('UPLOADED_ASSETS') . $shipSchedule['ship_image'] }}"
                                                                    alt="cardImg" class="makruzz1">
                                                            </div>
                                                            <div class="ferryDetails ms-3 flex-lg-row flex-column">
                                                                <div class="mt-2  pe-3">
                                                                    <h4 class="mb-3">{{ $shipSchedule['ship_name'] }}
                                                                    </h4>
                                                                    <p class="mb-3 fw-medium">Departure Time
                                                                        {{ date('H:i', strtotime($shipSchedule['departure_time'])) }}
                                                                    </p>
                                                                    <p class="mb-3 fw-medium">
                                                                        {{ $shipSchedule['from'] ?? 'NA' }} -
                                                                        {{ $shipSchedule['to'] ?? 'NA' }}</p>
                                                                </div>
                                                                <div>
                                                                    <div class="mt-3 d-flex align-items-center justify-content-between">
                                                                        <div class="me-3 fw-medium"><span>{{ 'Luxury' }}</span> <span class="fw-bold">₹{{ $shipSchedule['fares']->pBaseFare }}</span>
                                                                            <p>Seat: {{ $shipSchedule['p_class_seat_availibility'] }}</p>
                                                                        </div>
                                                                        <div class="btn text-center">
                                                                            <a href="#"
                                                                                id="{{ 'ferry_p_' . $key + 1 }}"
                                                                                data-ferryschedule-id="{{ $shipSchedule['id'] }}"
                                                                                data-trip_id="{{ $shipSchedule['tripId'] }}"
                                                                                data-vessel_id="{{ $shipSchedule['vesselID'] }}"
                                                                                data-from="{{ $shipSchedule['from'] }}"
                                                                                data-to="{{ $shipSchedule['to'] }}"
                                                                                data-departure_time="{{ $shipSchedule['departure_time'] }}"
                                                                                data-arrival_time="{{ $shipSchedule['arrival_time'] }}"
                                                                                data-class-title="{{ 'Luxury' }}"
                                                                                data-class_id="pClass"
                                                                                data-price="{{ $shipSchedule['fares']->pBaseFare }}"
                                                                                data-psf="{{ 50 }}"
                                                                                data-avl_seat="{{ $shipSchedule['p_class_seat_availibility'] }}"
                                                                                data-ship_name="{{ 'Nautika' }}"
                                                                                class="{{ 'Luxury' }} ferry-btn"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#exampleModal"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#{{ 'Nautika_Tab1_' . 'Luxury' . '_' . $key + 1 }}">
                                                                                <p class="m-0">Choose</p>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-3 d-flex align-items-center justify-content-between">
                                                                        <div class="me-3 fw-medium"><span>{{ 'Royal' }}</span> <span class="fw-bold">₹{{ $shipSchedule['fares']->bBaseFare }}</span>
                                                                            <p>Seat: {{ $shipSchedule['b_class_seat_availibility'] }}</p>
                                                                        </div>
                                                                        <div class="btn text-center">
                                                                            <a href="#"
                                                                                class=" {{ 'Royal' }} ferry-btn ferry-btn"
                                                                                id="{{ 'ferry_b_' . $key + 1 }}"
                                                                                data-ferryschedule-id="{{ $shipSchedule['id'] }}"
                                                                                data-trip_id="{{ $shipSchedule['tripId'] }}"
                                                                                data-vessel_id="{{ $shipSchedule['vesselID'] }}"
                                                                                data-from="{{ $shipSchedule['from'] }}"
                                                                                data-to="{{ $shipSchedule['to'] }}"
                                                                                data-departure_time="{{ $shipSchedule['departure_time'] }}"
                                                                                data-arrival_time="{{ $shipSchedule['arrival_time'] }}"
                                                                                data-class-title="{{ 'Royal' }}"
                                                                                data-class_id="bClass"
                                                                                data-price="{{ $shipSchedule['fares']->bBaseFare }}"
                                                                                data-psf="{{ 50 }}"
                                                                                data-avl_seat="{{ $shipSchedule['b_class_seat_availibility'] }}"
                                                                                data-ship_name="{{ 'Nautika' }}"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#exampleModal"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#{{ 'Nautika_Tab1_' . 'Royal' . '_' . $key + 1 }}">
                                                                                <p class="m-0">Choose</p>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- @elseif($shipSchedule['ship_name'] == 'Admin')
                                                        <div class="ferryCard ferrySearch mb-3  flex-lg-row flex-column">
                                                            <div class="ferryImg">
                                                                <img src="{{ env('UPLOADED_ASSETS') . $shipSchedule['ship']['image'] }}" alt="cardimg" class="nautika_a">
                                                            </div>
                                                            <div class="ferryDetails ms-3 flex-lg-row flex-column">
                                                                <div class="mt-2">
                                                                    <h4 class="mb-3">{{ $shipSchedule['ship']['title'] }}</h4>
                                                                    <p class="mb-3 fw-medium">Departure Time {{ date('H:i', strtotime($shipSchedule['departure_time'])) }}</p>
                                                                    <p class="mb-3 fw-medium">{{ $shipSchedule['from_location']['title'] ?? 'NA' }} - {{ $shipSchedule['to_location']['title'] ?? 'NA' }}</p>
                                                                </div>
                                                                <div class="mt-3 flex-lg-row flex-column">
                                                                    @foreach ($shipSchedule['ferry_prices'] as $adminFerry)
                                                                        <a href="#"
                                                                            id="{{ 'ferry_p_' . $key + 1 }}"
                                                                            data-ferryschedule-id="{{ $shipSchedule['id'] }}"
                                                                            data-from="{{ $shipSchedule['from_location']['title'] }}"
                                                                            data-to="{{ $shipSchedule['to_location']['title'] }}"
                                                                            data-departure_time="{{ $shipSchedule['departure_time'] }}"
                                                                            data-arrival_time="{{ $shipSchedule['arrival_time'] }}"
                                                                            data-class-title="{{ $adminFerry['class']['title'] }}"
                                                                            data-class_id="{{ $adminFerry['class']['id'] }}"
                                                                            data-price="{{ $adminFerry['price'] }}"
                                                                            data-psf="{{ 50 }}"
                                                                            data-ship_name="Admin"
                                                                            class="btn {{ $adminFerry['class']['title'] }} ferry-btn">
                                                                            {{ $adminFerry['class']['title'] }}
                                                                            <p class="m-0">₹{{ $adminFerry['price'] }}</p>
                                                                        </a>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div> --}}
                                                    @elseif($shipSchedule['ship_name'] == 'Makruzz')
                                                        @php
                                                            $firstPrice = !empty($shipSchedule['ship_class'])
                                                                ? $shipSchedule['ship_class'][0]->ship_class_price
                                                                : 'NA';
                                                        @endphp
                                                        <div class="ferryCard ferrySearch mb-3 flex-lg-row flex-column itemCard"
                                                            data-ferry="{{ $shipSchedule['ship_name'] }}"
                                                            data-price="{{ $firstPrice }}">
                                                            <div class="ferryImg">
                                                                <img src="{{ env('UPLOADED_ASSETS') . $shipSchedule['ship_image'] }}"
                                                                    alt="cardImg" class="crdimg">
                                                            </div>
                                                            <div class="ferryDetails ms-3 flex-lg-row flex-column">
                                                                <div class="mt-2 me-3">
                                                                    <h4 class="mb-3">{{ $shipSchedule['ship_name'] }}
                                                                    </h4>
                                                                    <p class="mb-3 fw-medium">Departure Time
                                                                        {{ date('H:i', strtotime($shipSchedule['ship_class'][0]->departure_time)) }}
                                                                    </p>
                                                                    {{-- <p class="mb-3 fw-medium">Arrival Time {{ date('H:i', strtotime($shipSchedule['ship_class'][0]->arrival_time)) }}</p> --}}
                                                                    <p class="mb-3 fw-medium">
                                                                        {{ $shipSchedule['ship_class'][0]->source_name ?? 'NA' }}
                                                                        -
                                                                        {{ $shipSchedule['ship_class'][0]->destination_name ?? 'NA' }}
                                                                    </p>
                                                                </div>
                                                                <div>
                                                                    @foreach ($shipSchedule['ship_class'] as $ferryPrice)
                                                                        <div class="mt-3 d-flex align-items-center justify-content-between">
                                                                            <div class="me-3 fw-medium"><span>{{ $ferryPrice->ship_class_title }}</span> <span class="fw-bold">₹{{ $ferryPrice->ship_class_price }}</span>
                                                                                <p>Seat: {{ $ferryPrice->seat }}</p>
                                                                            </div>
                                                                            <div class="btn text-center">
                                                                                <a href="#"
                                                                                    id="{{ 'ferry_' . $ferryPrice->ship_class_title . '_' . $key + 1 }}"
                                                                                    data-ferryschedule-id="{{ $ferryPrice->id }}"
                                                                                    data-class_id="{{ $ferryPrice->ship_class_id }}"
                                                                                    data-from="{{ $ferryPrice->source_name }}"
                                                                                    data-to="{{ $ferryPrice->destination_name }}"
                                                                                    data-departure_time="{{ $ferryPrice->departure_time }}"
                                                                                    data-arrival_time="{{ $ferryPrice->arrival_time }}"
                                                                                    data-class-title="{{ $ferryPrice->ship_class_title }}"
                                                                                    data-price="{{ $ferryPrice->ship_class_price }}"
                                                                                    data-psf="{{ $ferryPrice->psf }}"
                                                                                    data-avl_seat="{{ $ferryPrice->seat }}"
                                                                                    data-ship_name="{{ 'Makruzz' }}"
                                                                                    class="{{ $ferryPrice->ship_class_title }}"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#{{ 'Makruzz_Tab1_' . $ferryPrice->ship_class_title . '_' . $key + 1 }}">
                                                                                    <p class="m-0">Book</p>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                    aria-labelledby="nav-profile-tab">
                                    <div class="row justify-content-end">
                                        <div class="col-12 searchResults" data-filter-id="nav-contact-filter">
                                            @if (isset($apiScheduleData2))
                                                @foreach ($apiScheduleData2 as $key => $shipSchedule)
                                                    @if ($shipSchedule['ship_name'] == 'Nautika')
                                                        <div class="ferryCard ferrySearch mb-3  flex-lg-row flex-column itemCard"
                                                            data-ferry="{{ $shipSchedule['ship_name'] }}"
                                                            data-price="{{ $shipSchedule['fares']->pBaseFare }}">
                                                            <div class="ferryImg">
                                                                <img src="{{ env('UPLOADED_ASSETS') . $shipSchedule['ship_image'] }}"
                                                                    alt="cardImg" class="nautika_a">
                                                            </div>
                                                            <div class="ferryDetails ms-3 flex-lg-row flex-column">
                                                                <div class="mt-2 me-3">
                                                                    <h4 class="mb-3">{{ $shipSchedule['ship_name'] }}
                                                                    </h4>
                                                                    <p class="mb-3 fw-medium">Departure Time
                                                                        {{ date('H:i', strtotime($shipSchedule['departure_time'])) }}
                                                                    </p>
                                                                    {{-- <p class="mb-3 fw-medium">Arrival Time {{ date('H:i', strtotime($shipSchedule['arrival_time'])) }}</p> --}}
                                                                    <p class="mb-3 fw-medium">
                                                                        {{ $shipSchedule['from'] ?? 'NA' }} -
                                                                        {{ $shipSchedule['to'] ?? 'NA' }}</p>
                                                                </div>
                                                                <div>
                                                                    <div class="mt-3 d-flex align-items-center justify-content-between">
                                                                        <div class="me-3 fw-medium"><span>{{ 'Luxury' }}</span> <span class="fw-bold">₹{{ $shipSchedule['fares']->pBaseFare }}</span>
                                                                            <p>Seat: {{ $shipSchedule['p_class_seat_availibility'] }}</p>
                                                                        </div>
                                                                        <div class="btn text-center">
                                                                            <a href="#"
                                                                                id="{{ 'ferry_p_' . $key + 1 }}"
                                                                                data-ferryschedule-id="{{ $shipSchedule['id'] }}"
                                                                                data-trip_id="{{ $shipSchedule['tripId'] }}"
                                                                                data-vessel_id="{{ $shipSchedule['vesselID'] }}"
                                                                                data-from="{{ $shipSchedule['from'] }}"
                                                                                data-to="{{ $shipSchedule['to'] }}"
                                                                                data-departure_time="{{ $shipSchedule['departure_time'] }}"
                                                                                data-arrival_time="{{ $shipSchedule['arrival_time'] }}"
                                                                                data-class-title="{{ 'Luxury' }}"
                                                                                data-class_id="pClass"
                                                                                data-price="{{ $shipSchedule['fares']->pBaseFare }}"
                                                                                data-psf="{{ 50 }}"
                                                                                data-avl_seat="{{ $shipSchedule['p_class_seat_availibility'] }}"
                                                                                data-ship_name="{{ 'Nautika' }}"
                                                                                class="{{ 'Luxury' }} ferry-btn2"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#exampleModal"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#{{ 'Nautika_Tab2_' . 'Luxury' . '_' . $key + 1 }}">
                                                                                <p class="m-0">Choose</p>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-3 d-flex align-items-center justify-content-between">
                                                                        <div class="me-3 fw-medium"><span>{{ 'Royal' }}</span> <span class="fw-bold">₹{{ $shipSchedule['fares']->bBaseFare }}</span>
                                                                            <p>Seat: {{ $shipSchedule['b_class_seat_availibility'] }}</p>
                                                                        </div>
                                                                        <div class="btn text-center">
                                                                            <a href="#"
                                                                                id="{{ 'ferry_b_' . $key + 1 }}"
                                                                                data-ferryschedule-id="{{ $shipSchedule['id'] }}"
                                                                                data-trip_id="{{ $shipSchedule['tripId'] }}"
                                                                                data-vessel_id="{{ $shipSchedule['vesselID'] }}"
                                                                                data-from="{{ $shipSchedule['from'] }}"
                                                                                data-to="{{ $shipSchedule['to'] }}"
                                                                                data-departure_time="{{ $shipSchedule['departure_time'] }}"
                                                                                data-arrival_time="{{ $shipSchedule['arrival_time'] }}"
                                                                                data-class-title="{{ 'Royal' }}"
                                                                                data-class_id="bClass"
                                                                                data-price="{{ $shipSchedule['fares']->bBaseFare }}"
                                                                                data-psf="{{ 50 }}"
                                                                                data-avl_seat="{{ $shipSchedule['b_class_seat_availibility'] }}"
                                                                                data-ship_name="{{ 'Nautika' }}"
                                                                                class="{{ 'Royal' }} ferry-btn2"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#exampleModal"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#{{ 'Nautika_Tab2_' . 'Royal' . '_' . $key + 1 }}">
                                                                                <p class="m-0">Choose</p>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- @elseif($shipSchedule['ship_name'] == 'Admin')
                                                        <div class="ferryCard ferrySearch mb-3  flex-lg-row flex-column">
                                                            <div class="ferryImg" data-ferry-id="{{ $shipSchedule['id'] }}">
                                                                <img src="{{ env('UPLOADED_ASSETS') . $shipSchedule['ship']['image'] }}" alt="cardimg" class="nautika_a">
                                                            </div>
                                                            <div class="ferryDetails ms-3 flex-lg-row flex-column">
                                                                <div class="mt-2">
                                                                    <h4 class="mb-3">{{ $shipSchedule['ship']['title'] }}</h4>
                                                                    <p class="mb-3 fw-medium">Departure Time {{ date('H:i', strtotime($shipSchedule['departure_time'])) }}</p>
                                                                    {{-- <p class="mb-3 fw-medium">Arrival Time {{ date('H:i', strtotime($shipSchedule['arrival_time'])) }}</p> --}}
                                                        {{-- <p class="mb-3 fw-medium">{{ $shipSchedule['from_location']['title'] ?? 'NA' }} - {{ $shipSchedule['to_location']['title'] ?? 'NA' }}</p>
                                                                </div>
                                                                <div class="mt-3 flex-lg-row flex-column">
                                                                    @foreach ($shipSchedule['ferry_prices'] as $adminFerry)
                                                                    <a href="#"
                                                                            id="{{ 'ferry_p_' . $key + 1 }}"
                                                                            data-ferryschedule-id="{{ $shipSchedule['id'] }}"
                                                                            data-from="{{ $shipSchedule['from_location']['title'] }}"
                                                                            data-to="{{ $shipSchedule['to_location']['title'] }}"
                                                                            data-departure_time="{{ $shipSchedule['departure_time'] }}"
                                                                            data-arrival_time="{{ $shipSchedule['arrival_time'] }}"
                                                                            data-class-title="{{ $adminFerry['class']['title'] }}"
                                                                            data-class_id="{{ $adminFerry['class']['id'] }}"
                                                                            data-price="{{ $adminFerry['price'] }}"
                                                                            data-psf="{{ 50 }}"
                                                                            data-ship_name="Admin"
                                                                            class="btn {{ $adminFerry['class']['title'] }} ferry-btn2">
                                                                            {{ $adminFerry['class']['title'] }}
                                                                            <p class="m-0">₹{{ $adminFerry['price'] }}</p>
                                                                        </a>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div> --}}
                                                    @elseif($shipSchedule['ship_name'] == 'Makruzz')
                                                        @php
                                                            $firstPrice = !empty($shipSchedule['ship_class'])
                                                                ? $shipSchedule['ship_class'][0]->ship_class_price
                                                                : 'NA';
                                                        @endphp
                                                        <div class="ferryCard ferrySearch mb-3  flex-lg-row flex-column itemCard"
                                                            data-ferry="{{ $shipSchedule['ship_name'] }}"
                                                            data-price="{{ $firstPrice }}">
                                                            <div class="ferryImg">
                                                                <img src="{{ env('UPLOADED_ASSETS') . $shipSchedule['ship_image'] }}"
                                                                    alt="cardImg" class="crdimg">
                                                            </div>
                                                            <div class="ferryDetails ms-3 flex-lg-row flex-column">
                                                                <div class="mt-2 me-3">
                                                                    <h4 class="mb-3">{{ $shipSchedule['ship_name'] }}
                                                                    </h4>
                                                                    <p class="mb-3 fw-medium">Departure Time
                                                                        {{ date('H:i', strtotime($shipSchedule['ship_class'][0]->departure_time)) }}
                                                                    </p>
                                                                    {{-- <p class="mb-3 fw-medium">Arrival Time {{ date('H:i', strtotime($shipSchedule['ship_class'][0]->arrival_time)) }}</p> --}}
                                                                    <p class="mb-3 fw-medium">
                                                                        {{ $shipSchedule['ship_class'][0]->source_name ?? 'NA' }}
                                                                        -
                                                                        {{ $shipSchedule['ship_class'][0]->destination_name ?? 'NA' }}
                                                                    </p>
                                                                </div>
                                                                <div>
                                                                    @foreach ($shipSchedule['ship_class'] as $ferryPrice)
                                                                        <div class="mt-3 d-flex align-items-center justify-content-between">
                                                                            <div class="me-3 fw-medium"><span>{{ $ferryPrice->ship_class_title }}</span> <span class="fw-bold">₹{{ $ferryPrice->ship_class_price }}</span>
                                                                                <p>Seat: {{ $ferryPrice->seat }}`</p>
                                                                            </div> 
                                                                            <div class="btn text-center">
                                                                                <a href="#"
                                                                                    id="{{ 'ferry_' . $ferryPrice->ship_class_title . '_' . $key + 1 }}"
                                                                                    data-ferryschedule-id="{{ $ferryPrice->id }}"
                                                                                    data-class_id="{{ $ferryPrice->ship_class_id }}"
                                                                                    data-from="{{ $ferryPrice->source_name }}"
                                                                                    data-to="{{ $ferryPrice->destination_name }}"
                                                                                    data-departure_time="{{ $ferryPrice->departure_time }}"
                                                                                    data-arrival_time="{{ $ferryPrice->arrival_time }}"
                                                                                    data-class-title="{{ $ferryPrice->ship_class_title }}"
                                                                                    data-price="{{ $ferryPrice->ship_class_price }}"
                                                                                    data-psf="{{ $ferryPrice->psf }}"
                                                                                    data-avl_seat="{{ $ferryPrice->seat }}"
                                                                                    data-ship_name="{{ 'Makruzz' }}"
                                                                                    class="{{ $ferryPrice->ship_class_title }}"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#{{ 'Makruzz_Tab2_' . $ferryPrice->ship_class_title . '_' . $key + 1 }}">
                                                                                    <p class="m-0">Book</p>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade " id="nav-buttonn" role="tabpanel">
                                    <div class="row">
                                        <div class="col-12 searchResults" data-filter-id="nav-buttonn-filter">
                                            @if (isset($apiScheduleData3))
                                                @foreach ($apiScheduleData3 as $key => $shipSchedule)
                                                    @if ($shipSchedule['ship_name'] == 'Nautika')
                                                        <div class="ferryCard ferrySearch mb-3 flex-lg-row flex-column itemCard"
                                                            data-ferry="{{ $shipSchedule['ship_name'] }}"
                                                            data-price="{{ $shipSchedule['fares']->pBaseFare }}">
                                                            <div class="ferryImg"
                                                                data-ferry-id="{{ $shipSchedule['id'] }}">
                                                                <img src="{{ env('UPLOADED_ASSETS') . $shipSchedule['ship_image'] }}"
                                                                    alt="cardImg" class="nautika_a">
                                                            </div>
                                                            <div class="ferryDetails ms-3 flex-lg-row flex-column">
                                                                <div class="mt-2 me-3">
                                                                    <h4 class="mb-3">{{ $shipSchedule['ship_name'] }}
                                                                    </h4>
                                                                    <p class="mb-3 fw-medium">Departure Time
                                                                        {{ date('H:i', strtotime($shipSchedule['departure_time'])) }}
                                                                    </p>
                                                                    {{-- <p class="mb-3 fw-medium">Arrival Time {{ date('H:i', strtotime($shipSchedule['arrival_time'])) }}</p> --}}
                                                                    <p class="mb-3 fw-medium">
                                                                        {{ $shipSchedule['from'] ?? 'NA' }} -
                                                                        {{ $shipSchedule['to'] ?? 'NA' }}</p>
                                                                </div>
                                                                <div>
                                                                    <div class="mt-3 d-flex align-items-center justify-content-between">
                                                                        <div class="me-3 fw-medium"><span>{{ 'Luxury' }}</span> <span class="fw-bold">₹{{ $shipSchedule['fares']->pBaseFare }}</span>
                                                                            <p>Seat: {{ $shipSchedule['p_class_seat_availibility'] }}</p>
                                                                        </div>
                                                                        <div class="btn text-center">
                                                                            <a href="#"
                                                                                id="{{ 'ferry_p_' . $key + 1 }}"
                                                                                data-ferryschedule-id="{{ $shipSchedule['id'] }}"
                                                                                data-trip_id="{{ $shipSchedule['tripId'] }}"
                                                                                data-vessel_id="{{ $shipSchedule['vesselID'] }}"
                                                                                data-from="{{ $shipSchedule['from'] }}"
                                                                                data-to="{{ $shipSchedule['to'] }}"
                                                                                data-departure_time="{{ $shipSchedule['departure_time'] }}"
                                                                                data-arrival_time="{{ $shipSchedule['arrival_time'] }}"
                                                                                data-class-title="{{ 'Luxury' }}"
                                                                                data-class_id="pClass"
                                                                                data-price="{{ $shipSchedule['fares']->pBaseFare }}"
                                                                                data-psf="{{ 50 }}"
                                                                                data-avl_seat="{{ $shipSchedule['p_class_seat_availibility'] }}"
                                                                                data-ship_name="{{ 'Nautika' }}"
                                                                                class="{{ 'Luxury' }} ferry-btn3"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#exampleModal"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#{{ 'Nautika_Tab3_' . 'Luxury' . '_' . $key + 1 }}">
                                                                                <p class="m-0">Choose</p>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mt-3 d-flex align-items-center justify-content-between">
                                                                        <div class="me-3 fw-medium"><span>{{ 'Royal' }}</span> <span class="fw-bold">₹{{ $shipSchedule['fares']->bBaseFare }}</span>
                                                                            <p>Seat: {{ $shipSchedule['b_class_seat_availibility'] }}</p>
                                                                        </div>
                                                                        <div class="btn text-center">
                                                                            <a href="#"
                                                                                id="{{ 'ferry_b_' . $key + 1 }}"
                                                                                data-ferryschedule-id="{{ $shipSchedule['id'] }}"
                                                                                data-trip_id="{{ $shipSchedule['tripId'] }}"
                                                                                data-vessel_id="{{ $shipSchedule['vesselID'] }}"
                                                                                data-from="{{ $shipSchedule['from'] }}"
                                                                                data-to="{{ $shipSchedule['to'] }}"
                                                                                data-departure_time="{{ $shipSchedule['departure_time'] }}"
                                                                                data-arrival_time="{{ $shipSchedule['arrival_time'] }}"
                                                                                data-class-title="{{ 'Royal' }}"
                                                                                data-class_id="bClass"
                                                                                data-price="{{ $shipSchedule['fares']->bBaseFare }}"
                                                                                data-psf="{{ 50 }}"
                                                                                data-avl_seat="{{ $shipSchedule['b_class_seat_availibility'] }}"
                                                                                data-ship_name="{{ 'Nautika' }}"
                                                                                class="{{ 'Royal' }} ferry-btn3"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#exampleModal"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#{{ 'Nautika_Tab3_' . 'Royal' . '_' . $key + 1 }}">
                                                                                <p class="m-0">Choose</p>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- @elseif($shipSchedule['ship_name'] == 'Admin')
                                                        <div class="ferryCard ferrySearch mb-3  flex-lg-row flex-column">
                                                            <div class="ferryImg" data-ferry-id="{{ $shipSchedule['id'] }}">
                                                                <img src="{{ env('UPLOADED_ASSETS') . $shipSchedule['ship']['image'] }}" alt="cardimg" class="nautika_a">
                                                            </div>
                                                            <div class="ferryDetails ms-3 flex-lg-row flex-column">
                                                                <div class="mt-2">
                                                                    <h4 class="mb-3">{{ $shipSchedule['ship']['title'] }}</h4>
                                                                    <p class="mb-3 fw-medium">Departure Time {{ date('H:i', strtotime($shipSchedule['departure_time'])) }}</p>
                                                                    {{-- <p class="mb-3 fw-medium">Arrival Time {{ date('H:i', strtotime($shipSchedule['arrival_time'])) }}</p> --}}
                                                        {{-- <p class="mb-3 fw-medium">{{ $shipSchedule['from_location']['title'] ?? 'NA' }} - {{ $shipSchedule['to_location']['title'] ?? 'NA' }}</p>
                                                                </div>
                                                                <div class="mt-3 flex-lg-row flex-column">
                                                                    @foreach ($shipSchedule['ferry_prices'] as $adminFerry)
                                                                    <a href="#"
                                                                            id="{{ 'ferry_p_' . $key + 1 }}"
                                                                            data-ferryschedule-id="{{ $shipSchedule['id'] }}"
                                                                            data-from="{{ $shipSchedule['from_location']['title'] }}"
                                                                            data-to="{{ $shipSchedule['to_location']['title'] }}"
                                                                            data-departure_time="{{ $shipSchedule['departure_time'] }}"
                                                                            data-arrival_time="{{ $shipSchedule['arrival_time'] }}"
                                                                            data-class-title="{{ $adminFerry['class']['title'] }}"
                                                                            data-class_id="{{ $adminFerry['class']['id'] }}"
                                                                            data-price="{{ $adminFerry['price'] }}"
                                                                            data-psf="{{ 50 }}"
                                                                            data-ship_name="Admin"
                                                                            class="btn {{ $adminFerry['class']['title'] }} ferry-btn3">
                                                                            {{ $adminFerry['class']['title'] }}<p class="m-0">₹{{ $adminFerry['price'] }}</p>
                                                                        </a>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div> --}}
                                                    @elseif($shipSchedule['ship_name'] == 'Makruzz')
                                                        @php
                                                            $firstPrice = !empty($shipSchedule['ship_class'])
                                                                ? $shipSchedule['ship_class'][0]->ship_class_price
                                                                : 'NA';
                                                        @endphp
                                                        <div class="ferryCard ferrySearch mb-3  flex-lg-row flex-column itemCard"
                                                            data-ferry="{{ $shipSchedule['ship_name'] }}"
                                                            data-price="{{ $firstPrice }}">
                                                            <div class="ferryImg">
                                                                <img src="{{ env('UPLOADED_ASSETS') . $shipSchedule['ship_image'] }}"
                                                                    alt="cardImg" class="crdimg">
                                                            </div>
                                                            <div class="ferryDetails ms-3 flex-lg-row flex-column">
                                                                <div class="mt-2 me-3">
                                                                    <h4 class="mb-3">{{ $shipSchedule['ship_name'] }}
                                                                    </h4>
                                                                    <p class="mb-3 fw-medium">Departure Time
                                                                        {{ date('H:i', strtotime($shipSchedule['ship_class'][0]->departure_time)) }}
                                                                    </p>
                                                                    {{-- <p class="mb-3 fw-medium">Arrival Time {{ date('H:i', strtotime($shipSchedule['ship_class'][0]->arrival_time)) }}</p> --}}
                                                                    <p class="mb-3 fw-medium">
                                                                        {{ $shipSchedule['ship_class'][0]->source_name ?? 'NA' }}
                                                                        -
                                                                        {{ $shipSchedule['ship_class'][0]->destination_name ?? 'NA' }}
                                                                    </p>
                                                                </div>
                                                                <div>
                                                                    @foreach ($shipSchedule['ship_class'] as $ferryPrice)
                                                                        <div class="mt-3 d-flex align-items-center justify-content-between">
                                                                            <div class="me-3 fw-medium"><span>{{ $ferryPrice->ship_class_title }}</span> <span class="fw-bold">₹{{ $ferryPrice->ship_class_price }}</span>
                                                                                <p>Seat: {{ $ferryPrice->seat }}</p>
                                                                            </div>
                                                                            <div class="btn text-center">
                                                                                <a href="#"
                                                                                    id="{{ 'ferry_' . $ferryPrice->ship_class_title . '_' . $key + 1 }}"
                                                                                    data-ferryschedule-id="{{ $ferryPrice->id }}"
                                                                                    data-class_id="{{ $ferryPrice->ship_class_id }}"
                                                                                    data-from="{{ $ferryPrice->source_name }}"
                                                                                    data-to="{{ $ferryPrice->destination_name }}"
                                                                                    data-departure_time="{{ $ferryPrice->departure_time }}"
                                                                                    data-arrival_time="{{ $ferryPrice->arrival_time }}"
                                                                                    data-class-title="{{ $ferryPrice->ship_class_title }}"
                                                                                    data-price="{{ $ferryPrice->ship_class_price }}"
                                                                                    data-psf="{{ $ferryPrice->psf }}"
                                                                                    data-avl_seat="{{ $ferryPrice->seat }}"
                                                                                    data-ship_name="{{ 'Makruzz' }}"
                                                                                    class="{{ $ferryPrice->ship_class_title }}"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#{{ 'Makruzz_Tab3_' . $ferryPrice->ship_class_title . '_' . $key + 1 }}">
                                                                                    <p class="m-0">Book</p>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
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
        $(".my_date_picker").datepicker({
            dateFormat: 'dd-mm-yy', // Format for the date
            minDate: 0 // Prevents selection of past dates
        });
    });

    $(document).ready(function() {
        $(".loaderBG").addClass("show");

        setTimeout(function() {
            $(".loaderBG").removeClass("show");
        }, 4000);
        
        // $('html, body').animate({
        //     scrollTop: $(".Search_Resultss").offset().top +150
        // }, 1000);

        var isMobile = window.innerWidth <= 556; // Define mobile breakpoint (768px for example)
        var offset = isMobile ? -95 : -100; // 150px for mobile, -100px for desktop
        $('html, body').animate({
            scrollTop: $(".Search_Resultss").offset().top + offset
        }, 1000);
    });
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
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
    document.querySelectorAll('.delete').forEach(function(button) {
        button.addEventListener('click', function() {
            var sectionId = this.getAttribute('data-section');
            var section = document.getElementById(sectionId);

            if (section) {
                section.remove(); // Remove the section from the DOM
            }
        });
    });
</script>

@push('js')
<script type="text/javascript">
    function maxpassenger(element) {
        if (element.value < 1 || element.value > 20) {

            $(element).val('');
        }
    }

    // end validation for return date
    function enableDiv1() {
        $(".tabs.tabs1.row.mx-0").find("input, select, button").prop("disabled", false);
    }

    function disableDiv() {

        $(".tabs.tabs2.mx-0").find("input, select, button").prop("disabled", true);
    }

    function disableDiv1() {
        $(".tabs.tabs1.row.mx-0").find("input, select, button").prop("disabled", true);
    }

    function enableDiv() {
        $(".tabs.tabs2.mx-0").find("input, select, button").prop("disabled", false);
    }

    disableDiv();

    $(".tabBtn.tabBtn1").on("click", function() {
        enableDiv1();
        disableDiv();
    });

    $(".tabBtn.tabBtn2").on("click", function() {
        enableDiv();
        disableDiv1();
    });


    function getQueryParams() {
        const params = new URLSearchParams(window.location.search);
        return {
            tripType: params.get('trip_type'),

        };
    }


    $(document).ready(function() {

        // Joydev

        const seatsSl = [];


        $('.ferryImg').on('click', function() {
            var ferryId = $(this).data('ferry-id');
            $('#imageModal-' + ferryId).modal('show');
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // document.getElementById('form_location').addEventListener('change', function() {
        //     updateToLocationOptions();
        // });
        // updateToLocationOptions();

        var clickCount = 0;

        $('.ferry-btn').on('click', function(event) {
            event.preventDefault();

            var avl_seat = $(this).data('avl_seat');
            var passenger = $('#passenger').val();

            if (avl_seat < passenger) {
                alert('Not Enough Seat Available')
                die();
            }

            var element = $(this);

            var shipClass = $(this).data('class_id');

            if (shipClass == 'pClass') {
                $("#luxuryContainer").css('display', 'block');
                $("#royalContainer").css('display', 'none');
            } else if (shipClass == 'bClass') {
                $("#royalContainer").css('display', 'block');
                $("#luxuryContainer").css('display', 'none');
            }

            // remove all selected seat an d let user select new
            $('.luxury-down').find('.seat').removeClass("selected");
            $("#trip1seatcount").val(0);

            var shipName = $(this).data('ship_name');

            $.ajax({
                url: '{{ url('booking-data-store') }}',
                method: 'POST',
                data: {
                    trip: 1,
                    ship: $(this).data('ship_name'),
                    scheduleId: $(this).data('ferryschedule-id'),
                    shipClass: $(this).data('class_id')
                },
                success: function(response) {
                    var results = JSON.parse(response);
                    if (results.seats) {
                        var seats = results.seats;
                        Object.entries(seats).forEach(([key, value]) => {
                            if (value.isBooked == 1 || value.isBlocked == 1) {

                                $('.' + value.number + '.' + results.ship_class)
                                    .each(function() {
                                        $(this).addClass('booked');
                                    });
                            }
                            $('.' + value.number + '.' + results.ship_class).each(
                                function() {
                                    $(this).attr('data-trip-no', '1');
                                    $(this).attr('data-seat-no', value.number);
                                });
                        });
                    }

                    var shipName = element.data('ship_name');
                    @if (request('trip_type') == 1)
                        if (shipName != 'Nautika') {
                            var newUrl = "{{ route('booking-ferry') }}";
                            window.location.href = newUrl;
                            // $(document).find("#nav-contact-tab").removeClass('disabled')
                            //     .trigger("click");
                        }
                    @else

                        if (shipName != 'Nautika') {
                            $(document).find("#nav-contact-tab").removeClass('disabled')
                                .prop('disabled', false)
                                .trigger("click");
                        }
                    @endif
                    var ferryScheduleId = element.data('ferryschedule-id');
                    var classId = element.data('class_id');
                    var tripId = element.data('trip_id');
                    var vesselId = element.data('vessel_id');
                    var from = element.data('from');
                    var to = element.data('to');
                    var departureTime = element.data('departure_time');
                    var arrivalTime = element.data('arrival_time');
                    var classTitle = element.data('class-title');
                    var price = element.data('price');
                    var psf = element.data('psf');
                    var avlSeat = element.data('avl_seat');

                    var trip1Details = {
                        'ship_name': shipName,
                        'ferryschedule_id': ferryScheduleId,
                        'class_id': classId,
                        'trip_id': tripId,
                        'vessel_id': vesselId,
                        'from': from,
                        'to': to,
                        'departure_time': departureTime,
                        'arrival_time': arrivalTime,
                        'class_title': classTitle,
                        'price': price,
                        'psf': psf,
                        'avl_seat': avlSeat,
                    };

                    var trip1Detailsstr = JSON.stringify(trip1Details);
                    $("#trip1details").val(trip1Detailsstr);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });


        // when round 2 booking 
        $('.ferry-btn2').on('click', function(event) {
            event.preventDefault();

            var avl_seat = $(this).data('avl_seat');
            var passenger = $('#passenger').val();

            if (avl_seat < passenger) {
                alert('Not Enough Seat Available');
                die();
            }

            var element = $(this);

            var shipClass = $(this).data('class_id');
            var shipName = $(this).data('ship_name');

            if (shipClass == 'pClass') {
                $("#luxuryContainer").css('display', 'block');
                $("#royalContainer").css('display', 'none');
            } else if (shipClass == 'bClass') {
                $("#royalContainer").css('display', 'block');
                $("#luxuryContainer").css('display', 'none');
            }

            // remove all selected seat an d let user select new
            $('.luxury-down').find('.seat').removeClass("selected");
            $("#trip2seatcount").val(0);

            $.ajax({
                url: '{{ url('booking-data-store') }}',
                method: 'POST',
                data: {
                    trip: 2,
                    ship: $(this).data('ship_name'),
                    scheduleId: $(this).data('ferryschedule-id'),
                    shipClass: $(this).data('class_id')
                },
                success: function(response) {
                    var results = JSON.parse(response)

                    if (results.seats) {
                        var seats = results.seats;
                        Object.entries(seats).forEach(([key, value]) => {

                            if (value.isBooked == 1 || value.isBlocked == 1) {
                                // $("." + value.number).addClass("booked");
                                $('.' + value.number + '.' + results.ship_class)
                                    .each(function() {
                                        $(this).addClass('booked');
                                    });
                            }

                            $('.' + value.number + '.' + results.ship_class).each(
                                function() {
                                    $(this).attr('data-trip-no', '2');
                                    $(this).attr('data-seat-no', value.number);
                                });
                        });
                    }

                    var shipName = element.data('ship_name');
                    @if (request('trip_type') == 2)
                        if (shipName != 'Nautika') {
                            var newUrl = "{{ route('booking-ferry') }}";
                            window.location.href = newUrl;
                            // $(document).find("#nav-contact-tab").removeClass('disabled')
                            //     .trigger("click");
                        }
                    @else

                        if (shipName != 'Nautika') {
                            $(document).find("#nav-buttonn-tab").removeClass('disabled')
                                .prop("disabled", false)
                                .trigger("click");
                        }
                    @endif
                    var ferryScheduleId = element.data('ferryschedule-id');
                    var classId = element.data('class_id');
                    var tripId = element.data('trip_id');
                    var vesselId = element.data('vessel_id');
                    var from = element.data('from');
                    var to = element.data('to');
                    var departureTime = element.data('departure_time');
                    var arrivalTime = element.data('arrival_time');
                    var classTitle = element.data('class-title');
                    var price = element.data('price');
                    var psf = element.data('psf');
                    var avlSeat = element.data('avl_seat');

                    var trip2Details = {
                        'ship_name': shipName,
                        'ferryschedule_id': ferryScheduleId,
                        'class_id': classId,
                        'trip_id': tripId,
                        'vessel_id': vesselId,
                        'from': from,
                        'to': to,
                        'departure_time': departureTime,
                        'arrival_time': arrivalTime,
                        'class_title': classTitle,
                        'price': price,
                        'psf': psf,
                        'avl_seat': avlSeat,
                    };

                    var trip2Detailsstr = JSON.stringify(trip2Details);
                    $("#trip2details").val(trip2Detailsstr);

                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });


        });


        // when round 3 booking 
        $('.ferry-btn3').on('click', function(event) {
            event.preventDefault();

            var avl_seat = $(this).data('avl_seat');
            var passenger = $('#passenger').val();

            if (avl_seat < passenger) {
                alert('Not Enough Seat Available')
                die();
            }

            var element = $(this);

            var shipClass = $(this).data('class_id');
            var shipName = $(this).data('ship_name');

            console.log("shipName == " + shipName);


            if (shipClass == 'pClass') {
                $("#luxuryContainer").css('display', 'block');
                $("#royalContainer").css('display', 'none');
            } else if (shipClass == 'bClass') {
                $("#royalContainer").css('display', 'block');
                $("#luxuryContainer").css('display', 'none');
            }

            // remove all selected seat an d let user select new
            $('.luxury-down').find('.seat').removeClass("selected");
            $("#trip3seatcount").val(0);

            $.ajax({
                url: '{{ url('booking-data-store') }}',
                method: 'POST',
                data: {
                    trip: 3,
                    ship: $(this).data('ship_name'),
                    scheduleId: $(this).data('ferryschedule-id'),
                    shipClass: $(this).data('class_id')
                },
                success: function(response) {

                    var results = JSON.parse(response)
                    if (results.seats) {
                        var seats = results.seats;
                        Object.entries(seats).forEach(([key, value]) => {
                            if (value.isBooked == 1 || value.isBlocked == 1) {
                                // $("." + value.number).addClass("booked");
                                $('.' + value.number + '.' + results.ship_class)
                                    .each(function() {
                                        $(this).addClass('booked');
                                    });
                            }

                            $('.' + value.number + '.' + results.ship_class).each(
                                function() {
                                    $(this).attr('data-trip-no', '3');
                                    $(this).attr('data-seat-no', value.number);
                                });
                        });

                        var shipName = element.data('ship_name');

                        // var shipName = element.data('ship_name');
                        var ferryScheduleId = element.data('ferryschedule-id');
                        var classId = element.data('class_id');
                        var tripId = element.data('trip_id');
                        var vesselId = element.data('vessel_id');
                        var from = element.data('from');
                        var to = element.data('to');
                        var departureTime = element.data('departure_time');
                        var arrivalTime = element.data('arrival_time');
                        var classTitle = element.data('class-title');
                        var price = element.data('price');
                        var psf = element.data('psf');
                        var avlSeat = element.data('avl_seat');

                        var trip3Details = {
                            'ship_name': shipName,
                            'ferryschedule_id': ferryScheduleId,
                            'class_id': classId,
                            'trip_id': tripId,
                            'vessel_id': vesselId,
                            'from': from,
                            'to': to,
                            'departure_time': departureTime,
                            'arrival_time': arrivalTime,
                            'class_title': classTitle,
                            'price': price,
                            'psf': psf,
                            'avl_seat': avlSeat,
                        };

                        var trip3Detailsstr = JSON.stringify(trip3Details);
                        $("#trip3details").val(trip3Detailsstr);

                    } else if (shipName != 'Nautika') {
                        var newUrl = "{{ route('booking-ferry') }}";
                        window.location.href = newUrl;
                    }

                    // var newUrl = "{{ route('booking-ferry') }}";
                    // window.location.href = newUrl;
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });

        $(".tabBtn2").click(function() {
            $(".ferryBanner ").addClass("secHeight");
        })
        $(".tabBtn1").click(function() {
            $(".ferryBanner").removeClass("secHeight");
            $(".tabs2").children(".row").removeClass("hide");
        });

        $('#date').flatpickr({
            dateFormat: 'Y-m-d',
            minDate: "today"
        });
        $('#round_date').flatpickr({
            dateFormat: 'Y-m-d',
            minDate: "today"
        });

        $('#round1_date').flatpickr({
            dateFormat: 'Y-m-d',
            minDate: "today"
        });
        $('#round2_date').flatpickr({
            dateFormat: 'Y-m-d',
            minDate: "today"
        });

        $("#lds-spinner").addClass('d-none');
        $(document).on('click', "#search", function(e) {

            $("#lds-spinner").removeClass('d-none');
            var car_id = $(this).val();
        });

        $(document).on('click', ".delete", function(e) {
            var row = $(this).closest(".row");
            row.html("");
            row.removeClass("border-bottom");
        });

        $("#round-trip").on("click", function() {
            $("#trip_type").val('3');
        });

        $("#one-way").on("click", function() {
            $("#trip_type").val('1');
        });

        $(".trip-delete").on("click", function() {
            $tripVal = parseInt($("#trip_type").val()) - 1;
            $("#trip_type").val($tripVal);
        });

        @if (request('trip_type') > 1)
            $(".tabBtn1").removeClass('active');
            $(".tabBtn2").trigger("click")
        @endif

        // $(".seat").click(function() {
        $(document).on('click', ".seat", function() {
            element = $(this);

            var no_of_pax = parseInt($("#passenger").val(), 10);
            const curTripNo = element.data('trip-no');

            //console.log("curTripNo == " + curTripNo);

            $(this).toggleClass("selected");

            if (curTripNo == 1) {
                if ($(this).hasClass('selected')) {
                    var selectedSeat = parseInt($("#trip1seatcount").val(), 10);
                    selectedSeat += 1;
                    $("#trip1seatcount").val(selectedSeat);

                    var trip1seatcount = parseInt($("#trip1seatcount").val(), 10);
                    if (no_of_pax < trip1seatcount) {
                        alert('Maximum Seat Already Selected');
                        $(this).removeClass("selected");
                        trip1seatcount -= 1;
                        $("#trip1seatcount").val(trip1seatcount);

                        return false;
                    }
                    var element = $(this);
                    var seat_nos = [];

                    $(this).parents('.luxury-down').find('.seat.selected').each(function(index) {
                        var seat = $(this).data('seat-no');

                        if (!seat_nos.includes(seat)) {
                            seat_nos.push(seat);
                        }
                    });

                    // $.ajax({
                    //     headers: {
                    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    //     },
                    //     url : "{{ url('store_selected_seats') }}",
                    //     data : {
                    //             'seat_nos' : seat_nos,
                    //             'curTripNo': curTripNo,
                    //             },
                    //     type : 'POST',
                    //     dataType : 'json',
                    //     success : function(data){
                    //     }
                    // });

                    seatsSl.push(seat_nos);

                    var seatsString = JSON.stringify(seat_nos);
                    $("#trip1seatNo").val(seatsString);
                } else {
                    alert('not selected')
                    var selectedSeat = parseInt($("#trip1seatcount").val(), 10);
                    selectedSeat -= 1;
                    $("#trip1seatcount").val(selectedSeat);

                    var seats = $("#trip1seatNo").val();
                    var seat_nos = JSON.parse(seats);

                    const index = seat_nos.indexOf($(this).data('seat-no'));
                    if (index > -1) { // only splice seat_nos when item is found
                        seat_nos.splice(index, 1); // 2nd parameter means remove one item only
                    }

                    var seatsString = JSON.stringify(seat_nos);
                    $("#trip1seatNo").val(seatsString);
                }

            }

            if (curTripNo == 2) {
                if ($(this).hasClass('selected')) {
                    var selectedSeat = parseInt($("#trip2seatcount").val(), 10);
                    selectedSeat += 1;
                    $("#trip2seatcount").val(selectedSeat);

                    var trip2seatcount = parseInt($("#trip2seatcount").val(), 10);
                    if (no_of_pax < trip2seatcount) {
                        alert('Maximum Seat Already Selected');
                        $(this).removeClass("selected");
                        trip2seatcount -= 1;
                        $("#trip2seatcount").val(trip2seatcount);
                        return false;

                    }
                    var element = $(this);
                    var seat_nos = [];

                    $(this).parents('.luxury-down').find('.seat.selected').each(function(index) {
                        var seat = $(this).data('seat-no');
                        if (!seat_nos.includes(seat)) {
                            seat_nos.push(seat);
                        }
                    });
                    console.log('Selected seats:', seat_nos);

                    var seatsString = JSON.stringify(seat_nos);
                    $("#trip2seatNo").val(seatsString);

                    console.log("curTripNo == " + curTripNo + " || seatsString" + seatsString);

                    // $('#nautika-proceed').click(function() {});

                } else {
                    alert('not selected')
                    var selectedSeat = parseInt($("#trip2seatcount").val(), 10);
                    selectedSeat -= 1;
                    $("#trip2seatcount").val(selectedSeat);

                    var seats = $("#trip2seatNo").val();
                    var seat_nos = JSON.parse(seats);

                    const index = seat_nos.indexOf($(this).data('seat-no'));
                    if (index > -1) { // only splice seat_nos when item is found
                        seat_nos.splice(index, 1); // 2nd parameter means remove one item only
                    }

                    var seatsString = JSON.stringify(seat_nos);
                    $("#trip2seatNo").val(seatsString);
                    // console.log(seatsString);

                    // $("#trip1seatNo").val(seats);
                }

            }

            if (curTripNo == 3) {
                if ($(this).hasClass('selected')) {
                    var selectedSeat = parseInt($("#trip3seatcount").val(), 10);
                    selectedSeat += 1;
                    $("#trip3seatcount").val(selectedSeat);

                    var trip3seatcount = parseInt($("#trip3seatcount").val(), 10);

                    if (no_of_pax < trip3seatcount) {
                        alert('Maximum Seat Already Selected');
                        $(this).removeClass("selected");
                        trip3seatcount -= 1;
                        $("#trip3seatcount").val(trip3seatcount);
                        return false;
                    }
                    var element = $(this);
                    var seat_nos = [];

                    // $(this).parents('.luxury-down').find('.seat.selected').each(function(index) {
                    // console.log(element.parents('.luxury-down').find('.seat.selected'));

                    element.parents('.luxury-down').find('.seat.selected').each(function(index) {
                        var seat = $(this).data('seat-no');
                        if (!seat_nos.includes(seat)) {
                            seat_nos.push(seat);
                        }
                    });
                    seatsSl.push(seat_nos);
                    // console.log('Selected seats:', seat_nos);
                    var seatsString = JSON.stringify(seat_nos);
                    $("#trip3seatNo").val(seatsString);
                    // console.log("curTripNo == " + curTripNo + " || seat_nos" + seat_nos + " || seatsString" + seatsString);

                    // $('#nautika-proceed').click(function() {});

                } else {
                    alert('not selected')
                    var selectedSeat = parseInt($("#trip3seatcount").val(), 10);
                    selectedSeat -= 1;
                    $("#trip3seatcount").val(selectedSeat);

                    // console.log(selectedSeat);


                    var seats = $("#trip3seatNo").val();
                    var seat_nos = JSON.parse(seats);

                    const index = seat_nos.indexOf($(this).data('seat-no'));
                    if (index > -1) { // only splice seat_nos when item is found
                        seat_nos.splice(index, 1); // 2nd parameter means remove one item only
                    }

                    var seatsString = JSON.stringify(seat_nos);
                    $("#trip3seatNo").val(seatsString);
                    // console.log(seatsString);

                    // $("#trip1seatNo").val(seats);
                }

            }
            console.log(seats);

            // console.log($("#trip1seatNo").val());

        });

        $("#nautika_proceed").on('click', function() {
            var selectedTotalSeats = 0;
            let modalTripNo = '';
            $(this).parents('.modal-content').find('.luxury-down').find('.seat.selected').each(function(
                index) {
                selectedTotalSeats++;
                modalTripNo = $(this).data('trip-no');
            });

            // console.log(modalTripNo);
            // return false;


            const urlParams = new URLSearchParams(window.location.search);
            const trip_type = urlParams.get('trip_type');
            var no_of_pax = $("#passenger").val();

            if (selectedTotalSeats < no_of_pax) {
                alert("Please select seat first.");
            } else {
                // console.log("Final modalTripNo " + modalTripNo);

                var ajaxDataSet = {};

                if (modalTripNo == 1) {
                    var trip1DetailsStr = $("#trip1details").val();
                    var trip1Details = JSON.parse(trip1DetailsStr);

                    var trip1SeatNo = $("#trip1seatNo").val();


                    ajaxDataSet = {
                        trip: modalTripNo,
                        ship: trip1Details.ship_name,
                        scheduleId: trip1Details.ferryschedule_id,
                        shipClass: trip1Details.class_id,
                        tripSeatNo: trip1SeatNo,
                    }



                    $(document).find("#nav-contact-tab").removeClass('disabled').prop("disabled", false)
                        .trigger("click");
                } else if (modalTripNo == 2) {

                    var trip2DetailsStr = $("#trip2details").val();

                    var trip2Details = JSON.parse(trip2DetailsStr);

                    var trip2SeatNo = $("#trip2seatNo").val();


                    ajaxDataSet = {
                        trip: modalTripNo,
                        ship: trip2Details.ship_name,
                        scheduleId: trip2Details.ferryschedule_id,
                        shipClass: trip2Details.class_id,
                        tripSeatNo: trip2SeatNo,
                    }

                    $(document).find("#nav-buttonn-tab").removeClass('disabled').prop("disabled", false)
                        .trigger("click");
                }
                if (modalTripNo == 3) {
                    var trip3DetailsStr = $("#trip3details").val();

                    var trip3Details = JSON.parse(trip3DetailsStr);

                    var trip3SeatNo = $("#trip3seatNo").val();

                    // console.log(trip3SeatNo);
                    // return false;

                    ajaxDataSet = {
                        trip: modalTripNo,
                        ship: trip3Details.ship_name,
                        scheduleId: trip3Details.ferryschedule_id,
                        shipClass: trip3Details.class_id,
                        tripSeatNo: trip3SeatNo,
                    }
                }

                $.ajax({
                    url: '{{ url('booking-seat-data-store-session') }}',
                    method: 'POST',
                    data: ajaxDataSet,
                    success: function(response) {
                        console.log(response);

                        $('#exampleModal').modal('toggle');

                        if (trip_type == 1 && modalTripNo == 1) {
                            var newUrl = "{{ route('booking-ferry') }}";
                            console.log(newUrl);
                            window.location.href = newUrl;
                        }
                        if (trip_type == 2 && modalTripNo == 2) {
                            var newUrl = "{{ route('booking-ferry') }}";
                            console.log(newUrl);
                            window.location.href = newUrl;
                        }
                        if (trip_type == 3 && modalTripNo == 3) {
                            var newUrl = "{{ route('booking-ferry') }}";
                            console.log(newUrl);
                            window.location.href = newUrl;
                        }
                    }
                });

            }

            // $('#modal_id').modal('hide');
            // $(document).find("#nav-contact-tab").removeClass('disabled').trigger("click");
        })

    });
</script>
@endpush

    <script>
        $(document).ready(function() {
            // Determine the trip type from the request and apply initial settings
            var tripType = @json(request('trip_type'));

            if (tripType == 1) {
                $(".tabBtn1").addClass("active");
                $(".tabs1").css({
                    "opacity": "1",
                    "z-index": "999"
                });
            } else if (tripType > 1) {
                $(".tabBtn2").addClass("active");
                $(".tabs2").css({
                    "opacity": "1",
                    "z-index": "999"
                });
            }


            // Click event for delete buttons
            $(".delete").click(function() {
                $(this).closest(".row").addClass("hide");
            });

            // Click event for tabBtn1
            $(".tabBtn1").click(function() {
                $(".Search_Resultss").removeClass("marginSec2");
                $(".tabs2").children(".row").removeClass("hide");
            });


        });
    </script>

    <script>
        $(document).ready(function() {
            // Handle changes to the input value
            $('#passenger').on('input', function() {
                var minValue = 1;
                var currentValue = parseInt($(this).val(), 10);

                // Ensure the value is at least the minimum
                if (currentValue < minValue) {
                    $(this).val(minValue);
                }
            });
            // Optionally, also handle when the input loses focus
            $('#passenger').on('blur', function() {
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
            // Handle changes to the input value
            $('#passenger3').on('input', function() {
                var minValue = 1;
                var currentValue = parseInt($(this).val(), 10);

                // Ensure the value is at least the minimum
                if (currentValue < minValue) {
                    $(this).val(minValue);
                }
            });
            // Optionally, also handle when the input loses focus
            $('#passenger3').on('blur', function() {
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
            $('#passenger4').on('input', function() {
                var minValue = 1;
                var currentValue = parseInt($(this).val(), 10);

                // Ensure the value is at least the minimum
                if (currentValue < minValue) {
                    $(this).val(minValue);
                }
            });
            // Optionally, also handle when the input loses focus
            $('#passenger4').on('blur', function() {
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
        var selectedToLocation = "<?php echo htmlspecialchars(request('to_location')); ?>";

        $(document).ready(function() {
            // Define the locations mapping
            var locations = {
                1: ["2",
                    "3"
                ], // When "From" is Location A (1), available "To" options are Location B (2) and Location C (3)
                2: ["1",
                    "3"
                ], // When "From" is Location B (2), available "To" options are Location A (1) and Location C (3)
                3: ["1",
                    "2"
                ] // When "From" is Location C (3), available "To" options are Location A (1) and Location B (2)
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
                        var isSelected = (value === selectedToLocation) ? 'selected' : '';
                        $('#to_location').append('<option value="' + value + '" ' + isSelected + '>' +
                            text + '</option>');
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
        var selectedToLocation1 = "<?php echo htmlspecialchars(request('to_location')); ?>";

        $(document).ready(function() {
            // Define the locations mapping
            var locations = {
                1: ["2",
                    "3"
                ], // When "From" is Location A (1), available "To" options are Location B (2) and Location C (3)
                2: ["1",
                    "3"
                ], // When "From" is Location B (2), available "To" options are Location A (1) and Location C (3)
                3: ["1",
                    "2"
                ] // When "From" is Location C (3), available "To" options are Location A (1) and Location B (2)
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
                        var isSelected = (value === selectedToLocation1) ? 'selected' : '';
                        $('#to_location1').append('<option value="' + value + '" ' + isSelected + '>' +
                            text + '</option>');
                    }
                });
            }

            // Attach the change event to update options
            $('#form_location1').change(updateToLocationOptions);

            // Trigger the change event on page load to initialize "To" options
            updateToLocationOptions();
        });
    </script>
    <script>
        var selectedToLocation2 = "<?php echo htmlspecialchars(request('round1_to_location')); ?>";

        $(document).ready(function() {
            // Define the locations mapping
            var locations = {
                1: ["2", "3"], // From Location A (1) -> To Locations B (2) and C (3)
                2: ["3", "1"], // From Location B (2) -> To Locations A (1) and C (3)
                3: ["1", "2"]  // From Location C (3) -> To Locations A (1) and B (2)
            };

            function updateToLocationOptions() {
                var selectedValue = $('#form_location2').val(); // Get the selected value from "From" dropdown
                var options = locations[selectedValue] || []; // Get the available "To" options

                $('#to_location2').empty(); // Clear existing options in "To" dropdown

                // Populate "To" dropdown with valid options
                options.forEach(function(value) {
                    var isSelected = (value === selectedToLocation2) ? 'selected' : '';
                    var text = $('#form_location2 option[value="' + value + '"]').text(); // Get the text for the option
                    $('#to_location2').append('<option value="' + value + '" ' + isSelected + '>' + text + '</option>');
                });
            }

            // Attach the change event to update options
            $('#form_location2').change(updateToLocationOptions);

            // Trigger the change event on page load to initialize "To" options
            updateToLocationOptions();
        });
    </script>
    <script>
        var selectedToLocation3 = "<?php echo htmlspecialchars(request('round2_to_location')); ?>";

        $(document).ready(function() {
            // Define the locations mapping
            var locations = {
                1: ["2",
                    "3"
                ], // When "From" is Location A (1), available "To" options are Location B (2) and Location C (3)
                2: ["1",
                    "3"
                ], // When "From" is Location B (2), available "To" options are Location A (1) and Location C (3)
                3: ["1",
                    "2"
                ] // When "From" is Location C (3), available "To" options are Location A (1) and Location B (2)
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
                        var isSelected = (value === selectedToLocation3) ? 'selected' : '';
                        $('#to_location3').append('<option value="' + value + '" ' + isSelected + '>' +
                            text + '</option>');
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
        document.addEventListener('DOMContentLoaded', (event) => {
            const container = document.getElementById('result');
            const tabBtn1 = document.querySelector('.tabBtn1');
            const tabBtn2 = document.querySelector('.tabBtn2');

            if (tabBtn1 && tabBtn2 && container) {
                tabBtn1.addEventListener('click', () => {
                    container.classList.remove('marginSec2');
                    tabBtn1.classList.add('active');
                    tabBtn2.classList.remove('active');
                });

                tabBtn2.addEventListener('click', () => {
                    container.classList.add('marginSec2');
                    tabBtn1.classList.remove('active');
                    tabBtn2.classList.add('active');
                });
            }
        });
    </script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        function filterAndSortResults(filterId) {
            console.log(`Filtering and sorting results for ${filterId}`);

            // Get selected ferry and sort order
            const selectedFerry = document.querySelector(`#${filterId} input[name="ferry"]:checked`)?.value;
            const selectedSortOrder = document.querySelector(`#${filterId} input[name="sortOrder"]:checked`)?.value;

            const container = document.querySelector(`.searchResults[data-filter-id="${filterId}"]`);
            if (!container) {
                console.error(`Container for filter ID ${filterId} not found`);
                return;
            }

            const cards = Array.from(container.querySelectorAll('.ferryCard, .contactCard, .buttonCard'));
            console.log(`Number of cards found: ${cards.length}`);

            // Filter cards based on selected ferry
            const filteredCards = cards.filter(card => {
                const cardFerry = card.dataset.ferry || '';
                return !selectedFerry || cardFerry === selectedFerry;
            });

            console.log(`Number of filtered cards: ${filteredCards.length}`);

            // Sort filtered cards based on selected sort order
            if (selectedSortOrder === 'lowHigh' || selectedSortOrder === 'highLow') {
                filteredCards.sort((a, b) => {
                    const priceA = parseFloat(a.dataset.price) || 0;
                    const priceB = parseFloat(b.dataset.price) || 0;
                    return selectedSortOrder === 'lowHigh' ? priceA - priceB : priceB - priceA;
                });
            }

            // Hide all cards first
            cards.forEach(card => {
                card.style.display = 'none';
            });

            // Display sorted and filtered cards
            filteredCards.forEach(card => {
                card.style.display = 'flex'; // or 'block' based on your layout
            });

            // Re-append items in sorted order to ensure the correct display order
            filteredCards.forEach(card => {
                container.appendChild(card);
            });
        }

        function setupFilterListeners(filterId) {
            console.log(`Setting up listeners for ${filterId}`);

            document.querySelectorAll(`#${filterId} input[name="ferry"]`).forEach(input => {
                input.addEventListener('change', () => {
                    console.log(`Ferry filter changed for ${filterId}`);
                    filterAndSortResults(filterId);
                });
            });

            document.querySelectorAll(`#${filterId} input[name="sortOrder"]`).forEach(input => {
                input.addEventListener('change', () => {
                    console.log(`Sort order changed for ${filterId}`);
                    filterAndSortResults(filterId);
                });
            });
        }

        // Initialize listeners for all filter IDs
        ['nav-profile-filter', 'nav-contact-filter', 'nav-buttonn-filter'].forEach(setupFilterListeners);

        // Initial call to apply filters and sorting based on the default selections
        ['nav-profile-filter', 'nav-contact-filter', 'nav-buttonn-filter'].forEach(filterId => {
            filterAndSortResults(filterId);
        });
    });
</script>

    <script>
        $(document).ready(function() {
            // Function to handle tab change and show the corresponding filter
            function handleTabChange() {
                var activeTab = $('#nav-tab .nav-link.active').attr('id');

                // Hide all filter content first
                $('.filter-content').hide();

                // Show the filter content based on the active tab
                if (activeTab === 'nav-profile-tab') {
                    $('.nav-profile-filter').show();
                } else if (activeTab === 'nav-contact-tab') {
                    $('.nav-contact-filter').show();
                } else if (activeTab === 'nav-buttonn-tab') {
                    $('.nav-buttonn-filter').show();
                }
            }

            // Bind the tab change event
            $('#nav-tab button').on('shown.bs.tab', function(e) {
                handleTabChange();
            });

            // Trigger the default tab change to show the correct filter on page load
            handleTabChange();
        });
    </script>
<script>
document.getElementById('locationFerry4').addEventListener('input', function() {
    if (this.value > 4) {
        this.value = 4;
    }
});
document.getElementById('locationFerry9').addEventListener('input', function() {
    if (this.value > 4) {
        this.value = 4;
    }
});
document.getElementById('days_1').addEventListener('input', function() {
    if (this.value > 4) {
        this.value = 4;
    }
});
document.getElementById('days_7').addEventListener('input', function() {
    if (this.value > 4) {
        this.value = 4;
    }
});
</script>

    <script>
        window.onload = function() {
            // Replace 'section1' with the ID of the section you want to show
            var sectionToShow = document.getElementById('result');
        };
    </script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const date1Input = document.getElementById('locationFerry7');
        const date2Input = document.getElementById('date_2');
        const date3Input = document.getElementById('date_5');

        function updateDates() {
            const date1Value = date1Input.value;

            if (date1Value) {
                // Create a new Date object from the selected date
                const date1 = new Date(date1Value);
                
                // Add one day to the selected date
                date1.setDate(date1.getDate() + 1);
                
                // Format the new date to YYYY-MM-DD
                const year = date1.getFullYear();
                const month = String(date1.getMonth() + 1).padStart(2, '0'); // Months are 0-based
                const day = String(date1.getDate()).padStart(2, '0');
                const nextDateValue = `${year}-${month}-${day}`;
                
                // Set the value of the second date input
                date2Input.value = nextDateValue;

                // Add one more day to the second date
                const date2 = new Date(nextDateValue);
                date2.setDate(date2.getDate() + 1);
                
                // Format the new date to YYYY-MM-DD
                const nextYear = date2.getFullYear();
                const nextMonth = String(date2.getMonth() + 1).padStart(2, '0'); // Months are 0-based
                const nextDay = String(date2.getDate()).padStart(2, '0');
                const nextDate2Value = `${nextYear}-${nextMonth}-${nextDay}`;
                
                // Set the value of the third date input
                date3Input.value = nextDate2Value;
            } else {
                date2Input.value = '';
                date3Input.value = '';
            }
        }

        date1Input.addEventListener('change', updateDates);
    });
    </script>
    
<script>
document.addEventListener('DOMContentLoaded', function () {
    const infant1 = document.getElementById('locationFerry9');
    const infant2 = document.getElementById('days_1');
    const infant3 = document.getElementById('days_7');

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
document.addEventListener('DOMContentLoaded', function() {
    // Array of input field IDs
    var inputIds = [
        'locationFerry4',
        'locationFerry9',
        'days_1',
        'days_7'
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

@endsection

@section('filter')

    <!-- Primeum Modal -->
    @if (isset($apiScheduleData))
        @foreach ($apiScheduleData as $key => $shipSchedule)
            @if ($shipSchedule['ship_name'] == 'Makruzz')
                @foreach ($shipSchedule['ship_class'] as $ferryPrice)
                    @if ($ferryPrice->ship_class_title == 'Premium')
                        <div class="modal fade"
                            id="{{ 'Makruzz_Tab1_' . $ferryPrice->ship_class_title . '_' . $key + 1 }}" tabindex="-1"
                            aria-hidden="true">
                            <div class="modal-dialog  modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title fs-5" id="exampleModalLabel3">
                                            {{ $ferryPrice->ship_class_title }}</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="">
                                            <div class="d-flex flex-row mb-3 justify-content-around prime_modal">
                                                <div class="p-2"><i class="bi bi-tsunami fs-3"></i></div>
                                                <div class="p-2"><i class="bi bi-thermometer-snow fs-3"></i></div>
                                                <div class="p-2"><i class="bi bi-headphones fs-3"></i></div>
                                            </div>
                                            <p>The economical Premium Class is located on the lower deck and is the most
                                                spacious of all the classes, offering the best front and side panoramic
                                                views with an inboard kiosk at the centre serving delicious food.</p>
                                            <h2 class="mt-4 price">₹ {{ $ferryPrice->ship_class_price }}</h2>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#"
                                            id="{{ 'ferry_' . $ferryPrice->ship_class_title . '_' . $key + 1 }}"
                                            data-ferryschedule-id="{{ $ferryPrice->id }}"
                                            data-class_id="{{ $ferryPrice->ship_class_id }}"
                                            data-from="{{ $ferryPrice->source_name }}"
                                            data-to="{{ $ferryPrice->destination_name }}"
                                            data-departure_time="{{ $ferryPrice->departure_time }}"
                                            data-arrival_time="{{ $ferryPrice->arrival_time }}"
                                            data-class-title="{{ $ferryPrice->ship_class_title }}"
                                            data-price="{{ $ferryPrice->ship_class_price }}"
                                            data-psf="{{ $ferryPrice->psf }}"
                                            data-avl_seat="{{ $ferryPrice->seat }}"
                                            data-ship_name="{{ 'Makruzz' }}"
                                            class="{{ $ferryPrice->ship_class_title }} ferry-btn btn confirm text-decoration-none" data-bs-dismiss="modal">Confirm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif($ferryPrice->ship_class_title == 'Deluxe')
                        <div class="modal fade"
                            id="{{ 'Makruzz_Tab1_' . $ferryPrice->ship_class_title . '_' . $key + 1 }}" tabindex="-1"
                            aria-hidden="true">
                            <div class="modal-dialog  modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title fs-5" id="exampleModalLabel3">
                                            {{ $ferryPrice->ship_class_title }}</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="">
                                            <div class="d-flex flex-row mb-3 justify-content-around prime_modal">
                                                <div class="p-2"><i class="bi bi-tsunami fs-3"></i></div>
                                                <div class="p-2"><i class="bi bi-thermometer-snow fs-3"></i></div>
                                                <div class="p-2"><i class="bi bi-headphones fs-3"></i></div>
                                            </div>
                                            <p>Designed for those who cannot bear the cramped seats in airlines, the Deluxe
                                                Class is located on the upper deck with 64 comfortable, comfortable seat
                                                with extra leg space for the highest standards of comfort.</p>
                                            <h2 class="mt-4 price">₹ {{ $ferryPrice->ship_class_price }}</h2>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#"
                                            id="{{ 'ferry_' . $ferryPrice->ship_class_title . '_' . $key + 1 }}"
                                            data-ferryschedule-id="{{ $ferryPrice->id }}"
                                            data-class_id="{{ $ferryPrice->ship_class_id }}"
                                            data-from="{{ $ferryPrice->source_name }}"
                                            data-to="{{ $ferryPrice->destination_name }}"
                                            data-departure_time="{{ $ferryPrice->departure_time }}"
                                            data-arrival_time="{{ $ferryPrice->arrival_time }}"
                                            data-class-title="{{ $ferryPrice->ship_class_title }}"
                                            data-price="{{ $ferryPrice->ship_class_price }}"
                                            data-psf="{{ $ferryPrice->psf }}"
                                            data-avl_seat="{{ $ferryPrice->seat }}"
                                            data-ship_name="{{ 'Makruzz' }}"
                                            class="{{ $ferryPrice->ship_class_title }} ferry-btn btn confirm text-decoration-none" data-bs-dismiss="modal">Confirm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif($ferryPrice->ship_class_title == 'Royal')
                        <div class="modal fade"
                            id="{{ 'Makruzz_Tab1_' . $ferryPrice->ship_class_title . '_' . $key + 1 }}" tabindex="-1"
                            aria-hidden="true">
                            <div class="modal-dialog  modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title fs-5" id="exampleModalLabel3">
                                            {{ $ferryPrice->ship_class_title }}</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="">
                                            <div class="d-flex flex-row mb-3 justify-content-around prime_modal">
                                                <div class="p-2"><i class="bi bi-tsunami fs-3"></i></div>
                                                <div class="p-2"><i class="bi bi-thermometer-snow fs-3"></i></div>
                                                <div class="p-2"><i class="bi bi-headphones fs-3"></i></div>
                                            </div>
                                            <p>Made for those who like to enjoy good views in the luxury of their private
                                                cabins, the luxurious Royal Class comes with 8 super comfortable seats and
                                                value-added benefits such as priority check-in, charging point, etc. for
                                                utmost comfort.</p>
                                            <h2 class="mt-4 price">₹ {{ $ferryPrice->ship_class_price }}</h2>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#"
                                            id="{{ 'ferry_' . $ferryPrice->ship_class_title . '_' . $key + 1 }}"
                                            data-ferryschedule-id="{{ $ferryPrice->id }}"
                                            data-class_id="{{ $ferryPrice->ship_class_id }}"
                                            data-from="{{ $ferryPrice->source_name }}"
                                            data-to="{{ $ferryPrice->destination_name }}"
                                            data-departure_time="{{ $ferryPrice->departure_time }}"
                                            data-arrival_time="{{ $ferryPrice->arrival_time }}"
                                            data-class-title="{{ $ferryPrice->ship_class_title }}"
                                            data-price="{{ $ferryPrice->ship_class_price }}"
                                            data-psf="{{ $ferryPrice->psf }}"
                                            data-avl_seat="{{ $ferryPrice->seat }}"
                                            data-ship_name="{{ 'Makruzz' }}"
                                            class="{{ $ferryPrice->ship_class_title }} ferry-btn btn confirm text-decoration-none" data-bs-dismiss="modal">Confirm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        @endforeach
    @endif

    @if (isset($apiScheduleData2))
        @foreach ($apiScheduleData2 as $key => $shipSchedule)
            @if ($shipSchedule['ship_name'] == 'Makruzz')
                @foreach ($shipSchedule['ship_class'] as $ferryPrice)
                    @if ($ferryPrice->ship_class_title == 'Premium')
                        <div class="modal fade"
                            id="{{ 'Makruzz_Tab2_' . $ferryPrice->ship_class_title . '_' . $key + 1 }}" tabindex="-1"
                            aria-hidden="true">
                            <div class="modal-dialog  modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title fs-5" id="exampleModalLabel3">
                                            {{ $ferryPrice->ship_class_title }}</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="">
                                            <div class="d-flex flex-row mb-3 justify-content-around prime_modal">
                                                <div class="p-2"><i class="bi bi-tsunami fs-3"></i></div>
                                                <div class="p-2"><i class="bi bi-thermometer-snow fs-3"></i></div>
                                                <div class="p-2"><i class="bi bi-headphones fs-3"></i></div>
                                            </div>
                                            <p>The economical Premium Class is located on the lower deck and is the most
                                                spacious of all the classes, offering the best front and side panoramic
                                                views with an inboard kiosk at the centre serving delicious food.</p>
                                            <h2 class="mt-4 price">₹ {{ $ferryPrice->ship_class_price }}</h2>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#"
                                            id="{{ 'ferry_' . $ferryPrice->ship_class_title . '_' . $key + 1 }}"
                                            data-ferryschedule-id="{{ $ferryPrice->id }}"
                                            data-class_id="{{ $ferryPrice->ship_class_id }}"
                                            data-from="{{ $ferryPrice->source_name }}"
                                            data-to="{{ $ferryPrice->destination_name }}"
                                            data-departure_time="{{ $ferryPrice->departure_time }}"
                                            data-arrival_time="{{ $ferryPrice->arrival_time }}"
                                            data-class-title="{{ $ferryPrice->ship_class_title }}"
                                            data-price="{{ $ferryPrice->ship_class_price }}"
                                            data-psf="{{ $ferryPrice->psf }}"
                                            data-avl_seat="{{ $ferryPrice->seat }}"
                                            data-ship_name="{{ 'Makruzz' }}"
                                            class="{{ $ferryPrice->ship_class_title }} ferry-btn2 btn confirm text-decoration-none" data-bs-dismiss="modal">Confirm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif($ferryPrice->ship_class_title == 'Deluxe')
                        <div class="modal fade"
                            id="{{ 'Makruzz_Tab2_' . $ferryPrice->ship_class_title . '_' . $key + 1 }}" tabindex="-1"
                            aria-hidden="true">
                            <div class="modal-dialog  modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title fs-5" id="exampleModalLabel3">
                                            {{ $ferryPrice->ship_class_title }}</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="">
                                            <div class="d-flex flex-row mb-3 justify-content-around prime_modal">
                                                <div class="p-2"><i class="bi bi-tsunami fs-3"></i></div>
                                                <div class="p-2"><i class="bi bi-thermometer-snow fs-3"></i></div>
                                                <div class="p-2"><i class="bi bi-headphones fs-3"></i></div>
                                            </div>
                                            <p>Designed for those who cannot bear the cramped seats in airlines, the Deluxe
                                                Class is located on the upper deck with 64 comfortable, comfortable seat
                                                with extra leg space for the highest standards of comfort.</p>
                                            <h2 class="mt-4 price">₹ {{ $ferryPrice->ship_class_price }}</h2>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#"
                                            id="{{ 'ferry_' . $ferryPrice->ship_class_title . '_' . $key + 1 }}"
                                            data-ferryschedule-id="{{ $ferryPrice->id }}"
                                            data-class_id="{{ $ferryPrice->ship_class_id }}"
                                            data-from="{{ $ferryPrice->source_name }}"
                                            data-to="{{ $ferryPrice->destination_name }}"
                                            data-departure_time="{{ $ferryPrice->departure_time }}"
                                            data-arrival_time="{{ $ferryPrice->arrival_time }}"
                                            data-class-title="{{ $ferryPrice->ship_class_title }}"
                                            data-price="{{ $ferryPrice->ship_class_price }}"
                                            data-psf="{{ $ferryPrice->psf }}"
                                            data-avl_seat="{{ $ferryPrice->seat }}"
                                            data-ship_name="{{ 'Makruzz' }}"
                                            class="{{ $ferryPrice->ship_class_title }} ferry-btn2 btn confirm text-decoration-none" data-bs-dismiss="modal">Confirm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif($ferryPrice->ship_class_title == 'Royal')
                        <div class="modal fade"
                            id="{{ 'Makruzz_Tab2_' . $ferryPrice->ship_class_title . '_' . $key + 1 }}" tabindex="-1"
                            aria-hidden="true">
                            <div class="modal-dialog  modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title fs-5" id="exampleModalLabel3">
                                            {{ $ferryPrice->ship_class_title }}</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="">
                                            <div class="d-flex flex-row mb-3 justify-content-around prime_modal">
                                                <div class="p-2"><i class="bi bi-tsunami fs-3"></i></div>
                                                <div class="p-2"><i class="bi bi-thermometer-snow fs-3"></i></div>
                                                <div class="p-2"><i class="bi bi-headphones fs-3"></i></div>
                                            </div>
                                            <p>Made for those who like to enjoy good views in the luxury of their private
                                                cabins, the luxurious Royal Class comes with 8 super comfortable seats and
                                                value-added benefits such as priority check-in, charging point, etc. for
                                                utmost comfort.</p>
                                            <h2 class="mt-4 price">₹ {{ $ferryPrice->ship_class_price }}</h2>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#"
                                            id="{{ 'ferry_' . $ferryPrice->ship_class_title . '_' . $key + 1 }}"
                                            data-ferryschedule-id="{{ $ferryPrice->id }}"
                                            data-class_id="{{ $ferryPrice->ship_class_id }}"
                                            data-from="{{ $ferryPrice->source_name }}"
                                            data-to="{{ $ferryPrice->destination_name }}"
                                            data-departure_time="{{ $ferryPrice->departure_time }}"
                                            data-arrival_time="{{ $ferryPrice->arrival_time }}"
                                            data-class-title="{{ $ferryPrice->ship_class_title }}"
                                            data-price="{{ $ferryPrice->ship_class_price }}"
                                            data-psf="{{ $ferryPrice->psf }}"
                                            data-avl_seat="{{ $ferryPrice->seat }}"
                                            data-ship_name="{{ 'Makruzz' }}"
                                            class="{{ $ferryPrice->ship_class_title }} ferry-btn2 btn confirm text-decoration-none" data-bs-dismiss="modal">Confirm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        @endforeach
    @endif

    @if (isset($apiScheduleData3))
        @foreach ($apiScheduleData3 as $key => $shipSchedule)
            @if ($shipSchedule['ship_name'] == 'Makruzz')
                @foreach ($shipSchedule['ship_class'] as $ferryPrice)
                    @if ($ferryPrice->ship_class_title == 'Premium')
                        <div class="modal fade"
                            id="{{ 'Makruzz_Tab3_' . $ferryPrice->ship_class_title . '_' . $key + 1 }}" tabindex="-1"
                            aria-hidden="true">
                            <div class="modal-dialog  modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title fs-5" id="exampleModalLabel3">
                                            {{ $ferryPrice->ship_class_title }}</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="">
                                            <div class="d-flex flex-row mb-3 justify-content-around prime_modal">
                                                <div class="p-2"><i class="bi bi-tsunami fs-3"></i></div>
                                                <div class="p-2"><i class="bi bi-thermometer-snow fs-3"></i></div>
                                                <div class="p-2"><i class="bi bi-headphones fs-3"></i></div>
                                            </div>
                                            <p>The economical Premium Class is located on the lower deck and is the most
                                                spacious of all the classes, offering the best front and side panoramic
                                                views with an inboard kiosk at the centre serving delicious food.</p>
                                            <h2 class="mt-4 price">₹ {{ $ferryPrice->ship_class_price }}</h2>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#"
                                            id="{{ 'ferry_' . $ferryPrice->ship_class_title . '_' . $key + 1 }}"
                                            data-ferryschedule-id="{{ $ferryPrice->id }}"
                                            data-class_id="{{ $ferryPrice->ship_class_id }}"
                                            data-from="{{ $ferryPrice->source_name }}"
                                            data-to="{{ $ferryPrice->destination_name }}"
                                            data-departure_time="{{ $ferryPrice->departure_time }}"
                                            data-arrival_time="{{ $ferryPrice->arrival_time }}"
                                            data-class-title="{{ $ferryPrice->ship_class_title }}"
                                            data-price="{{ $ferryPrice->ship_class_price }}"
                                            data-psf="{{ $ferryPrice->psf }}"
                                            data-avl_seat="{{ $ferryPrice->seat }}"
                                            data-ship_name="{{ 'Makruzz' }}"
                                            class="{{ $ferryPrice->ship_class_title }} ferry-btn3 btn confirm text-decoration-none" data-bs-dismiss="modal">Confirm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif($ferryPrice->ship_class_title == 'Deluxe')
                        <div class="modal fade"
                            id="{{ 'Makruzz_Tab3_' . $ferryPrice->ship_class_title . '_' . $key + 1 }}" tabindex="-1"
                            aria-hidden="true">
                            <div class="modal-dialog  modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title fs-5" id="exampleModalLabel3">
                                            {{ $ferryPrice->ship_class_title }}</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="">
                                            <div class="d-flex flex-row mb-3 justify-content-around prime_modal">
                                                <div class="p-2"><i class="bi bi-tsunami fs-3"></i></div>
                                                <div class="p-2"><i class="bi bi-thermometer-snow fs-3"></i></div>
                                                <div class="p-2"><i class="bi bi-headphones fs-3"></i></div>
                                            </div>
                                            <p>Designed for those who cannot bear the cramped seats in airlines, the Deluxe
                                                Class is located on the upper deck with 64 comfortable, comfortable seat
                                                with extra leg space for the highest standards of comfort.</p>
                                            <h2 class="mt-4 price">₹ {{ $ferryPrice->ship_class_price }}</h2>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#"
                                            id="{{ 'ferry_' . $ferryPrice->ship_class_title . '_' . $key + 1 }}"
                                            data-ferryschedule-id="{{ $ferryPrice->id }}"
                                            data-class_id="{{ $ferryPrice->ship_class_id }}"
                                            data-from="{{ $ferryPrice->source_name }}"
                                            data-to="{{ $ferryPrice->destination_name }}"
                                            data-departure_time="{{ $ferryPrice->departure_time }}"
                                            data-arrival_time="{{ $ferryPrice->arrival_time }}"
                                            data-class-title="{{ $ferryPrice->ship_class_title }}"
                                            data-price="{{ $ferryPrice->ship_class_price }}"
                                            data-psf="{{ $ferryPrice->psf }}"
                                            data-avl_seat="{{ $ferryPrice->seat }}"
                                            data-ship_name="{{ 'Makruzz' }}"
                                            class="{{ $ferryPrice->ship_class_title }} ferry-btn3 btn confirm text-decoration-none" data-bs-dismiss="modal">Confirm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif($ferryPrice->ship_class_title == 'Royal')
                        <div class="modal fade"
                            id="{{ 'Makruzz_Tab3_' . $ferryPrice->ship_class_title . '_' . $key + 1 }}" tabindex="-1"
                            aria-hidden="true">
                            <div class="modal-dialog  modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title fs-5" id="exampleModalLabel3">
                                            {{ $ferryPrice->ship_class_title }}</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="">
                                            <div class="d-flex flex-row mb-3 justify-content-around prime_modal">
                                                <div class="p-2"><i class="bi bi-tsunami fs-3"></i></div>
                                                <div class="p-2"><i class="bi bi-thermometer-snow fs-3"></i></div>
                                                <div class="p-2"><i class="bi bi-headphones fs-3"></i></div>
                                            </div>
                                            <p>Made for those who like to enjoy good views in the luxury of their private
                                                cabins, the luxurious Royal Class comes with 8 super comfortable seats and
                                                value-added benefits such as priority check-in, charging point, etc. for
                                                utmost comfort.</p>
                                            <h2 class="mt-4 price">₹ {{ $ferryPrice->ship_class_price }}</h2>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#"
                                            id="{{ 'ferry_' . $ferryPrice->ship_class_title . '_' . $key + 1 }}"
                                            data-ferryschedule-id="{{ $ferryPrice->id }}"
                                            data-class_id="{{ $ferryPrice->ship_class_id }}"
                                            data-from="{{ $ferryPrice->source_name }}"
                                            data-to="{{ $ferryPrice->destination_name }}"
                                            data-departure_time="{{ $ferryPrice->departure_time }}"
                                            data-arrival_time="{{ $ferryPrice->arrival_time }}"
                                            data-class-title="{{ $ferryPrice->ship_class_title }}"
                                            data-price="{{ $ferryPrice->ship_class_price }}"
                                            data-psf="{{ $ferryPrice->psf }}"
                                            data-avl_seat="{{ $ferryPrice->seat }}"
                                            data-ship_name="{{ 'Makruzz' }}"
                                            class="{{ $ferryPrice->ship_class_title }} ferry-btn3 btn confirm text-decoration-none" data-bs-dismiss="modal">Confirm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        @endforeach
    @endif

    <!--Filter Modal-->
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="filter">
                        <div class="filt">
                            <h3 class="border-bottom">Filters</h3>
                        </div>

                        {{-- First Button Filter --}}
                        <div id="nav-profile-filter" class="filter-content nav-profile-filter" style="display: none;">
                            <div>
                                <h3 class="ferryy mt-3">Ferry</h3>
                                <div class="ferry_nme">
                                    <input type="radio" for="makruzz" id="Makruzz1" name="ferry"
                                        value="Makruzz">
                                    <label for="Makruzz1">Makruzz</label>
                                </div>
                                <div class="ferry_nme mt-3">
                                    <input type="radio" id="Nautika1" name="ferry" value="Nautika">
                                    <label for="Nautika1">Nautika</label>
                                </div>
                            </div>
                            <div class="mt-4 shrt_by">
                                <div>
                                    <h3>Sort by</h3>
                                </div>
                                <div>
                                    <input type="radio" id="lowHigh1" name="sortOrder" value="lowHigh">
                                    <label for="lowHigh1">Low to High</label>
                                </div>
                                <div class="mt-2">
                                    <input type="radio" id="highLow1" name="sortOrder" value="highLow">
                                    <label for="highLow1">High to Low</label>
                                </div>
                            </div>
                        </div>

                        {{-- Second Button Filter --}}
                        <div id="nav-contact-filter" class="filter-content nav-contact-filter" style="display: none;">
                            <div>
                                <h3 class="ferryy mt-3">Ferry</h3>
                                <div class="ferry_nme">
                                    <input type="radio" for="makruzz" id="Makruzz2" name="ferry"
                                        value="Makruzz">
                                    <label for="Makruzz2">Makruzz</label>
                                </div>
                                <div class="ferry_nme mt-3">
                                    <input type="radio" id="Nautika2" name="ferry" value="Nautika">
                                    <label for="Nautika2">Nautika</label>
                                </div>
                            </div>
                            <div class="mt-4 shrt_by">
                                <div>
                                    <h3>Sort by</h3>
                                </div>
                                <div>
                                    <input type="radio" id="lowHigh2" name="sortOrder" value="lowHigh">
                                    <label for="lowHigh2">Low to High</label>
                                </div>
                                <div class="mt-2">
                                    <input type="radio" id="highLow2" name="sortOrder" value="highLow">
                                    <label for="highLow2">High to Low</label>
                                </div>
                            </div>
                        </div>

                        {{-- Third Button Filter --}}
                        <div id="nav-buttonn-filter" class="filter-content nav-buttonn-filter" style="display: none;">
                            <div>
                                <h3 class="ferryy mt-3">Ferry</h3>
                                <div class="ferry_nme">
                                    <input type="radio" for="makruzz" id="Makruzz3" name="ferry"
                                        value="Makruzz">
                                    <label for="Makruzz3">Makruzz</label>
                                </div>
                                <div class="ferry_nme mt-3">
                                    <input type="radio" id="Nautika3" name="ferry" value="Nautika">
                                    <label for="Nautika3">Nautika</label>
                                </div>
                            </div>
                            <div class="mt-4 shrt_by">
                                <div>
                                    <h3>Sort by</h3>
                                </div>
                                <div>
                                    <input type="radio" id="lowHigh3" name="sortOrder" value="lowHigh">
                                    <label for="lowHigh3">Low to High</label>
                                </div>
                                <div class="mt-2">
                                    <input type="radio" id="highLow3" name="sortOrder" value="highLow">
                                    <label for="highLow3">High to Low</label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn apply" data-bs-dismiss="modal">Apply</button>
                </div>
            </div>
        </div>
    </div>

@endsection
