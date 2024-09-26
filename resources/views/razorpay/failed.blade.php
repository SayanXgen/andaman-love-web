@extends('layouts.layout')

@section('content')
<style>
.bannerBtns .btn:hover {
    background-color: #be1e2d;
}
</style>
<div class="container ">
      <div class="row secHead mt-5 py-3">
          <div class="col-12 text-center">
              <i class="bi bi-exclamation-triangle text-danger" style="font-size: 80px;"></i>
          </div>
          <div class="col-12 text-center">
              <h2>Payment Failed</h2>
          </div>
          <div class="col-12 text-center">
             <a class="btn btn-primary" href="{{ route('home') }}" style="padding: 7px 25px;">Back</a>
          </div>
      </div>
  </form>
</div>
   
@endsection