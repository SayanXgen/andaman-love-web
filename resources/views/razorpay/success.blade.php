@extends('layouts.layout')

@section('content')
<style>
.bannerBtns .btn:hover {
    background-color: #be1e2d;
}
</style>
<div class="container ">
  <form action="{{ url('/ticket_generate') }}" method="post" target="_blank">
    @csrf
    <input type="hidden" name="booking_id" id="booking_id" value="{{$booking_id}}">
    <input type="hidden" name="trip2_booking_id" id="return_booking_id" value="{{$trip2_booking_id}}">
    <input type="hidden" name="trip3_booking_id" id="return_booking_id" value="{{$trip3_booking_id}}">
      <div class="row secHead mt-5 py-3">
          <div class="col-12 text-center">
              <i class="bi bi-check2-circle text-success" style="font-size: 80px;"></i>
          </div>
          <div class="col-12 text-center">
              <h2>Ticket Booked Successfully</h2>
              <h3>{{ $order_id }}</h3>
          </div>
      </div>
      <div class="row justify-content-center mt-3">
          <div class="col-12 col-md-8 col-lg-4 bannerBtns text-center">
              <button class="btn m-auto subs text-white" style="width: 140px; height: 40px;">Print</button>
          </div>
      </div>
  </form>
</div>
   
@endsection