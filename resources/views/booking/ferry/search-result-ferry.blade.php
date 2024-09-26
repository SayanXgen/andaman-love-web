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
                    <div class="col-sm-6 destination-time px-0">{{ $booking_data['form_location'] == 1 ? 'Port Blair' : ($booking_data['form_location'] == 2 ? 'Havelock' : 'Neil'  ) }}
                    </div>
                    <div class="col-sm-6 destination-time px-0">{{ $booking_data['to_location'] == 1 ? 'Port Blair' : ($booking_data['to_location'] == 2 ? 'Havelock' : 'Neil'  ) }}
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
                                {{'Business'}}
                            @elseif ($trip1['class_title']=='pClass')
                                {{'Premium'}}
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
            </div>
        </div>
    </div>

    <div class="row w-100 p-0 m-0 w-100 p-0 m-0  pt-3 bg-transpratent">
        <?php $discount=0; ?>
        <?php $trip2_discount=0; ?>
        <?php $trip3_discount=0; ?>
        @if (($trip1['ship_name'] == 'Nautika') || ($trip1['ship_name'] == 'Makruzz'))
            <div class="row w-100 p-0 m-0 mt-2 pb-2">
                <div class="departing-txt m-0 col-6 p-0">
                    <p class="departing-txt-date m-0">Total Discount</p>
                </div>
                <div class="col-6 p-0 departing-txt">
                    <p class="departing-txt-date d-inline-block m-0">INR
                        <?php $no_of_pass = $booking_data['no_of_passenger']; ?>
                        <?php $discount= $no_of_pass * 100; ?>
                        <span>{{$discount }}</span>
                    </p>
                </div>
            </div>
        @endif
        {{-- if check for single booking total price (for nautike only add rs 100 per infant) --}}
        @php

        if ($trip1['ship_name'] == 'Nautika') {
            $total_single_price = (($price + $trip1['psf']) * $booking_data['no_of_passenger'] + $infant_price) - $discount;
        } else {
            $total_single_price = (($price + $trip1['psf']) * $booking_data['no_of_passenger']) - $discount;
        }

        $total_trip2_price = 0;
        $trip_infant_price=0;
        @endphp
    </div>

    @if (isset($trip2))                               
        <div class="row w-100 p-0 m-0 bg-transpratent">
            <div class="px-2 col-12 tripDirection">
                <div class="row">
                    <div class="col-md-6">
                        <p class=" m-0 ">Trip 2 : <span class="departing-txt-date d-inline-block"><span class="departing-txt-date d-inline-block">{{ $booking_data['round1_date'] }}</p>
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
                        <div class="col-sm-6 destination-time px-0">{{ $booking_data['round1_from_location'] == 1 ? 'Port Blair' : ($booking_data['round1_from_location'] == 2 ? 'Havelock' : 'Neil'  ) }}
                        </div>
                        <div class="col-sm-6 destination-time px-0">{{ $booking_data['round1_to_location'] == 1 ? 'Port Blair' : ($booking_data['round1_to_location'] == 2 ? 'Havelock' : 'Neil'  ) }}
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
                            {{'Business'}}
                            @elseif ($trip2['class_title']=='pClass')
                                {{'Premium'}}
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
                </div>
            </div>
        </div>
        <div class="row w-100 p-0 m-0 w-100 p-0 m-0  pt-3 bg-transpratent">
            @if (($trip2['ship_name'] == 'Nautika')  || ($trip2['ship_name'] == 'Makruzz'))
                <div class="row w-100 p-0 m-0 mt-2 pb-2">
                    <div class="departing-txt m-0 col-6 p-0">
                        <p class="departing-txt-date m-0">Total Discount</p>
                    </div>
                    <div class="col-6 p-0 departing-txt">
                        <p class="departing-txt-date d-inline-block m-0">INR
                            <?php $trip2_no_of_pass = $booking_data['no_of_passenger']; ?>
                            <?php $trip2_discount= $trip2_no_of_pass * 100; ?>
                            <span>{{ $trip2_discount }}</span>
                        </p>
                    </div>
                </div>
            @endif

            @php
            if ($trip2['ship_name'] == 'Nautika') {
                $total_trip2_price = (($trip2_price + $trip2_psf) * $trip2_passenger +
                $trip2_infant_price) - $trip2_discount;

            } else { 
                $total_trip2_price = (($trip2_price + $trip2_psf) * $trip2_passenger) - $trip2_discount ;
            }
            @endphp
        </div>
    @endif
    @if (isset($trip3))                             
        <div class="row w-100 p-0 m-0 bg-transpratent">
            <div class="px-2 col-12 tripDirection">
                <div class="row">
                    <div class="col-md-6">
                        <p class="m-0">Trip 3 : <span class="departing-txt-date d-inline-block"><span class="departing-txt-date d-inline-block">{{ $booking_data['round2_date'] }}</p>
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
                        <div class="col-sm-6 destination-time px-0">{{ $booking_data['round2_from_location'] == 1 ? 'Port Blair' : ($booking_data['round2_from_location'] == 2 ? 'Havelock' : 'Neil'  ) }}
                        </div>
                        <div class="col-sm-6 destination-time px-0">{{ $booking_data['round2_to_location'] == 1 ? 'Port Blair' : ($booking_data['round2_to_location'] == 2 ? 'Havelock' : 'Neil'  ) }}
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
                                {{'Business'}}
                                @elseif ($trip3['class_title']=='pClass')
                                    {{'Premium'}}
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
                </div>
            </div>
        </div>
        <div class="row w-100 p-0 m-0 w-100 p-0 m-0  pt-3 bg-transpratent">
            @if (($trip3['ship_name'] == 'Nautika')  || ($trip3['ship_name'] == 'Makruzz'))
                <div class="row w-100 p-0 m-0 mt-2 pb-2">
                    <div class="departing-txt m-0 col-6 p-0">
                        <p class="departing-txt-date m-0">Total Discount</p>
                    </div>
                    <div class="col-6 p-0 departing-txt">
                        <p class="departing-txt-date d-inline-block m-0">INR
                            <?php $trip3_no_of_pass = $booking_data['no_of_passenger']; ?>
                            <?php $trip3_discount= $trip3_no_of_pass * 100; ?>
                            <span>{{ $trip3_discount }}</span>
                        </p>
                    </div>
                </div>
            @endif
            @php
            if ($trip3['ship_name'] == 'Nautika') {
                $total_trip3_price = (($trip3_price + $trip3_psf) * $trip3_passenger +
                $trip3_infant_price) - $trip3_discount;

            } else { 
                $total_trip3_price = (($trip3_price + $trip3_psf) * $trip3_passenger) - $trip3_discount ;
            }

            @endphp
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