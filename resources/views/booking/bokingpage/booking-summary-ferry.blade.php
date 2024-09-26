@extends('layouts.layout')

@section('content')
    <section class="mt-5 pt-3">
        <div class="row secHead mb-5 w-100 mx-0">
            <div class="col-12 text-center booking_head">
                <h2><span>Booking</span> Details</h2>
            </div>
        </div>

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
        <div class="container">  
            <form action="{{ url('/booking-form-ferry') }}" method="POST" id="booking_details_id">
            @csrf       
            <div class="row">
                <div class="col-12 col-lg-8">
                    @for ($i = 1; $i <= $booking_data['no_of_passenger']; $i++)
                    <input type="hidden" name="type" value="ferry">
                    <div class="travel-insurance-main-bg">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <div class="add-insurance-heading">Passenger {{ $i }} (Adult)</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 booking-journey-prevnext-btn">
                                <label class="mb-2">Enter Name</label>
                            </div>
                            <div class="col-md-4 form-group">
                                <div class="order-input">
                                    <select id="p_title_{{ $i }}" class="form-control passenger_title" name="passenger_title[{{ $i }}]">
                                        <option value="Mr">MR</option>
                                        <option value="Mrs">MRS</option>
                                        <option value="Miss">MISS</option>
                                        <option value="Master">MASTER</option>
                                        <option value="Dr">DR</option>
                                    </select>
                                    <span class="text-danger"></span>
                                    @error('passenger_title.' . $i)
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-8 form-group">
                                <div class="order-input">
                                    <input type="text" name="passenger_name[{{ $i }}]" class="form-control" id="passenger_name_{{ $i }}" placeholder="Full Name">
                                    <span class="text-danger"></span>
                                    @error('passenger_name.' . $i)
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4 form-group">
                                <div class="booking-journey-prevnext-btn">
                                    <label class="mb-2">Age</label>
                                </div>
                                <div class="order-input">
                                    <input type="number" name="passenger_dob[{{ $i }}]" class="age_picker form-control" placeholder="Age" id="passenger_dob_{{ $i }}">
                                    <span class="text-danger"></span>
                                    @error('passenger_dob.' . $i)
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 form-group">
                                <div class="booking-journey-prevnext-btn">
                                    <label for="p_sex_{{ $i }}" class="mb-2">Gender</label>
                                </div>
                                <div class="order-input">
                                    <select id="p_sex_{{ $i }}" class="form-control" name="passenger_gender[{{ $i }}]">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    <span class="text-danger"></span>
                                    @error('passenger_gender.' . $i)
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 form-group">
                                <div class="booking-journey-prevnext-btn">
                                    <label class="mb-2">Resident</label>
                                </div>
                                <div class="order-input">
                                    <select id="residental" class="form-control" name="passenger_nationality[{{ $i }}]">
                                        <option value="indian">INDIAN</option>
                                        <option value="foreigner">FOREIGNER</option>
                                    </select>
                                    <span class="text-danger"></span>
                                    @error('passenger_nationality.' . $i)
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>  
                        <div class="row mt-2" id="foreign_fields1">
                            <div class="col-md-4 form-group" id="country_name" style="display: none;">
                                <div class="booking-journey-prevnext-btn">
                                    <label class="mb-2">Country Name</label>
                                </div>
                                <div class="order-input">
                                    <input type="text" name="country_name[{{ $i }}]" class="form-control" id="country_name" placeholder="Country Name">
                                    <span class="text-danger"></span>
                                    @error('country_name.' . $i)
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 form-group" id="passport_id" style="display: none;">
                                <div class="booking-journey-prevnext-btn">
                                    <label class="mb-2">Passport Id</label>
                                </div>
                                <div class="order-input">
                                    <input type="text" name="passport_id[{{ $i }}]" class="form-control" id="passport_id" placeholder="Passport Id">
                                    <span class="text-danger"></span>
                                    @error('passport_id.' . $i)
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 form-group" id="expiry_date" style="display: none;">
                                <div class="booking-journey-prevnext-btn">
                                    <label class="mb-2">Passport Expiry Date</label>
                                </div>
                                <div class="order-input">
                                    <input type="text" name="expiry_date[{{ $i }}]" class="date_picker_foreigner form-control" placeholder="Passport Expiry Date" id="p_expiry_date" readonly>
                                    <span class="text-danger"></span>
                                    @error('expiry_date.' . $i)
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    @endfor
                    @for ($j = 1; $j <= $booking_data['no_of_infant']; $j++) 
                    <div class="travel-insurance-main-bg">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <div class="add-insurance-heading">Infants {{ $j }}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 booking-journey-prevnext-btn">
                                <label class="mb-2">Enter Name</label>
                            </div>
                            <div class="col-md-4 form-group">
                                <div class="order-input">
                                    <select id="p_title" class="form-control passenger_title " name="passenger_title[{{ $i }}]">
                                        <option value="INFANT">INFANT (Up to 1year)</option>
                                    </select>
                                    <span class="text-danger"></span>
                                    @error('passenger_title.' . $i)
                                      <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-8 form-group">
                                <div class="order-input">
                                    <input type="text" name="passenger_name[{{ $i }}]" class="form-control" id="passenger_name_{{ $i }}" placeholder="Infant Full Name">
                                       <span class="text-danger"></span>
                                    @error('passenger_name.' . $i)
                                       <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-4 form-group">
                                <div class="booking-journey-prevnext-btn">
                                    <label class="mb-2">Age</label>
                                </div>
                                <div class="order-input">
                                    <input type="text" name="passenger_dob[{{ $i }}]" class="age_picker_infants form-control" value="1" id="passenger_dob_{{ $i }}" placeholder="Age" readonly>
                                      <span class="text-danger"></span>
                                    @error('passenger_dob.' . $i)
                                       <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>                            
                            <div class="col-md-4 form-group">
                                <div class=" booking-journey-prevnext-btn ">
                                    <label for="p_sex1" class="mb-2">Gender</label>
                                </div>
                                <div class="order-input">
                                    <select id="p_sex1" class="form-control" name="passenger_gender[{{ $i }}]">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                    <span class="text-danger"></span>
                                    @error('passenger_gender.' . $i)
                                       <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 form-group">
                                <div class="booking-journey-prevnext-btn">
                                    <label class="mb-2">Resident</label>
                                </div>
                                <div class="order-input">
                                    <select id="residental" class="form-control" name="passenger_nationality[{{ $i }}]">
                                        <option value="indian">INDIAN</option>
                                        <option value="foreigner">FOREIGNER</option>
                                    </select>
                                    <span class="text-danger"></span>
                                    @error('passenger_nationality.' . $i)
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row" id="foreign_fields1">
                            <div class="col-md-4 form-group" id="country_name" style="display: none;">
                                <div class="booking-journey-prevnext-btn">
                                    <label class="mb-2">Country Name</label>
                                </div>
                                <div class="order-input">
                                    <input type="text" name="country_name[{{ $i }}]" class="form-control" id="country_name" placeholder="Country Name">
                                    <span class="text-danger"></span>
                                    @error('country_name.' . $i)
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <label class="error p1_age"></label>
                                </div>
                            </div>
                            <div class="col-md-4 form-group" id="passport_id" style="display: none;">
                                <div class="booking-journey-prevnext-btn">
                                    <label class="mb-2">Passport Id</label>
                                </div>
                                <div class="order-input">
                                    <input type="text" name="passport_id[{{ $i }}]" class="form-control" id="passport_id" placeholder="Passport Id">
                                    <span class="text-danger"></span>
                                    @error('passport_id.' . $i)
                                      <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <label class="error p1_age"></label>
                                </div>
                            </div>
                            <div class="col-md-4 form-group" id="expiry_date"  style="display: none;">
                                <div class="booking-journey-prevnext-btn">
                                    <label for="dateb" class="mb-2">Passport Expiry Date</label>
                                </div>
                                <div class="order-input">
                                    <input type="text" name="expiry_date[{{ $i }}]" class="date_picker_foreigner form-control" id="i_expiry_date" placeholder="Passport Expiry Date">
                                    <span class="text-danger"></span>
                                    @error('expiry_date.' . $i)
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <label class="error p1_age"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                    $i++;
                    @endphp
                    @endfor
                    <div class="">
                        <div class="mt-4">
                            <div class="travel-insurance-main-bg">
                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <div class="add-insurance-heading ">Contact person</div>
                                    </div>
                                    <div class="booking-journey-prevnext-btn row mb-2">
                                        <p class="col-12 mb-2"> <span class="text-danger">*</span>Booking details will be shared to this ID</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 form-group">
                                        <div class="order-input">
                                            <input type="text" name="c_name" class="form-control" id="c_name" placeholder="Name">
                                            <span class="text-danger"></span>
                                            @error('c_name')
                                               <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <label class="error c_name"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <div class="order-input">
                                            <input type="email" name="c_email" class="form-control" id="c_email" placeholder="Email address" style="text-transform: none;" oninput="this.value = this.value.toLowerCase();">
                                            <span class="text-danger"></span>
                                            @error('c_email')
                                               <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <label class="error c_email"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <div class="order-input">
                                            <input type="text" name="c_mobile" class="form-control" id="c_mobile" placeholder="Mobile No">
                                            <span class="text-danger"></span>
                                            @error('c_mobile')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <label class="error c_mobile"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 form-group">
                                        <div class="order-input">
                                            <input type="text" name="p_contact" class="form-control" id="p_contact" placeholder="Alternate Contact numbers" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);">
                                            <span class="text-danger"></span>
                                            @error('p_contact')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <label class="error p_contact"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="text-center btn_back btn w-100">Proceed to Payment</button>
                </div>

                
                <div class="col-4">
                    <div class="position-sticky top-0 bx_shw">
                        <div class="booking-summary-main-bg" id="payment">
                            <div class="row py-2 p-0 m-0 w-100 booking_summy">
                                <div class="col-md-12">
                                    <div class="booking-summary-heading">BOOKING SUMMARY</div>
                                </div>
                            </div>
                            <div class="bookingSummary">
                                <div class="row w-100 p-0 m-0 bg-transpratent">
                                    <div class="px-2 col-12 tripDirection">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p class=" m-0 ">Onwards : <span class="departing-txt-date d-inline-block"><span class="departing-txt-date d-inline-block">{{ date('d-m-Y', strtotime($booking_data['date'])) }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="m-0"> {{ $trip1['ship_name'] }}</p> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <div class="departing-box-main">
                                            <div class="departing-txt">
                                                <span class="departing-txt-date"></span>
                                            </div>
                                            <div class="row w-100 p-0 m-0 departing-destination">
                                                <div class="col-sm-6 destination-time px-0">{{ $booking_data['form_location'] == 1 ? 'Port Blair' : ($booking_data['form_location'] == 2 ? 'Havelock (Swaraj Dweep)' : 'Neil (Shaheed Dweep)'  ) }}
                                                </div>
                                                <div class="col-sm-6 destination-time px-0">{{ $booking_data['to_location'] == 1 ? 'Port Blair' : ($booking_data['to_location'] == 2 ? 'Havelock (Swaraj Dweep)' : 'Neil (Shaheed Dweep)'  ) }}
                                                </div>
                                            </div>
                                            <div class="row w-100 p-0 m-0 mt-2">
                                                <div class="departing-txt m-0 col-6 p-0">
                                                    <p class="departing-txt-date m-0">Total Duration</p>
                                                </div>
                                                @php
                                                    $dTime = $booking_data['date'] . ' ' . $trip1['departure_time'];
                                                    $aTime = $booking_data['date'] . ' ' . $trip1['arrival_time'];
            
                                                    $departureTime = Carbon\Carbon::parse($dTime);
                                                    $arrivalTime = Carbon\Carbon::parse($aTime);
                                                    $totalDuration = $arrivalTime->diff($departureTime);
                                                    $totalHours = $totalDuration->h + $totalDuration->days * 24;
                                                @endphp
                                                <div class="col-6 p-0 departing-txt">
                                                    <p class="departing-txt-date d-inline-block m-0"> {{ $totalHours }} Hr {{ $totalDuration->i }} m Non-stop</p>
                                                </div>
                                            </div>
                                            <div class="row w-100 p-0 m-0 mt-2">
                                                <div class="departing-txt m-0 col-6 p-0">
                                                    <p class="departing-txt-date m-0">Fare Type</p>
                                                </div>
                                                <div class="departing-txt m-0 col-6 p-0">
                                                    <p class="departing-txt-date m-0">
                                                        @if($trip1['class_title']=='bClass')
                                                            {{'Royal'}}
                                                        @elseif ($trip1['class_title']=='pClass')
                                                            {{'Luxury'}}
                                                        @else
                                                            {{ $trip1['class_title'] }}
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row w-100 p-0 m-0 mt-2">
                                                <div class="departing-txt m-0 col-6 p-0">
                                                    <p class="departing-txt-date m-0">No of Passenger</p>
                                                </div>
                                                <div class="col-6 p-0 departing-txt">
                                                    <p class="departing-txt-date d-inline-block m-0">{{ $booking_data['no_of_passenger'] }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row w-100 p-0 m-0 mt-2">
                                                <div class="departing-txt m-0 col-6 p-0">
                                                    <p class="departing-txt-date m-0">Per Passenger Price</p>
                                                </div>
                                                <div class="col-6 p-0 departing-txt">
                                                    <p class="departing-txt-date d-inline-block m-0">INR 
                                                        <?php $price = $trip1['fare']; ?>
                                                        <span>{{ number_format($price, 2) }}</span>
                                                    </p>
                                                </div>
                                            </div>
                                            @if ($booking_data['schedule'][1]['ship'] == 'Nautika')
                                            <div class="row w-100 p-0 m-0 mt-2 ">
                                                <div class="departing-txt m-0 col-6 p-0">
                                                    <p class="departing-txt-date m-0">No Of Infant</p>
                                                </div>
                                                <div class="col-6 p-0 departing-txt">
                                                    <p class="departing-txt-date d-inline-block m-0">
                                                        <?php $infant = $booking_data['no_of_infant'];  ?>
                                                        <?php $infant_price = ($trip1['infantFare'] + $trip1['psf']) * $infant; ?>
                                                        <span>{{ $infant }}</span>
                                                    </p>
                                                </div>
                                            </div>
                                            @endif
                                            <div class="row w-100 p-0 m-0 mt-2">
                                                <div class="departing-txt m-0 col-6 p-0">
                                                    <p class="departing-txt-date m-0">PSF {{'(Per Pax/Infant)'}}</p>
                                                </div>
                                                <div class="col-6 p-0 departing-txt">
                                                    <p class="departing-txt-date d-inline-block m-0">INR <span>{{ $trip1['psf'] }}</span>
                                                    </p>
                                                </div>
                                            </div>
                                            {{-- <?php //$discount=0; ?>
                                            <?php// $trip2_discount=0; ?>
                                            <?php //$trip3_discount=0; ?>
                                            @if (($trip1['ship_name'] == 'Nautika') || ($trip1['ship_name'] == 'Makruzz'))
                                                <div class="row w-100 p-0 m-0 mt-2">
                                                    <div class="departing-txt m-0 col-6 p-0">
                                                        <p class="departing-txt-date m-0">Total Discount</p>
                                                    </div>
                                                    <div class="col-6 p-0 departing-txt">
                                                        <p class="departing-txt-date d-inline-block m-0">INR
                                                            <?php //$no_of_pass = $booking_data['no_of_passenger']; ?>
                                                            <?php //$discount= $no_of_pass * 100; ?>
                                                            <span>{{$discount }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            @endif --}}
                                            {{-- if check for single booking total price (for nautike only add rs 100 per infant) --}}
                                            @php
        
                                            if ($trip1['ship_name'] == 'Nautika') {
                                                $total_single_price = (($price + $trip1['psf']) * $booking_data['no_of_passenger'] + $infant_price);
                                            } else {
                                                $total_single_price = (($price + $trip1['psf']) * $booking_data['no_of_passenger']);
                                            }
          
                                            $total_trip2_price = 0;
                                            $trip_infant_price=0;
                                            @endphp
                                        </div>
                                    </div>
                                </div>

                                @if (isset($trip2))                               
                                    <div class="row w-100 p-0 m-0 bg-transpratent">
                                        <div class="px-2 col-12 tripDirection">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p class=" m-0 ">Trip 2 : <span class="departing-txt-date d-inline-block"><span class="departing-txt-date d-inline-block">{{ date('d-m-Y', strtotime($booking_data['round1_date'])) }}</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="mb-0"> {{ $trip2['ship_name'] }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <div class="departing-box-main">
                                                <div class="departing-txt">
                                                    <span class="departing-txt-date"></span>
                                                </div>
                                                <div class="row w-100 p-0 m-0 departing-destination">
                                                <?php $form_location = $booking_data['round1_from_location']; ?>
                                                <?php $to_location = $booking_data['round1_to_location']; ?>
                                                    <div class="col-sm-6 destination-time px-0">{{ $booking_data['round1_from_location'] == 1 ? 'Port Blair' : ($booking_data['round1_from_location'] == 2 ? 'Havelock (Swaraj Dweep)' : 'Neil (Shaheed Dweep)'  ) }}
                                                    </div>
                                                    <div class="col-sm-6 destination-time px-0">{{ $booking_data['round1_to_location'] == 1 ? 'Port Blair' : ($booking_data['round1_to_location'] == 2 ? 'Havelock (Swaraj Dweep)' : 'Neil (Shaheed Dweep)'  ) }}
                                                    </div>
                                                </div>
                                                @php
                                                $dTime = $trip2['departure_time'];
                                                $aTime = $trip2['arrival_time'];

                                                $departureTime = Carbon\Carbon::parse($dTime);
                                                $arrivalTime = Carbon\Carbon::parse($aTime);
                                                $totalDuration = $arrivalTime->diff($departureTime);
                                                $totalHours = $totalDuration->h + $totalDuration->days * 24;
                                                @endphp
                                                <div class="row w-100 p-0 m-0 mt-2">
                                                    <div class="departing-txt m-0 col-6 p-0">
                                                        <p class="departing-txt-date m-0">Total Duration</p>
                                                    </div>
                                                    <div class="col-6 p-0 departing-txt">
                                                        <p class="departing-txt-date d-inline-block m-0"> {{ $totalHours }} Hr {{ $totalDuration->i }} m Non-stop</p>
                                                    </div>
                                                </div>
                                                <div class="row w-100 p-0 m-0 mt-2">
                                                    <div class="departing-txt m-0 col-6 p-0">
                                                        <p class="departing-txt-date m-0">Fare Type</p>
                                                    </div>
                                                    <div class="departing-txt m-0 col-6 p-0">
                                                        <?php $ferry_class_title = $trip2['class_title']; ?>
                                                        <p class="departing-txt-date m-0">
                                                        @if($trip2['class_title']=='bClass')
                                                        {{'Royal'}}
                                                        @elseif ($trip2['class_title']=='pClass')
                                                            {{'Luxury'}}
                                                        @else
                                                        {{ $trip2['class_title'] }}
                                                        @endif
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row w-100 p-0 m-0 mt-2">
                                                    <div class="departing-txt m-0 col-6 p-0">
                                                        <p class="departing-txt-date m-0">No of Passenger</p>
                                                    </div>
                                                    <div class="col-6 p-0 departing-txt">
                                                            <?php $trip2_passenger = $booking_data['no_of_passenger']; ?>
                                                        <p class="departing-txt-date d-inline-block m-0"> {{ $trip2_passenger }}
                                                        </p>
                                                    </div>
                                                </div>

                                                @if ($trip2['ship_name'] == 'Nautika')
                                                <div class="row w-100 p-0 m-0 mt-2 ">
                                                    <div class="departing-txt m-0 col-6 p-0">
                                                        <p class="departing-txt-date m-0">No Of Infant</p>
                                                    </div>
                                                    <div class="col-6 p-0 departing-txt">
                                                        <p class="departing-txt-date d-inline-block m-0">
                                                            <?php $trip2_infants = $booking_data['no_of_infant']; ?>
                                                            <?php $trip2_infant_price = ($trip2['infantFare'] + $trip2['psf']) * $trip2_infants; ?>
                                                            <span>{{ $trip2_infants }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                                @endif

                                                <div class="row w-100 p-0 m-0 mt-2">
                                                    <div class="departing-txt m-0 col-6 p-0">
                                                        <p class="departing-txt-date m-0">Per Passenger Price</p>
                                                    </div>
                                                    <div class="col-6 p-0 departing-txt">
                                                        <p class="departing-txt-date d-inline-block m-0">INR 
                                                            <?php $trip2_price = $trip2['fare']; ?>
                                                            <span>{{ number_format($trip2_price, 2) }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row w-100 p-0 m-0 mt-2">
                                                    <div class="departing-txt m-0 col-6 p-0">
                                                        <p class="departing-txt-date m-0">PSF {{'(Per Pax/Infant)'}}</p>
                                                    </div>
                                                    <div class="col-6 p-0 departing-txt">
                                                        <?php $trip2_psf = $trip2['psf']; ?>
                                                        <p class="departing-txt-date d-inline-block m-0">INR <span>{{ $trip2_psf }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row w-100 p-0 m-0 w-100 p-0 m-0  pt-3 bg-transpratent">
                                        {{--@if (($trip2['ship_name'] == 'Nautika')  || ($trip2['ship_name'] == 'Makruzz'))
                                            <div class="row w-100 p-0 m-0 mt-2">
                                                <div class="departing-txt m-0 col-6 p-0">
                                                    <p class="departing-txt-date m-0">Total Discount</p>
                                                </div>
                                                <div class="col-6 p-0 departing-txt">
                                                    <p class="departing-txt-date d-inline-block m-0">INR
                                                        <?php //$trip2_no_of_pass = $booking_data['no_of_passenger']; ?>
                                                        <?php //$trip2_discount= $trip2_no_of_pass * 100; ?>
                                                        <span>{{ $trip2_discount }}</span>
                                                    </p>
                                                </div>
                                            </div>
                                        @endif --}}

                                        @php
                                        if ($trip2['ship_name'] == 'Nautika') {
                                            $total_trip2_price = (($trip2_price + $trip2_psf) * $trip2_passenger +
                                            $trip2_infant_price);

                                        } else { 
                                            $total_trip2_price = (($trip2_price + $trip2_psf) * $trip2_passenger);
                                        }
                                        @endphp

                                    </div> 
                                @endif
                                @if (isset($trip3))                             
                                    <div class="row w-100 p-0 m-0 bg-transpratent">
                                        <div class="px-2 col-12 tripDirection">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p class="m-0">Trip 3 : <span class="departing-txt-date d-inline-block"><span class="departing-txt-date d-inline-block">{{ date('d-m-Y', strtotime($booking_data['round2_date'])) }}</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p class="mb-0"> {{ $trip3['ship_name'] }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <div class="departing-box-main">
                                                <div class="departing-txt">
                                                    <span class="departing-txt-date"></span>
                                                </div>
                                                <div class="row w-100 p-0 m-0 departing-destination">
                                                    <?php $form_location = $booking_data['round2_from_location']; ?>
                                                    <?php $to_location = $booking_data['round2_to_location']; ?>
                                                    <div class="col-sm-6 destination-time px-0">{{ $booking_data['round2_from_location'] == 1 ? 'Port Blair' : ($booking_data['round2_from_location'] == 2 ? 'Havelock (Swaraj Dweep)' : 'Neil (Shaheed Dweep)'  ) }}
                                                    </div>
                                                    <div class="col-sm-6 destination-time px-0">{{ $booking_data['round2_to_location'] == 1 ? 'Port Blair' : ($booking_data['round2_to_location'] == 2 ? 'Havelock (Swaraj Dweep)' : 'Neil (Shaheed Dweep)'  ) }}
                                                    </div>
                                                </div>
                                                @php
                                                $dTime = $trip3['departure_time'];
                                                $aTime = $trip3['arrival_time'];

                                                $departureTime = Carbon\Carbon::parse($dTime);
                                                $arrivalTime = Carbon\Carbon::parse($aTime);
                                                $totalDuration = $arrivalTime->diff($departureTime);
                                                $totalHours = $totalDuration->h + $totalDuration->days * 24;
                                                @endphp
                                                <div class="row w-100 p-0 m-0 mt-2">
                                                    <div class="departing-txt m-0 col-6 p-0">
                                                        <p class="departing-txt-date m-0">Total Duration</p>
                                                    </div>
                                                    <div class="col-6 p-0 departing-txt">
                                                        <p class="departing-txt-date d-inline-block m-0"> {{ $totalHours }} Hr {{ $totalDuration->i }} m Non-stop</p>
                                                    </div>
                                                </div>
                                                <div class="row w-100 p-0 m-0 mt-2">
                                                    <div class="departing-txt m-0 col-6 p-0">
                                                        <p class="departing-txt-date m-0">Fare Type</p>
                                                    </div>
                                                    <div class="departing-txt m-0 col-6 p-0">
                                                        <?php $ferry_class_title = $trip3['class_title']; ?>
                                                        <p class="departing-txt-date m-0">
                                                            @if($trip3['class_title']=='bClass')
                                                            {{'Royal'}}
                                                            @elseif ($trip3['class_title']=='pClass')
                                                                {{'Luxury'}}
                                                            @else
                                                            {{ $trip3['class_title'] }}
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row w-100 p-0 m-0 mt-2">
                                                    <div class="departing-txt m-0 col-6 p-0">
                                                        <p class="departing-txt-date m-0">No of Passenger</p>
                                                    </div>
                                                    <div class="col-6 p-0 departing-txt">
                                                        <?php $trip3_passenger = $booking_data['no_of_passenger']; ?>
                                                        <p class="departing-txt-date d-inline-block m-0">{{ $trip3_passenger }}
                                                        </p>
                                                    </div>
                                                </div>

                                                @if ($trip3['ship_name'] == 'Nautika')
                                                <div class="row w-100 p-0 m-0 mt-2">
                                                    <div class="departing-txt m-0 col-6 p-0">
                                                        <p class="departing-txt-date m-0">No of Infant</p>
                                                    </div>
                                                    <div class="col-6 p-0 departing-txt">
                                                        <?php $trip3_infants = $booking_data['no_of_infant']; ?>
                                                        <?php $trip3_infant_price = ($trip3['infantFare'] + $trip3['psf']) * $trip3_infants; ?>
                                                        <p class="departing-txt-date d-inline-block m-0">
                                                            {{ $trip3_infants }}
                                                        </p>
        
                                                    </div>
                                                </div>
                                                @endif

                                                <div class="row w-100 p-0 m-0 mt-2">
                                                    <div class="departing-txt m-0 col-6 p-0">
                                                        <p class="departing-txt-date m-0">Per Passenger Price</p>
                                                    </div>
                                                    <div class="col-6 p-0 departing-txt">
                                                        <p class="departing-txt-date d-inline-block m-0">INR 
                                                            <?php $trip3_price = $trip3['fare']; ?>
                                                            <span>{{ number_format($trip3_price, 2) }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row w-100 p-0 m-0 mt-2">
                                                    <div class="departing-txt m-0 col-6 p-0">
                                                        <p class="departing-txt-date m-0">PSF {{'(Per Pax/Infant)'}}</p>
                                                    </div>
                                                    <div class="col-6 p-0 departing-txt">
                                                        <?php $trip3_psf = $trip3['psf']; ?>
                                                        <p class="departing-txt-date d-inline-block m-0">INR <span>{{ $trip3_psf }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                                {{-- @if (($trip3['ship_name'] == 'Nautika')  || ($trip3['ship_name'] == 'Makruzz'))
                                                <div class="row w-100 p-0 m-0 mt-2">
                                                    <div class="departing-txt m-0 col-6 p-0">
                                                        <p class="departing-txt-date m-0">Total Discount</p>
                                                    </div>
                                                    <div class="col-6 p-0 departing-txt">
                                                        <p class="departing-txt-date d-inline-block m-0">INR
                                                            <?php// $trip3_no_of_pass = $booking_data['no_of_passenger']; ?>
                                                            <?php// $trip3_discount= $trip3_no_of_pass * 100; ?>
                                                            <span>{{ $trip3_discount }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                                @endif --}}
                                                @php
                                                if ($trip3['ship_name'] == 'Nautika') {
                                                    $total_trip3_price = (($trip3_price + $trip3_psf) * $trip3_passenger +
                                                    $trip3_infant_price);
        
                                                } else { 
                                                    $total_trip3_price = (($trip3_price + $trip3_psf) * $trip3_passenger);
                                                }
        
                                                @endphp 
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-md-12 p-0 mt-2">
                                    <div class="departing-box-main totalFare">
                                        <div
                                            class="row w-100 p-0 m-0 py-2 px-3 align-items-center tripDirection">
                                            <div class="col-6 p-0">
                                                <div class="departing-txt">
                                                    <p class="departing-txt-date m-0">Total fare
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 destination-time p-0">INR {{ number_format(($total_single_price ?? 0) + ($total_trip2_price ?? 0) +  ($total_trip3_price ?? 0)) }}</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php Session:: put('total_trip1_amount',  $total_single_price ?? NULL); ?>
            <?php Session:: put('total_trip2_amount',  $total_trip2_price ?? NULL); ?>
            <?php Session:: put('total_trip3_amount',  $total_trip3_price ?? NULL); ?>
            <?php Session:: put('total_amount',  (($total_single_price ?? 0) + ($total_trip2_price ?? 0) + ($total_trip3_price?? 0))); ?>
            </form>
        </div>
    </section>

@endsection

@section('booking')

<button type="button" class="btn  billMobile" data-bs-toggle="modal" data-bs-target="#billMobile">
    <div class="row">
        <div class="col-7">
            <div class="booking-summary-heading text-left me-3">BOOKING SUMMARY</div>
        </div>
        <div class="col-5">
            <div class="booking-summary-heading text-right"> INR <span>{{ number_format(($total_single_price ?? 0) + ($total_trip2_price ?? 0) +  ($total_trip3_price ?? 0)) }}</span> </div>
        </div>
    </div>
</button>
<div class="modal fade" id="billMobile" tabindex="-1" role="dialog" 
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content mob_mbl">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
            <div class="booking-summary-main-bg mb-0">
                <div class="row py-2 p-0 m-0 w-100 booking_summy">
                    <div class="col-md-12">
                        <div class="booking-summary-heading">BOOKING SUMMARY</div>
                    </div>
                </div>
                <div class="bookingSummary">
                    <div class="row w-100 p-0 m-0 bg-transpratent">
                        <div class="px-2 col-6 py-1 tripDirection">
                            <p class=" m-0 ">Onwards : <span class="departing-txt-date d-inline-block">{{ date('d-m-Y', strtotime($booking_data['date'])) }}</span></p>
                        </div>
                        <div class="px-2 col-6 py-1 tripDirection">
                            <p class="m-0"> {{ $trip1['ship_name'] }}</p> 
                        </div>
                        <div class="col-md-12 mt-2">
                            <div class="departing-box-main">

                                <div class="departing-txt">
                                    <span class="departing-txt-date"></span>
                                </div>
                                <div class="row w-100 p-0 m-0 departing-destination">
                                    <div class="col-6 destination-time px-0">{{ $booking_data['form_location'] == 1 ? 'Port Blair' : ($booking_data['form_location'] == 2 ? 'Havelock (Swaraj Dweep)' : 'Neil (Shaheed Dweep)'  ) }}
                                    </div>
                                    <div class="col-6 destination-time px-0">{{ $booking_data['to_location'] == 1 ? 'Port Blair' : ($booking_data['to_location'] == 2 ? 'Havelock (Swaraj Dweep)' : 'Neil (Shaheed Dweep)'  ) }}
                                    </div>
                                </div>
                                <div class="row w-100 p-0 m-0 mt-2">
                                    <div class="departing-txt m-0 col-6 p-0">
                                        <p class="departing-txt-date m-0">Total Duration</p>
                                    </div>
                                    @php
                                        $dTime = $booking_data['date'] . ' ' . $trip1['departure_time'];
                                        $aTime = $booking_data['date'] . ' ' . $trip1['arrival_time'];

                                        $departureTime = Carbon\Carbon::parse($dTime);
                                        $arrivalTime = Carbon\Carbon::parse($aTime);
                                        $totalDuration = $arrivalTime->diff($departureTime);
                                        $totalHours = $totalDuration->h + $totalDuration->days * 24;
                                    @endphp
                                    <div class="col-6 p-0 departing-txt">
                                        <p class="departing-txt-date d-inline-block m-0">{{ $totalHours }} Hr {{ $totalDuration->i }} m Non-stop</p>
                                    </div>
                                </div>
                                <div class="row w-100 p-0 m-0 mt-2">
                                    <div class="departing-txt m-0 col-6 p-0">
                                        <p class="departing-txt-date m-0">Fare Type</p>
                                    </div>
                                    <div class="col-6 p-0 departing-txt">
                                        <p class="departing-txt-date d-inline-block m-0">
                                            @if($trip1['class_title']=='bClass')
                                                {{'Royal'}}
                                            @elseif ($trip1['class_title']=='pClass')
                                                {{'Luxury'}}
                                            @else
                                                {{ $trip1['class_title'] }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="row w-100 p-0 m-0 mt-2">
                                    <div class="departing-txt m-0 col-6 p-0">
                                        <p class="departing-txt-date m-0">No of Passenger</p>
                                    </div>
                                    <div class="col-6 p-0 departing-txt">
                                        <p class="departing-txt-date d-inline-block m-0">{{ $booking_data['no_of_passenger'] }}
                                        </p>
                                    </div>
                                </div>
                                <div class="row w-100 p-0 m-0 mt-2">
                                    <div class="departing-txt m-0 col-6 p-0">
                                        <p class="departing-txt-date m-0">Per Passenger Price</p>
                                    </div>
                                    <div class="col-6 p-0 departing-txt">
                                        <p class="departing-txt-date d-inline-block m-0">INR 
                                            <?php $price = $trip1['fare']; ?>
                                            <span>{{ number_format($price, 2) }}</span>
                                        </p>
                                    </div>
                                </div>
                                @if ($booking_data['schedule'][1]['ship'] == 'Nautika')
                                <div class="row w-100 p-0 m-0 mt-2 ">
                                    <div class="departing-txt m-0 col-6 p-0">
                                        <p class="departing-txt-date m-0">No Of Infant</p>
                                    </div>
                                    <div class="col-6 p-0 departing-txt">
                                        <p class="departing-txt-date d-inline-block m-0">
                                            <?php $infant = $booking_data['no_of_infant'];  ?>
                                            <?php $infant_price = ($trip1['infantFare'] + $trip1['psf']) * $infant; ?>
                                            <span>{{ $infant }}</span>
                                        </p>
                                    </div>
                                </div>
                                @endif
                                <div class="row w-100 p-0 m-0 mt-2">
                                    <div class="departing-txt m-0 col-6 p-0">
                                        <p class="departing-txt-date m-0">PSF {{'(Per Pax/Infant)'}}</p>
                                    </div>
                                    <div class="col-6 p-0 departing-txt">
                                        <p class="departing-txt-date d-inline-block m-0">INR <span>{{ $trip1['psf'] }}</span>
                                        </p>
                                    </div>
                                </div>
                                {{-- <?php //$discount=0; ?>
                                <?php// $trip2_discount=0; ?>
                                <?php //$trip3_discount=0; ?>
                                @if (($trip1['ship_name'] == 'Nautika') || ($trip1['ship_name'] == 'Makruzz'))
                                    <div class="row w-100 p-0 m-0 mt-2">
                                        <div class="departing-txt m-0 col-6 p-0">
                                            <p class="departing-txt-date m-0">Total Discount</p>
                                        </div>
                                        <div class="col-6 p-0 departing-txt">
                                            <p class="departing-txt-date d-inline-block m-0">INR
                                                <?php //$no_of_pass = $booking_data['no_of_passenger']; ?>
                                                <?php //$discount= $no_of_pass * 100; ?>
                                                <span>{{$discount }}</span>
                                            </p>
                                        </div>
                                    </div>
                                @endif --}}
                                {{-- if check for single booking total price (for nautike only add rs 100 per infant) --}}
                                @php
                        
                                if ($trip1['ship_name'] == 'Nautika') {
                                    $total_single_price = (($price + $trip1['psf']) * $booking_data['no_of_passenger'] + $infant_price);
                                } else {
                                    $total_single_price = (($price + $trip1['psf']) * $booking_data['no_of_passenger']);
                                }
                        
                                $total_trip2_price = 0;
                                $trip_infant_price=0;
                                @endphp
                            </div>
                        </div>
                    </div>
                
                    @if (isset($trip2))                               
                        <div class="row w-100 p-0 m-0 bg-transpratent">
                            <div class="px-2 col-12 tripDirection">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class=" m-0 ">Trip 2 : <span class="departing-txt-date d-inline-block"><span class="departing-txt-date d-inline-block">{{ date('d-m-Y', strtotime($booking_data['round1_date'])) }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-0"> {{ $trip2['ship_name'] }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="departing-box-main">
                                    <div class="departing-txt">
                                        <span class="departing-txt-date"></span>
                                    </div>
                                    <div class="row w-100 p-0 m-0 departing-destination">
                                    <?php $form_location = $booking_data['round1_from_location']; ?>
                                    <?php $to_location = $booking_data['round1_to_location']; ?>
                                        <div class="col-6 destination-time px-0">{{ $booking_data['round1_from_location'] == 1 ? 'Port Blair' : ($booking_data['round1_from_location'] == 2 ? 'Havelock (Swaraj Dweep)' : 'Neil (Shaheed Dweep)'  ) }}
                                        </div>
                                        <div class="col-6 destination-time px-0">{{ $booking_data['round1_to_location'] == 1 ? 'Port Blair' : ($booking_data['round1_to_location'] == 2 ? 'Havelock (Swaraj Dweep)' : 'Neil (Shaheed Dweep)'  ) }}
                                        </div>
                                    </div>
                                    @php
                                    $dTime = $trip2['departure_time'];
                                    $aTime = $trip2['arrival_time'];
                
                                    $departureTime = Carbon\Carbon::parse($dTime);
                                    $arrivalTime = Carbon\Carbon::parse($aTime);
                                    $totalDuration = $arrivalTime->diff($departureTime);
                                    $totalHours = $totalDuration->h + $totalDuration->days * 24;
                                    @endphp
                                    <div class="row w-100 p-0 m-0 mt-2">
                                        <div class="departing-txt m-0 col-6 p-0">
                                            <p class="departing-txt-date m-0">Total Duration</p>
                                        </div>
                                        <div class="col-6 p-0 departing-txt">
                                            <p class="departing-txt-date d-inline-block m-0"> {{ $totalHours }} Hr {{ $totalDuration->i }} m Non-stop</p>
                                        </div>
                                    </div>
                                    <div class="row w-100 p-0 m-0 mt-2">
                                        <div class="departing-txt m-0 col-6 p-0">
                                            <p class="departing-txt-date m-0">Fare Type</p>
                                        </div>
                                        <div class="departing-txt m-0 col-6 p-0">
                                            <?php $ferry_class_title = $trip2['class_title']; ?>
                                            <p class="departing-txt-date m-0">
                                            @if($trip2['class_title']=='bClass')
                                            {{'Royal'}}
                                            @elseif ($trip2['class_title']=='pClass')
                                                {{'Luxury'}}
                                            @else
                                            {{ $trip2['class_title'] }}
                                            @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row w-100 p-0 m-0 mt-2">
                                        <div class="departing-txt m-0 col-6 p-0">
                                            <p class="departing-txt-date m-0">No of Passenger</p>
                                        </div>
                                        <div class="col-6 p-0 departing-txt">
                                                <?php $trip2_passenger = $booking_data['no_of_passenger']; ?>
                                            <p class="departing-txt-date d-inline-block m-0"> {{ $trip2_passenger }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row w-100 p-0 m-0 mt-2">
                                        <div class="departing-txt m-0 col-6 p-0">
                                            <p class="departing-txt-date m-0">Per Passenger Price</p>
                                        </div>
                                        <div class="col-6 p-0 departing-txt">
                                            <p class="departing-txt-date d-inline-block m-0">INR 
                                                <?php $trip2_price = $trip2['fare']; ?>
                                                <span>{{ number_format($trip2_price, 2) }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row w-100 p-0 m-0 mt-2">
                                        <div class="departing-txt m-0 col-6 p-0">
                                            <p class="departing-txt-date m-0">PSF {{'(Per Pax/Infant)'}}</p>
                                        </div>
                                        <div class="col-6 p-0 departing-txt">
                                            <?php $trip2_psf = $trip2['psf']; ?>
                                            <p class="departing-txt-date d-inline-block m-0">INR <span>{{ $trip2_psf }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    {{-- @if (($trip2['ship_name'] == 'Nautika')  || ($trip2['ship_name'] == 'Makruzz'))
                                    <div class="row w-100 p-0 m-0 mt-2">
                                        <div class="departing-txt m-0 col-6 p-0">
                                            <p class="departing-txt-date m-0">Total Discount</p>
                                        </div>
                                        <div class="col-6 p-0 departing-txt">
                                            <p class="departing-txt-date d-inline-block m-0">INR
                                                <?php //$trip2_no_of_pass = $booking_data['no_of_passenger']; ?>
                                                <?php //$trip2_discount= $trip2_no_of_pass * 100; ?>
                                                <span>{{ $trip2_discount }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    @endif  --}}
                        
                                    @php
                                    if ($trip2['ship_name'] == 'Nautika') {
                                        $total_trip2_price = (($trip2_price + $trip2_psf) * $trip2_passenger +
                                        $trip2_infant_price);
                        
                                    } else { 
                                        $total_trip2_price = (($trip2_price + $trip2_psf) * $trip2_passenger);
                                    }
                                    @endphp
                                </div>
                            </div>
                        </div>
                    @endif
                    @if (isset($trip3))                             
                        <div class="row w-100 p-0 m-0 bg-transpratent">
                            <div class="px-2 col-12 tripDirection">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="m-0">Trip 3 : <span class="departing-txt-date d-inline-block"><span class="departing-txt-date d-inline-block">{{ date('d-m-Y', strtotime($booking_data['round2_date'])) }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-0"> {{ $trip3['ship_name'] }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="departing-box-main">
                                    <div class="departing-txt">
                                        <span class="departing-txt-date"></span>
                                    </div>
                                    <div class="row w-100 p-0 m-0 departing-destination">
                                        <?php $form_location = $booking_data['round2_from_location']; ?>
                                        <?php $to_location = $booking_data['round2_to_location']; ?>
                                        <div class="col-6 destination-time px-0">{{ $booking_data['round2_from_location'] == 1 ? 'Port Blair' : ($booking_data['round2_from_location'] == 2 ? 'Havelock (Swaraj Dweep)' : 'Neil (Shaheed Dweep)'  ) }}
                                        </div>
                                        <div class="col-6 destination-time px-0">{{ $booking_data['round2_to_location'] == 1 ? 'Port Blair' : ($booking_data['round2_to_location'] == 2 ? 'Havelock (Swaraj Dweep)' : 'Neil (Shaheed Dweep)'  ) }}
                                        </div>
                                    </div>
                                    @php
                                    $dTime = $trip3['departure_time'];
                                    $aTime = $trip3['arrival_time'];
                
                                    $departureTime = Carbon\Carbon::parse($dTime);
                                    $arrivalTime = Carbon\Carbon::parse($aTime);
                                    $totalDuration = $arrivalTime->diff($departureTime);
                                    $totalHours = $totalDuration->h + $totalDuration->days * 24;
                                    @endphp
                                    <div class="row w-100 p-0 m-0 mt-2">
                                        <div class="departing-txt m-0 col-6 p-0">
                                            <p class="departing-txt-date m-0">Total Duration</p>
                                        </div>
                                        <div class="col-6 p-0 departing-txt">
                                            <p class="departing-txt-date d-inline-block m-0"> {{ $totalHours }} Hr {{ $totalDuration->i }} m Non-stop</p>
                                        </div>
                                    </div>
                                    <div class="row w-100 p-0 m-0 mt-2">
                                        <div class="departing-txt m-0 col-6 p-0">
                                            <p class="departing-txt-date m-0">Fare Type</p>
                                        </div>
                                        <div class="departing-txt m-0 col-6 p-0">
                                            <?php $ferry_class_title = $trip3['class_title']; ?>
                                            <p class="departing-txt-date m-0">
                                                @if($trip3['class_title']=='bClass')
                                                {{'Royal'}}
                                                @elseif ($trip3['class_title']=='pClass')
                                                    {{'Luxury'}}
                                                @else
                                                {{ $trip3['class_title'] }}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row w-100 p-0 m-0 mt-2">
                                        <div class="departing-txt m-0 col-6 p-0">
                                            <p class="departing-txt-date m-0">No of Passenger</p>
                                        </div>
                                        <div class="col-6 p-0 departing-txt">
                                            <?php $trip3_passenger = $booking_data['no_of_passenger']; ?>
                                            <p class="departing-txt-date d-inline-block m-0">{{ $trip3_passenger }}
                                            </p>
                                        </div>
                                    </div>
                
                                    @if ($trip3['ship_name'] == 'Nautika')
                                    <div class="row w-100 p-0 m-0 mt-2">
                                        <div class="departing-txt m-0 col-6 p-0">
                                            <p class="departing-txt-date m-0">No of Infant</p>
                                        </div>
                                        <div class="col-6 p-0 departing-txt">
                                            <?php $trip3_infants = $booking_data['no_of_infant']; ?>
                                            <?php $trip3_infant_price = ($trip3['infantFare'] + $trip3['psf']) * $trip3_infants; ?>
                                            <p class="departing-txt-date d-inline-block m-0">
                                                {{ $trip3_infants }}
                                            </p>
                
                                        </div>
                                    </div>
                                    @endif
                
                                    <div class="row w-100 p-0 m-0 mt-2">
                                        <div class="departing-txt m-0 col-6 p-0">
                                            <p class="departing-txt-date m-0">Per Passenger Price</p>
                                        </div>
                                        <div class="col-6 p-0 departing-txt">
                                            <p class="departing-txt-date d-inline-block m-0">INR 
                                                <?php $trip3_price = $trip3['fare']; ?>
                                                <span>{{ number_format($trip3_price, 2) }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row w-100 p-0 m-0 mt-2">
                                        <div class="departing-txt m-0 col-6 p-0">
                                            <p class="departing-txt-date m-0">PSF {{'(Per Pax/Infant)'}}</p>
                                        </div>
                                        <div class="col-6 p-0 departing-txt">
                                            <?php $trip3_psf = $trip3['psf']; ?>
                                            <p class="departing-txt-date d-inline-block m-0">INR <span>{{ $trip3_psf }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    {{-- @if (($trip3['ship_name'] == 'Nautika')  || ($trip3['ship_name'] == 'Makruzz'))
                                    <div class="row w-100 p-0 m-0 mt-2">
                                        <div class="departing-txt m-0 col-6 p-0">
                                            <p class="departing-txt-date m-0">Total Discount</p>
                                        </div>
                                        <div class="px-2 col-6 py-1 tripDirection">
                                            <p class="departing-txt-date d-inline-block m-0">INR
                                                <?php //$trip3_no_of_pass = $booking_data['no_of_passenger']; ?>
                                                <?php //$trip3_discount= $trip3_no_of_pass * 100; ?>
                                                <span>{{ $trip3_discount }}</span>
                                            </p>
                                        </div>
                                    </div>
                                    @endif  --}}
                                    @php
                                    if ($trip3['ship_name'] == 'Nautika') {
                                        $total_trip3_price = (($trip3_price + $trip3_psf) * $trip3_passenger +
                                        $trip3_infant_price);
                        
                                    } else { 
                                        $total_trip3_price = (($trip3_price + $trip3_psf) * $trip3_passenger);
                                    }
        
                                    @endphp
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="col-md-12 p-0 mt-2">
                        <div class="departing-box-main totalFare">
                            <div class="row w-100 p-0 m-0 py-2 px-3 align-items-center tripDirection">
                                <div class="col-6 p-0">
                                    <div class="departing-txt">
                                        <p class="departing-txt-date m-0">Total fare</p>
                                    </div>
                                </div>
                                <div class="col-6 destination-time p-0">
                                    INR {{ number_format(($total_single_price ?? 0) + ($total_trip2_price ?? 0) +  ($total_trip3_price ?? 0)) }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Handle change event for all title selects
        $('select.passenger_title').change(function() {
            var index = $(this).attr('id').match(/\d+/)[0]; // Extract index from ID
            var title = $(this).val();
            var genderSelect = $('#p_sex_' + index);
            
            // Set gender based on title selection
            if (title === 'Mrs' || title === 'Miss') {
                genderSelect.val('female');
            } else if (title === 'Mr' || title === 'Master') {
                genderSelect.val('male');
            } else {
                // Optional: Reset the gender selection if the title is not recognized
                // genderSelect.val('');
            }
        });
    });
</script>


<script>
document.addEventListener('DOMContentLoaded', function() {
    var ageInputs = document.querySelectorAll('.age_picker_infants');

    ageInputs.forEach(function(input) {
      input.addEventListener('input', function() {
        var value = this.value;

        // Remove non-numeric characters
        value = value.replace(/[^0-9]/g, '');

        // Ensure age is exactly 1
        if (value !== '1') {
          value = '1';
        }

        // Update the input field with the valid value
        this.value = value;
      });
    });
});

$(document).ready(function() {
    $("#p_expiry_date").datepicker({
        dateFormat: 'dd/mm/yy', // Date format
        changeMonth: true,
        changeYear: true,
        yearRange: "c:c+20", // Show current year and the next 20 years in dropdown
    });
});

$(document).ready(function() {
    $("#i_expiry_date").datepicker({
        dateFormat: 'dd/mm/yy', // Date format
        changeMonth: true,
        changeYear: true,
        yearRange: "c:c+20", // Show current year and the next 20 years in dropdown
    });
});

</script>

<script>
    // Function to clear validation error messages
    function clearErrors() {
        document.querySelectorAll('span.text-danger').forEach(span => {
            span.innerHTML = '';
        });
    }

    // Function to set an error message
    function setError(selector, message) {
        const element = document.querySelector(selector);
        if (element) {
            const errorSpan = element.nextElementSibling;
            if (errorSpan && errorSpan.classList.contains('text-danger')) {
                errorSpan.innerHTML = message;
            } else {
                console.warn(`No error span found for ${selector}`);
            }
        } else {
            console.warn(`No element found for ${selector}`);
        }
    }

    // Function to scroll to the first error field
    function scrollToFirstError() {
        const firstError = document.querySelector('span.text-danger');
        if (firstError) {
            firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    }

    $(document).ready(function() {
    $("#billMobile").click(function() {
        $(".bookingSumBg").toggleClass("show");
        $("#payment").toggleClass("show");
    });

    $('#booking_details_id').on('submit', function(event) {
        clearErrors();
        let isValid = true;

        // Validate passenger fields
        const passengers = parseInt('{{ $booking_data['no_of_passenger'] }}', 10);
        for (let i = 1; i <= passengers; i++) {
            const selectors = {
                title: `select[name="passenger_title[${i}]"]`,
                name: `input[name="passenger_name[${i}]"]`,
                dob: `input[name="passenger_dob[${i}]"]`,
                gender: `select[name="passenger_gender[${i}]"]`,
                nationality: `select[name="passenger_nationality[${i}]"]`
            };

            if (!document.querySelector(selectors.title).value) {
                setError(selectors.title, 'Title is required.');
                isValid = false;
            }
            if (!document.querySelector(selectors.name).value.trim()) {
                setError(selectors.name, 'Name is required.');
                isValid = false;
            }

            const dobValue = document.querySelector(selectors.dob).value;
            if (!dobValue) {
                setError(selectors.dob, 'Age is required.');
                isValid = false;
            } else {
                const value = parseInt(dobValue, 10);
                if (isNaN(value) || value < 2) {
                    setError(selectors.dob, 'Age must be at least 2.');
                    isValid = false;
                } else if (value > 99) {
                    setError(selectors.dob, 'Age must be less than or equal to 99.');
                    isValid = false;
                }
            }

            if (!document.querySelector(selectors.gender).value) {
                setError(selectors.gender, 'Gender is required.');
                isValid = false;
            }
            if (!document.querySelector(selectors.nationality).value) {
                setError(selectors.nationality, 'Nationality is required.');
                isValid = false;
            }
        }

        // Validate infants fields
        const infants = parseInt('{{ $booking_data['no_of_infant'] }}', 10);
        let infantIndex = passengers + 1;
        for (let j = 1; j <= infants; j++, infantIndex++) {
            const selectors = {
                name: `input[name="passenger_name[${infantIndex}]"]`,
                dob: `input[name="passenger_dob[${infantIndex}]"]`,
                gender: `select[name="passenger_gender[${infantIndex}]"]`,
                nationality: `select[name="passenger_nationality[${infantIndex}]"]`
            };

            if (!document.querySelector(selectors.name).value.trim()) {
                setError(selectors.name, 'Infant name is required.');
                isValid = false;
            }
            if (!document.querySelector(selectors.dob).value) {
                setError(selectors.dob, 'Age is required.');
                isValid = false;
            }
            if (!document.querySelector(selectors.gender).value) {
                setError(selectors.gender, 'Gender is required.');
                isValid = false;
            }
            if (!document.querySelector(selectors.nationality).value) {
                setError(selectors.nationality, 'Nationality is required.');
                isValid = false;
            }
        }

        // Validate contact details
        const contactSelectors = {
            name: 'input[name="c_name"]',
            email: 'input[name="c_email"]',
            mobile: 'input[name="c_mobile"]'
        };

        if (!document.querySelector(contactSelectors.name).value.trim()) {
            setError(contactSelectors.name, 'Contact name is required.');
            isValid = false;
        }
        if (!document.querySelector(contactSelectors.email).value.trim()) {
            setError(contactSelectors.email, 'Contact email is required.');
            isValid = false;
        } else if (!/\S+@\S+\.\S+/.test(document.querySelector(contactSelectors.email).value.trim())) {
            setError(contactSelectors.email, 'Invalid email format.');
            isValid = false;
        }

        // Mobile number regex validation
        const mobileRegex = /^[0-9]{10}$/;
        if (!document.querySelector(contactSelectors.mobile).value.trim()) {
            setError(contactSelectors.mobile, 'Contact mobile is required.');
            isValid = false;
        } else if (!mobileRegex.test(document.querySelector(contactSelectors.mobile).value.trim())) {
            setError(contactSelectors.mobile, 'Invalid mobile number format.');
            isValid = false;
        }

        if (!isValid) {
            scrollToFirstError();
            event.preventDefault();
        }
    });

    // Handle changes in the residential field
    $(document).on('change', "#residental", function() {
        var residentType = $(this).val();
        var parentRow = $(this).closest(".travel-insurance-main-bg");
        if (residentType === 'foreigner') {
            parentRow.find('#passport_id').show();
            parentRow.find('#country_name').show();
            parentRow.find('#expiry_date').show();
        } else {
            parentRow.find('#passport_id').hide();
            parentRow.find('#country_name').hide();
            parentRow.find('#expiry_date').hide();
        }
    });
});

</script>

@endsection