@extends('layouts.app')

@section('content')
<section class="blogs my-5 pt-3">
    <div class="row secHead w-100 m-0">
        <div class="col-12 text-center subPage">
            <h2>Cancellation & Refund Policy</h2>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="secHead mt-4 mb-3">
                    <h3>Cancellation Charges:</h3>
                </div>
                <ul>
                    <li>Cancellation made more than 48 hours prior to departure: Rs. 200 per passenger (No
                        charges for kids below 1 year).</li>
                    <li>Cancellation made more than 24 hours but less than 48 hours prior to departure: 50% of
                        the fare collected will be refunded.</li>
                    <li>
                        Cancellation made within 24 hours of departure: No refund will be given.
                    </li>
                </ul>
                <div class="secHead mt-4 mb-3">
                    <h3>Refund Process:</h3>
                </div>
                <ul>
                    <li>
                        Any refund amount will be credited back to the same account used for the booking.
                    </li>
                </ul>
                <p>Please note that the cancellation policy and charges mentioned above are applicable to all
                    bookings.</p>
            </div>
        </div>
    </div>
</section>

@endsection