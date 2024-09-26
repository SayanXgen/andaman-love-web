<!DOCTYPE html>
<html>

<head>
    <title>Email</title>
</head>

<body>
    <style>
        td {
            padding: 10px;
        }

        th {
            padding: 10px;
        }
    </style>

    @php
        $booking_id = $details['booking_id'];
        $trip2_booking_id = !empty($details['trip2_booking_id']) ? $details['trip2_booking_id'] : null;
        $trip3_booking_id = !empty($details['trip3_booking_id']) ? $details['trip3_booking_id'] : null;
        $greet = !empty($details['greet']) ? $details['greet'] : null;

        //  $booking_id='401';
        //  $return_booking='402';

        $single_booking = DB::table('booking as b')
            ->leftJoin('booking_passenger_details as bpd', 'bpd.booking_id', '=', 'b.id')
            ->leftJoin('pnr_status as ps', 'ps.booking_id', '=', 'b.id')
            ->where('b.id', $booking_id)
            ->select('*')
            ->get();

    @endphp

    <div style="padding:5px">

        {{-- *** for makruzz only send link ***** --}}
        @if ($single_booking[0]->booking_vendor == 'Makruzz')
            @if (empty($greet))
                <div style="text-align: center; padding:10px">
                    <h2 style="color: #1592eb;font-family:'Cambria', serif;font-size:11.5px; margin:10px">Andaman Love</h2>
                    <div
                        style="text-align: center; display: inline-block; background: #44707e; color: #FFF;font-family:'Cambria', serif;font-size:11.5px; padding: 5px 45px; border-radius: 5px;">
                        <P>FerryTicket</P>
                    </div>
                </div>

                <h3 style="font-family:'Cambria', serif;font-size:11.5px;">Dear {{ $single_booking[0]->c_name }}, </h3>
                <h3 style="font-family:'Cambria', serif;font-size:11.5px;">Greetings!</h4>
                <h3 style="font-family:'Cambria', serif;font-size:11.5px;">Thank you for choosing Andaman Love for your ferry booking. We are excited to be a part of your journey!</h3>
                <h3 style="font-family:'Cambria', serif;font-size:11.5px;">Please find the ferry tickets as per your recent booking.</h3>

                <h3 style="font-family:'Cambria', serif;font-size:11.5px;">When at Havelock Island (Swaraj Dweep) do visit <a href="https://www.tripadvisor.in/Restaurant_Review-g503691-d9681420-Reviews-Something_Different_A_beachside_Cafe-Havelock_Island_Andaman_and_Nicobar_Islands.html">Something Different – a beachside café</a>, the highest rated restaurant at Havelock on <a href="https://www.tripadvisor.com/">tripadivsor.com</a></h3>
                <h3 style="font-family:'Cambria', serif;font-size:11.5px;">In case you need any assistance with booking transfers, sightseeing, water sports activities or your entire package, please feel free to get in touch with our team and we shall be more than happy to assist you.</h3>

                <h3 style="font-family:'Cambria', serif;font-size:11.5px;">{{ $single_booking[0]->from_location == 1 ? 'Port Blair' : ($single_booking[0]->from_location == 2 ? 'Havelock (Swaraj Dweep)' : 'Neil (Shaheed Dweep)'  ) }}
                    to {{ $single_booking[0]->to_location == 1 ? 'Port Blair' : ($single_booking[0]->to_location == 2 ? 'Havelock (Swaraj Dweep)' : 'Neil (Shaheed Dweep)'  ) }}
                    : {{ $single_booking[0]->pnr_id }}</h3>

                <?php $pnr_id = $single_booking[0]->pnr_id ?? ''; ?>
                <h4 style="font-family:'Cambria', serif;font-size:11.5px;">{{ 'https://makruzz.com/OnlineUserSeatSelection/print_ticket/' . $pnr_id }}</h3>
                <h3 style="font-family:'Cambria', serif;font-size:11.5px;">Please go through the ticket(s) for accuracy of the travel and booking information. We request you to use the PNR number for any further communication with our team</h3>
                <h3 style="font-family:'Cambria', serif;font-size:11.5px;">If you require any assistance, feel free to contact us. We are here to help.</h3>
                <h3 style="font-family:'Cambria', serif;font-size:11.5px;">Safe travels!</h4>
                <h3 style="font-family:'Cambria', serif;font-size:11.5px;">Best regards,</h3>
                <h4 style="color:red;font-family:'Cambria', serif;font-size:11.5px;">*Please note, this email is sent from an unmonitored address. For assistance, kindly reach out to us using the contact details provided in the signature below:</h4>
                <h4 style="color:red;font-family:'Cambria', serif;font-size:11.5px;">*You will receive an sms with seat selection link from makruzz 48 hours prior to your journey date on the same number which you have provided at the time of booking the tickets on the website. Kindly use the link to select the seats as per your preference. Seat selection is beyond our control.</h4>
            @endif
        @else
            {{-- ****** for all ship except Makruzzz/Nautika ******** --}}
            @if (empty($greet))
                <div style="text-align: center; padding:10px">
                    <h2 style="color: #1592eb; font-size:28px; margin:10px">Andaman Love</h2>
                    {{-- <div>
                        <img src="https://bookmyferry.in/assets/images/logo.png" style="margin: 5px;" width="40px"
                            alt="">
                    </div> --}}


                    <div
                        style="text-align: center; display: inline-block; background: #44707e; color: #FFF; font-size: 18px; padding: 5px 45px; border-radius: 5px;">
                        <P style="font-family:'Cambria', serif;font-size:11.5px;">We Are Processing Your Ticket Booking Request</P>
                    </div>
                </div>

                <h5 style="font-family:'Cambria', serif;font-size:11.5px;"> Hi , &nbsp; {{ $single_booking[0]->c_name }}, </h5>
                <h5 style="font-family:'Cambria', serif;font-size:11.5px;"> We have finished processing your order.</h5>
            @else
                <h5> {{ $greet }}.</h5>
            @endif
            <h2>[Order:{{ $single_booking[0]->order_id }}]({{ date('M d, Y', strtotime($single_booking[0]->created_at)) }})
            </h2>

            <div style="text-align: center; color:#636363;">
                <table
                    style="border: 2px solid #e5e5e5; width: 100%;text-align: center; align-items: center;margin: 0 auto;border-collapse: collapse;">
                    <thead style="border: 1px solid #e5e5e5">
                        <th style="border: 1px solid #e5e5e5">Product</th>
                        <th style="border: 1px solid #e5e5e5">No Of Passenger</th>
                        <th style="border: 1px solid #e5e5e5">Price</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="border: 1px solid #e5e5e5; width:70% ; text-align:left">
                                <h3 style="padding-left: 15px;">Booking For: <span style="padding-left:15px ">
                                        {{ ucfirst($single_booking[0]->type) }}
                                    </span> </h3>
                                <h3 style="padding-left: 15px;font-family:'Cambria', serif;font-size:11.5px;">Boat/Vessel: <span style="padding-left:15px ">
                                        {{ ucfirst($single_booking[0]->ship_name) }} </span> </h3>
                                <h3 style="padding-left: 15px;font-family:'Cambria', serif;font-size:11.5px;">Ferry Class: <span style="padding-left:15px">     
                                    @if($single_booking[0]->ferry_class =='bClass')
                                      {{ucfirst('Luxury')}}
                                    @elseif ($single_booking[0]->ferry_class =='pClass')
                                      {{ucfirst('Royal')}}
                                    @endif
                                    </span>
                                </h3>
                                <h3 style="padding-left: 15px;">No of person: <span style="padding-left:15px">{{ ucfirst($single_booking[0]->no_of_passenger) }}</span></h3>
                                <h3 style="padding-left: 15px;">Start time: <span style="padding-left:15px">{{ ucfirst($single_booking[0]->departure_time) }}</span></h3>
                                <h3 style="padding-left: 15px;">End time: <span style="padding-left:15px">{{ ucfirst($single_booking[0]->arrival_time) }}</span></h3>
{{-- 
                                <h5>From Location: <span style="padding-left:15px ">
                                        {{ ucfirst($single_booking[0]->from_location) }} </span></h5>
                                <h5>To Location: <span style="padding-left:15px ">
                                        {{ ucfirst($single_booking[0]->to_location) }} </span> </h5> --}}
                                

                                <h3 style="padding-left: 15px;font-family:'Cambria', serif;font-size:11.5px;">From Location: <span style="padding-left:15px ">
                                    {{ $single_booking[0]->from_location == 1 ? 'Port Blair' : ($single_booking[0]->from_location == 2 ? 'Havelock' : 'Neil'  ) }} </span> </h3>
            
                                <h3 style="padding-left: 15px;font-family:'Cambria', serif;font-size:11.5px;">To Location: <span style="padding-left:15px ">
                                    {{ $single_booking[0]->to_location == 1 ? 'Port Blair' : ($single_booking[0]->to_location == 2 ? 'Havelock' : 'Neil'  ) }} </span> </h3>

                                <h3 style="padding-left: 15px;font-family:'Cambria', serif;font-size:11.5px;">Journey Date: <span style="padding-left:15px ">
                                        {{ $single_booking[0]->date_of_jurney }}
                                    </span> </h3>
                                {{-- <h5>Class: <span style="padding-left:15px "> {{ucfirst($single_booking[0]->ferry_class)}}  </span>  </h5> --}}
                            </td>
                            <td style="border: 1px solid #e5e5e5;">{{ $single_booking[0]->no_of_passenger }}</td>
                            <td style="border: 1px solid #e5e5e5">{{ $single_booking[0]->amount }}</td>
                        </tr>
                        <tr style="border: 2px solid #e5e5e5;">
                            <td style="border: 1px solid #e5e5e5; width:80% ; text-align:left">Subtotal:</td>
                            <td style="border: 1px solid #e5e5e5;"></td>
                            <td style="border: 1px solid #e5e5e5">{{ $single_booking[0]->amount }} </td>
                        </tr>

        @endif


        {{-- ********************* if return trip abook then show eturn details ***************** --}}
        @if (!empty($trip2_booking_id))
            <?php
            $trip2_booking_id = DB::table('booking as b')
            ->leftJoin('booking_passenger_details as bpd', 'bpd.booking_id', '=', 'b.id')
            ->leftJoin('pnr_status as ps', 'ps.booking_id', '=', 'b.id')
            ->where('b.id', $trip2_booking_id)
            ->select('*')
            ->get();
            ?>

            {{-- *** for makruzz only send link ***** --}}
            @if ($trip2_booking_id[0]->booking_vendor == 'Makruzz')
                @if (empty($greet))
                <div style="text-align: center; padding:10px">
                    <h2 style="color: #1592eb;font-family:'Cambria', serif;font-size:11.5px; margin:10px">Andaman Love</h2>
                    <div
                        style="text-align: center; display: inline-block; background: #44707e; color: #FFF;font-family:'Cambria', serif;font-size:11.5px; padding: 5px 45px; border-radius: 5px;">
                        <P>FerryTicket</P>
                    </div>
                </div>

                    <h3 style="font-family:'Cambria', serif;font-size:11.5px;">Dear {{ $single_booking[0]->c_name }}, </h3>
                    <h3 style="font-family:'Cambria', serif;font-size:11.5px;">Greetings!</h4>
                    <h3 style="font-family:'Cambria', serif;font-size:11.5px;">Thank you for choosing Andaman Love for your ferry booking. We are excited to be a part of your journey!</h3>
                    <h3 style="font-family:'Cambria', serif;font-size:11.5px;">Please find the ferry tickets as per your recent booking.</h3>
                    <h3 style="font-family:'Cambria', serif;font-size:11.5px;">When at Havelock Island (Swaraj Dweep) do visit <a href="https://www.tripadvisor.in/Restaurant_Review-g503691-d9681420-Reviews-Something_Different_A_beachside_Cafe-Havelock_Island_Andaman_and_Nicobar_Islands.html">Something Different – a beachside café</a>, the highest rated restaurant at Havelock on <a href="https://www.tripadvisor.com/">tripadivsor.com</a></h3>
                    <h3 style="font-family:'Cambria', serif;font-size:11.5px;">In case you need any assistance with booking transfers, sightseeing, water sports activities or your entire package, please feel free to get in touch with our team and we shall be more than happy to assist you.</h3>

                    <h3>{{ $trip2_booking_id[0]->from_location == 1 ? 'Port Blair' : ($trip2_booking_id[0]->from_location == 2 ? 'Havelock (Swaraj Dweep)' : 'Neil (Shaheed Dweep)'  ) }}
                        to {{ $trip2_booking_id[0]->to_location == 1 ? 'Port Blair' : ($trip2_booking_id[0]->to_location == 2 ? 'Havelock (Swaraj Dweep)' : 'Neil (Shaheed Dweep)'  ) }}
                        : {{ $trip2_booking_id[0]->pnr_id }}</h3>

                    <?php $pnr_id = $trip2_booking_id[0]->pnr_id ?? ''; ?>
                    <h4>{{ 'https://makruzz.com/OnlineUserSeatSelection/print_ticket/' . $pnr_id }}</h4>
                    <h3 style="font-family:'Cambria', serif;font-size:11.5px;">Please go through the ticket(s) for accuracy of the travel and booking information. We request you to use the PNR number for any further communication with our team</h3>
                    <h3 style="font-family:'Cambria', serif;font-size:11.5px;">If you require any assistance, feel free to contact us. We are here to help.</h3>
                    <h3 style="font-family:'Cambria', serif;font-size:11.5px;">Safe travels!</h4>
                    <h3 style="font-family:'Cambria', serif;font-size:11.5px;">Best regards,</h3>
                    <h4 style="color:red;font-family:'Cambria', serif;font-size:11.5px;">*Please note, this email is sent from an unmonitored address. For assistance, kindly reach out to us using the contact details provided in the signature below:</h4>
                    <h4 style="color:red;font-family:'Cambria', serif;font-size:11.5px;">*You will receive an sms with seat selection link from makruzz 48 hours prior to your journey date on the same number which you have provided at the time of booking the tickets on the website. Kindly use the link to select the seats as per your preference. Seat selection is beyond our control.</h4>
                @endif
            @else
                {{-- ****** for all ship except Makruzzz/Nautika ******** --}}
                <tr>
                    <td style="border: 1px solid #e5e5e5; width:70% ; text-align:left">
                        <h3 style="text-align: center">Round 2 Trip Details</h3>
                        <h3 style="padding-left: 15px;">Booking For: <span style="padding-left:15px ">
                                {{ ucfirst($trip2_booking_id[0]->type) }} </span> </h3>
                        <h3 style="padding-left: 15px;">Boat/Vessel: <span style="padding-left:15px ">
                                {{ ucfirst($trip2_booking_id[0]->ship_name) }} </span> </h3>
                        <h3 style="padding-left: 15px;">Ferry Class: <span style="padding-left:15px">
                            @if($trip2_booking_id[0]->ferry_class =='bClass')
                                {{ucfirst('Luxury')}}
                            @elseif ($trip2_booking_id[0]->ferry_class =='pClass')
                                {{ucfirst('Royal')}}
                            @endif
                        </span></h3>
                        <h3 style="padding-left: 15px;font-family:'Cambria', serif;font-size:11.5px;">No of person: <span style="padding-left:15px">{{ ucfirst($trip2_booking_id[0]->no_of_passenger) }}</span></h3>
                        <h3 style="padding-left: 15px;font-family:'Cambria', serif;font-size:11.5px;">Start time: <span style="padding-left:15px">{{ ucfirst($trip2_booking_id[0]->departure_time) }}</span></h3>
                        <h3 style="padding-left: 15px;font-family:'Cambria', serif;font-size:11.5px;">End time: <span style="padding-left:15px">{{ ucfirst($trip2_booking_id[0]->arrival_time) }}</span></h3>
                        {{-- <h5>From Location: <span style="padding-left:15px ">
                                {{ ucfirst($trip2_booking_id[0]->from_location) }} </span> </h5>
                        <h5>To Location: <span style="padding-left:15px ">
                                {{ ucfirst($trip2_booking_id[0]->to_location) }} </span> </h5> --}}
                        
                        <h3 style="padding-left: 15px;font-family:'Cambria', serif;font-size:11.5px;">From Location: <span style="padding-left:15px ">
                            {{ $trip2_booking_id[0]->from_location == 1 ? 'Port Blair' : ($trip2_booking_id[0]->from_location == 2 ? 'Havelock' : 'Neil'  ) }} </span> </h3>
    
                        <h3 style="padding-left: 15px;font-family:'Cambria', serif;font-size:11.5px;">To Location: <span style="padding-left:15px ">
                            {{ $trip2_booking_id[0]->to_location == 1 ? 'Port Blair' : ($trip2_booking_id[0]->to_location == 2 ? 'Havelock' : 'Neil'  ) }} </span> </h3>

                        <h3 style="padding-left: 15px;font-family:'Cambria', serif;font-size:11.5px;">Round 2 Date: <span style="padding-left:15px ">
                                {{ $trip2_booking_id[0]->date_of_jurney }} </span> </h3>
                        {{-- <h5>Class: <span style="padding-left:15px "> {{ucfirst($trip2_booking_id[0]->ferry_class)}}  </span>  </h5> --}}

                    </td>
                    <td style="border: 1px solid #e5e5e5">{{ $trip2_booking_id[0]->no_of_passenger }}</td>
                    <td style="border: 1px solid #e5e5e5">{{ $trip2_booking_id[0]->amount }}</td>
                </tr>
                <tr style="border: 2px solid #e5e5e5;">
                    <td style="border: 1px solid #e5e5e5; width:80% ; text-align:left">Subtotal:</td>
                    <td style="border: 1px solid #e5e5e5;"></td>
                    <td style="border: 1px solid #e5e5e5">{{ $trip2_booking_id[0]->amount }} </td>
                </tr>
            @endif
        @endif
        {{-- *************end round 2 trip details --}}

        {{-- ********* Round 3 Trip details --}}

        @if (!empty($trip3_booking_id))
            <?php
            $trip3_booking_id = DB::table('booking as b')
            ->leftJoin('booking_passenger_details as bpd', 'bpd.booking_id', '=', 'b.id')
            ->leftJoin('pnr_status as ps', 'ps.booking_id', '=', 'b.id')
            ->where('b.id', $trip3_booking_id)
            ->select('*')
            ->get();

            ?>

            {{-- *** for makruzz only send link ***** --}}
            @if ($trip3_booking_id[0]->booking_vendor == 'Makruzz')
                @if (empty($greet))
                <div style="text-align: center; padding:10px">
                    <h2 style="color: #1592eb;font-family:'Cambria', serif;font-size:11.5px; margin:10px">Andaman Love</h2>
                    <div
                        style="text-align: center; display: inline-block; background: #44707e; color: #FFF;font-family:'Cambria', serif;font-size:11.5px; padding: 5px 45px; border-radius: 5px;">
                        <P>FerryTicket</P>
                    </div>
                </div>

                    <h3 style="font-family:'Cambria', serif;font-size:11.5px;">Dear {{ $single_booking[0]->c_name }}, </h3>
                    <h3 style="font-family:'Cambria', serif;font-size:11.5px;">Greetings!</h4>
                    <h3 style="font-family:'Cambria', serif;font-size:11.5px;">Thank you for choosing Andaman Love for your ferry booking. We are excited to be a part of your journey!</h3>
                    <h3 style="font-family:'Cambria', serif;font-size:11.5px;">Please find the ferry tickets as per your recent booking.</h3>
                    <h3 style="font-family:'Cambria', serif;font-size:11.5px;">When at Havelock Island (Swaraj Dweep) do visit <a href="https://www.tripadvisor.in/Restaurant_Review-g503691-d9681420-Reviews-Something_Different_A_beachside_Cafe-Havelock_Island_Andaman_and_Nicobar_Islands.html">Something Different – a beachside café</a>, the highest rated restaurant at Havelock on <a href="https://www.tripadvisor.com/">tripadivsor.com</a></h3>
                    <h3 style="font-family:'Cambria', serif;font-size:11.5px;">In case you need any assistance with booking transfers, sightseeing, water sports activities or your entire package, please feel free to get in touch with our team and we shall be more than happy to assist you.</h3>

                    <h3>{{ $trip3_booking_id[0]->from_location == 1 ? 'Port Blair' : ($trip3_booking_id[0]->from_location == 2 ? 'Havelock (Swaraj Dweep)' : 'Neil (Shaheed Dweep)'  ) }}
                        to {{ $trip3_booking_id[0]->to_location == 1 ? 'Port Blair' : ($trip3_booking_id[0]->to_location == 2 ? 'Havelock (Swaraj Dweep)' : 'Neil (Shaheed Dweep)'  ) }}
                        : {{ $trip3_booking_id[0]->pnr_id }}</h3>

                    <?php $pnr_id = $trip3_booking_id[0]->pnr_id ?? ''; ?>
                    <h4>{{ 'https://makruzz.com/OnlineUserSeatSelection/print_ticket/' . $pnr_id }}</h4>
                    <h3 style="font-family:'Cambria', serif;font-size:11.5px;">Please go through the ticket(s) for accuracy of the travel and booking information. We request you to use the PNR number for any further communication with our team</h3>
                    <h3 style="font-family:'Cambria', serif;font-size:11.5px;">If you require any assistance, feel free to contact us. We are here to help.</h3>
                    <h3 style="font-family:'Cambria', serif;font-size:11.5px;">Safe travels!</h4>
                    <h3 style="font-family:'Cambria', serif;font-size:11.5px;">Best regards,</h3>
                    <h4 style="color:red;font-family:'Cambria', serif;font-size:11.5px;">*Please note, this email is sent from an unmonitored address. For assistance, kindly reach out to us using the contact details provided in the signature below:</h4>
                    <h4 style="color:red;font-family:'Cambria', serif;font-size:11.5px;">*You will receive an sms with seat selection link from makruzz 48 hours prior to your journey date on the same number which you have provided at the time of booking the tickets on the website. Kindly use the link to select the seats as per your preference. Seat selection is beyond our control.</h4>
                @endif
            @else


                {{-- ****** for all ship except Makruzzz/Nautika ******** --}}
                <tr>
                    <td style="border: 1px solid #e5e5e5; width:70% ; text-align:left">
                        <h3 style="text-align: center">Round 3 Trip Details</h3>
                        <h3 style="padding-left: 15px;">Booking For: <span style="padding-left:15px ">
                                {{ ucfirst($trip3_booking_id[0]->type) }} </span> </h3>
                        <h3 style="padding-left: 15px;">Boat/Vessel: <span style="padding-left:15px ">
                                {{ ucfirst($trip3_booking_id[0]->ship_name) }} </span> </h3>

                        <h3 style="padding-left: 15px;">Ferry Class: <span style="padding-left:15px">
                            @if($trip3_booking_id[0]->ferry_class =='bClass')
                                {{ucfirst('Luxury')}}
                            @elseif ($trip3_booking_id[0]->ferry_class =='pClass')
                                {{ucfirst('Royal')}}
                            @endif
                        </span></h3>
                        <h3 style="padding-left: 15px;font-family:'Cambria', serif;font-size:11.5px;">No of person: <span style="padding-left:15px">{{ ucfirst($trip3_booking_id[0]->no_of_passenger) }}</span></h3>
                        <h3 style="padding-left: 15px;font-family:'Cambria', serif;font-size:11.5px;">Start time: <span style="padding-left:15px">{{ ucfirst($trip3_booking_id[0]->departure_time) }}</span></h3>
                        <h3 style="padding-left: 15px;font-family:'Cambria', serif;font-size:11.5px;">End time: <span style="padding-left:15px">{{ ucfirst($trip3_booking_id[0]->arrival_time) }}</span></h3>
                        {{-- <h5>From Location: <span style="padding-left:15px ">
                                {{ ucfirst($trip3_booking_id[0]->from_location) }} </span> </h5>
                        <h5>To Location: <span style="padding-left:15px ">
                                {{ ucfirst($trip3_booking_id[0]->to_location) }} </span> </h5>
                                 --}}

                       
                        <h3 style="padding-left: 15px;font-family:'Cambria', serif;font-size:11.5px;">From Location: <span style="padding-left:15px ">
                        {{ $trip3_booking_id[0]->from_location == 1 ? 'Port Blair' : ($trip3_booking_id[0]->from_location == 2 ? 'Havelock' : 'Neil'  ) }} </span> </h3>

                        <h3 style="padding-left: 15px;font-family:'Cambria', serif;font-size:11.5px;">To Location: <span style="padding-left:15px ">
                            {{ $trip3_booking_id[0]->to_location == 1 ? 'Port Blair' : ($trip3_booking_id[0]->to_location == 2 ? 'Havelock' : 'Neil'  ) }} </span> </h3>

                        <h3 style="padding-left: 15px;font-family:'Cambria', serif;font-size:11.5px;">Round 3 Date: <span style="padding-left:15px ">
                                {{ $trip3_booking_id[0]->date_of_jurney }} </span> </h3>
                        {{-- <h5>Class: <span style="padding-left:15px "> {{ucfirst($trip3_booking_id[0]->ferry_class)}}  </span>  </h5> --}}

                    </td>
                    <td style="border: 1px solid #e5e5e5">{{ $trip3_booking_id[0]->no_of_passenger }}</td>
                    <td style="border: 1px solid #e5e5e5">{{ $trip3_booking_id[0]->amount }}</td>
                </tr>
                <tr style="border: 2px solid #e5e5e5;">
                    <td style="border: 1px solid #e5e5e5; width:80% ; text-align:left">Subtotal:</td>
                    <td style="border: 1px solid #e5e5e5;"></td>
                    <td style="border: 1px solid #e5e5e5">{{ $trip3_booking_id[0]->amount }} </td>
                </tr>
            @endif
        @endif

        
        @if ($single_booking[0]->booking_vendor != 'Makruzz')

        <tr>
            <td style="border: 1px solid #e5e5e5 width:80%; text-align:left">Payment method:</td>
            <td style="border: 1px solid #e5e5e5;"></td>
            <td style="border: 1px solid #e5e5e5">phonepe</td>
        </tr>
        <tr style="border: 2px solid #000; padding:10px">
            <td style="border: 1px solid #e5e5e5 width:80%; text-align:center">Total:</td>
            <td style="border: 1px solid #e5e5e5;"></td>

            <?php $single_price = $single_booking[0]->amount ?? 0; ?>
            <?php $round_2_price = $trip2_booking_id[0]->amount ?? 0; ?>
            <?php $round_3_price = $trip3_booking_id[0]->amount ?? 0; ?>
            <?php $total_price = $single_price + $round_2_price + $round_3_price ?? 0; ?>

            <td style="border: 1px solid #e5e5e5">{{ $total_price }} </td>
        </tr>
        </tbody>
        </table>

        <div>
            <h4 style="color:#636363"> Passenger Details</h4>
            <table
                style="border: 3px solid #e5e5e5; text-align: center; align-items: center;border-collapse: collapse; width:100%; margin: 0 auto;">
                <thead>
                    <th style="border: 2px solid #e5e5e5; text-align: center;">SL</th>
                    <th style="border: 2px solid #e5e5e5; text-align: center;">Title</th>
                    <th style="border: 2px solid #e5e5e5; text-align: center;">Passenger Name</th>
                    <th style="border: 2px solid #e5e5e5; text-align: center;">Gender</th>
                    <th style="border: 2px solid #e5e5e5; text-align: center;">Age</th>
                    <th style="border: 2px solid #e5e5e5; text-align: center;">Trip Type</th>
                    <th style="border: 2px solid #e5e5e5; text-align: center;">Country</th>
                    <th style="border: 2px solid #e5e5e5; text-align: center;">Passport Id</th>
                    <th style="border: 2px solid #e5e5e5; text-align: center;">Expiry Date</th>
                </thead>
                <tbody>
                    <tr style="border: 2px solid #e5e5e5;">
                        <td style="text-align: center">Round 1</td>
                    </tr>
                    @foreach ($single_booking as $key => $row)
                        <tr style="border: 2px solid #e5e5e5; text-align: center;">
                            <td style="border: 2px solid #e5e5e5; text-align: center;"> {{ $key + 1 }}</td>
                            <td style="border: 2px solid #e5e5e5; text-align: center;">{{ $row->title }}</td>
                            <td style="border: 2px solid #e5e5e5; text-align: center;">{{ $row->full_name }}</td>
                            <td style="border: 2px solid #e5e5e5; text-align: center;">{{ $row->gender }}</td>
                            <td style="border: 2px solid #e5e5e5; text-align: center;">{{ $row->dob }}</td>
                            <td style="border: 2px solid #e5e5e5; text-align: center;">{{ $row->trip_type }}</td>
                            <td style="border: 2px solid #e5e5e5; text-align: center;">{{ $row->country }}</td>
                            <td style="border: 2px solid #e5e5e5; text-align: center;">{{ $row->passport_id }}</td>
                            <td style="border: 2px solid #e5e5e5; text-align: center;">{{ $row->expiry_date }}</td>
                        </tr>
                    @endforeach

                    @if (!empty($trip2_booking_id))
                        <tr style="border: 2px solid #e5e5e5;">
                            <td style="text-align: center">Round 2</td>
                        </tr>
                        @foreach ($trip2_booking_id as $key => $row)
                            <tr style="border: 2px solid #e5e5e5; text-align: center;">
                                <td style="border: 2px solid #e5e5e5; text-align: center;"> {{ $key + 1 }}
                                </td>
                                <td style="border: 2px solid #e5e5e5; text-align: center;">{{ $row->title }}</td>
                                <td style="border: 2px solid #e5e5e5; text-align: center;">{{ $row->full_name }}
                                </td>
                                <td style="border: 2px solid #e5e5e5; text-align: center;">{{ $row->gender }}</td>
                                <td style="border: 2px solid #e5e5e5; text-align: center;">{{ $row->dob }}</td>
                                <td style="border: 2px solid #e5e5e5; text-align: center;">{{ $row->trip_type }}
                                </td>
                                <td style="border: 2px solid #e5e5e5; text-align: center;">{{ $row->country }}</td>
                                <td style="border: 2px solid #e5e5e5; text-align: center;">{{ $row->passport_id }}
                                </td>
                                <td style="border: 2px solid #e5e5e5; text-align: center;">{{ $row->expiry_date }}
                                </td>
                            </tr>
                        @endforeach
                    @endif

                    @if (!empty($trip3_booking_id))
                        <tr style="border: 2px solid #e5e5e5;">
                            <td style="text-align: center">Round 3</td>
                        </tr>
                        @foreach ($trip3_booking_id as $key => $row)
                            <tr style="border: 2px solid #e5e5e5; text-align: center;">
                                <td style="border: 2px solid #e5e5e5; text-align: center;"> {{ $key + 1 }}
                                </td>
                                <td style="border: 2px solid #e5e5e5; text-align: center;">{{ $row->title }}
                                </td>
                                <td style="border: 2px solid #e5e5e5; text-align: center;">{{ $row->full_name }}
                                </td>
                                <td style="border: 2px solid #e5e5e5; text-align: center;">{{ $row->gender }}
                                </td>
                                <td style="border: 2px solid #e5e5e5; text-align: center;">{{ $row->dob }}
                                </td>
                                <td style="border: 2px solid #e5e5e5; text-align: center;">{{ $row->trip_type }}
                                </td>
                                <td style="border: 2px solid #e5e5e5; text-align: center;">{{ $row->country }}
                                </td>
                                <td style="border: 2px solid #e5e5e5; text-align: center;">{{ $row->passport_id }}
                                </td>
                                <td style="border: 2px solid #e5e5e5; text-align: center;">{{ $row->expiry_date }}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        @endif
    </div>

    <div>
        <h5 style="text-decoration: underline; margin-bottom:5px; font-size:15px"> Billing address </h5>
        <p style="margin:2px;font-family:'Cambria', serif;font-size:11.5px;">{{ $single_booking[0]->c_name }}</p>
        <p style="margin:2px;font-family:'Cambria', serif;font-size:11.5px;"> {{ $single_booking[0]->c_mobile }}</p>
        <p style="margin:2px;font-family:'Cambria', serif;font-size:11.5px;"> {{ $single_booking[0]->c_email }} </p>
    </div>
    {{-- <div>
        <h5 style="text-decoration: underline; margin-bottom:5px; font-size:18px"> Contact Details </h5>
        <p style="margin:2px">{{ 'info@andamanlove.com' }}</p>
        <p style="margin:2px"> {{ '9932081242' }}</p>
    </div>
    <div style="text-align: center">
        <h5>Thanks for using www.andamanlove.com</h5>
    </div> --}}

    <table style="margin-top: 30px;">
        <tr>
            <td style="width: 20%; padding-right: 20px;">
                <img src="https://www.andamanloveferrybooking.com/asset/img/andaman_logo.png" alt="" width="200px">
            </td>
            <td style="width: 80%; padding-left: 20px; border-left: 2px solid #BE1E2D;">
                <p><b>Team Andaman Love</b></p>
                <table>
                    <tr>
                        <td><img src="https://www.andamanloveferrybooking.com/asset/img/business-48.png" width="20px" alt=""></td>
                        <td><a href="mailto:info@andamanlove.com" style="color: #000;">info@andamanlove.com</a></td>
                    </tr>
                    <tr>
                        <td><img src="https://www.andamanloveferrybooking.com/asset/img/phone-48.png" width="20px" alt=""></td>
                        <td><a href="tel:9932081242" style="color: #000;">9932081242</a></td>
                    </tr>
                    <tr>
                        <td><img src="https://www.andamanloveferrybooking.com/asset/img/cellphone-60.png" width="20px" alt=""></td>
                        <td><a href="tel:8900911813" style="color: #000;">8900911813</a></td>
                    </tr>
                    <tr>
                        <td><img src="https://www.andamanloveferrybooking.com/asset/img/marker-50.png" width="20px" alt=""></td>
                        <td>No: 38, 3rd Floor, Junglighat, South Andaman, Port Blair - 744101 (Andaman Islands, India)</td>
                    </tr>
                    <tr>
                        <td><img src="https://www.andamanloveferrybooking.com/asset/img/link-64.png" width="20px" alt=""></td>
                        <td><a href="www.andamanlove.com" style="color: #BE1E2D;" target="_blank">andamanlove.com</a></td>
                    </tr>
                    <tr>
                        <td>
                            <a href="https://www.facebook.com/AndamanLove.always?mibextid=LQQJ4d" target="_blank"><img src="https://www.andamanloveferrybooking.com/asset/img/facebook-50.png" width="30px"></a>
                        </td>
                        <td>
                            <a href="https://www.instagram.com/andaman.love/?igsh=MWJlYjZtYWtjMHJ1dg%3D%3D" target="_blank"><img src="https://www.andamanloveferrybooking.com/asset/img/instagram-50.png" width="30px"></a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <p style="color: 14px;">The content of this email is confidential and intended for the recipient specified in message only. It is strictly forbidden to share any part of this message with any third party, without a written consent of the sender. If you received this message by mistake, please reply to this message and follow with its deletion, so that we can ensure such a mistake does not occur in the future.</p>

    </div>

</body>
</html>
