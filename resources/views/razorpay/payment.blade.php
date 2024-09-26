
@extends('layouts.layout')

@section('content')

{{-- <input type="hidden" id="user_id"  value="{{$user_id}}"> --}}
<input type="hidden" name="order_id" id="order_id" value="{{$order_id}}">
{{-- <input type="hidden" name="booking_id" id="booking_id" value="{{ $lastferryInsertedId }}">
<input type="hidden" name="return_booking_id" id="return_booking_id" value="{{ $lastReturnferryInsertedId }}"> --}}

<div class="text-center my-5 pt-5">
    <div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
</div>

@if(Session::has('total_amount'))
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        
        var main_url = $("#main_url").val();
        // var booking_id = $("#booking_id").val();
        var order_id = $('#order_id').val();
      
        var options = {
            "key": "{{env("RAZOR_KEY_ID")}}",
            "amount": "{{Session::get('total_amount')}}",
            "currency": "INR",
            "name": "Booking",
            "description": "Andaman Love",
            "image": "https://www.andamanloveferrybooking.com/asset/img/andaman_logo.svg",
            "order_id": "{{Session::get('order_id')}}",
            // "callback_url": "{{ url('/payment-response') }}",
               "callback_url": "{{ url('/payment-response') }}/" + order_id,
        
            "modal": {
                "ondismiss": function(){
                    // Redirect to the desired page when the modal is closed using the close button
                    window.location.replace("{{ route('payment-failed') }}");
                }
            },

            "prefill": {
                "name": "{{Session::get('user_name')}}",
                "email": "{{Session::get('user_email')}}",
                "contact": "{{Session::get('user_phone')}}"
            },
            "notes": {
                "address": "Razorpay Corporate Office"
            },
            "theme": {
                "color": "#3399cc"
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.on('payment.failed', function(response) {

        });
        // document.getElementById('rzp-button1').onclick = function(e){
        //     rzp1.open();
        //     e.preventDefault();
        // }
        $(document).ready(function() {
            rzp1.open();
        });
    </script>
    <input type="hidden" custom="Hidden Element" name="hidden">

    <style>
    .razorpay-container #razorpay-modal-close {
        display: none !important;
    }
    </style>
@endif

<script>
$(document).ready(function() {    
    // Show the loader when the page is ready
    $(".loaderBG").addClass("show");
    
    // Hide the loader after 20 seconds
    setTimeout(function() {
        console.log("Hiding loader.");
        $(".loaderBG").removeClass("show");
    }, 60000); // Adjust time as needed
});
</script>

@endsection
