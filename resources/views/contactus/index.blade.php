@extends('layouts.app')

@section('content')
<main>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageHead">
                    <h1>Contact Us</h1>
                    @if($errors->any())
                    <h4>{{$errors->first()}}</h4>
                    @endif
                    @if (Session::has('msg'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! Session::get('msg') !!}</li>
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-8">
                <!-- <from class="" id="contactus_form" name="contactus_form" method="POST" action="{{ url('contact-us-save') }}"> -->
                <form class="row contactCard" id="contactus_form" name="contactus_form" method="POST" action="{{ url('contact-us-save') }}">
                    @csrf
                    <div class="col-12 ">
                        <div class="sectionHead ">
                            <h2 class="my-0">Drop us a line</h2>
                            <p class="text-muted">Please feel free to contact us if you have any further concerns.
                            </p>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="name" class="from-label">Your Name<span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Write Here...">
                        <span class="text-danger d-none error-msg" id="name_error">This field is required.</span>
                    </div>
                    <div class="col-12 col-lg-6 mb-3">
                        <label for="email" class="from-label">Your Email<span class="text-danger">*</span></label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Write Here...">
                        <span class="text-danger d-none error-msg" id="email_error">This field is required.</span>
                    </div>
                    <div class="col-12 col-lg-6 mb-3">
                        <label for="mobile" class="from-label">Your Mobile<span class="text-danger">*</span></label>
                        <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Write Here..." oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1').replace(/(\.\d\d)\d/g, '$1');" maxlength="10">
                        <span class="text-danger d-none error-msg" id="mobile_error">This field is required.</span>
                    </div>
                    <div class="col-12 ">
                        <label for="mobile" class="from-label">Your Message</label>
                        <textarea name="message" id="message" class="form-control" placeholder="Write Here..." cols="30" rows="5"></textarea>
                    </div>
                    <div class="col-12 mt-4 text-end">
                        <button class="btn button" type="submit" id="send_btn" name="send_btn">SEND</button>
                    </div>
                </form>
            </div>
            <div class="col-12 col-lg-4">
                <div class="row contactCard">
                    <div class="col-12 ">
                        <div class="sectionHead text-center">
                            <h2 class="my-0">Contact Info</h2>
                            <p class="text-muted">Available 24/7
                            </p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="contactInfo ">
                            <h3 class="my-0">Office Address</h3>
                            <p>Please feel free to contact us if you have any further concerns.
                            </p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="contactInfo ">
                            <h3 class="my-0"> Address</h3>
                            <p>Please feel free to contact us if you have any further concerns.
                            </p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="contactInfo border-0 mb-0 d-flex align-items-center ">
                            <i class="bi bi-envelope-at"></i>
                            <p class="ms-2 fw-bold">info@pristineandaman.com
                            </p>
                        </div>
                        <div class="contactInfo  d-flex align-items-center ">
                            <i class="bi bi-telephone"></i>
                            <p class="ms-2 fw-bold">+919932087719 <span class="fw-normal" style="font-size: 12px;">(9:30 am to 8:00 pm)</span>
                            </p>
                        </div>
                    </div>

                    <div class="col-12  d-flex align-items-center justify-content-around socialIcon text-end">
                        <a href="" class="ms-0"><i class="bi bi-facebook"></i></a>
                        <a href="" class="ms-0"><i class="bi bi-twitter-x"></i></a>
                        <a href="" class="ms-0"><i class="bi bi-instagram"></i></a>
                        <a href="" class="ms-0"><i class="bi bi-youtube"></i></a>
                    </div>

                </div>
            </div>
        </div>

    </div>
</main>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        // alert();
    })
    $("#contactus_form").submit(function(e) {
        $(".error-msg").addClass('d-none');
        var name = $("#name").val();
        var email = $("#email").val();
        var mobile = $("#mobile").val();
        var message = $("#message").val();
        var error = 0;
        if ($.trim(name) == '') {
            $("#name_error").removeClass('d-none');
            error++;
            //return false;
        }
        if ($.trim(mobile) == '') {
            $("#mobile_error").removeClass('d-none');
            error++;
            //return false;
        } else {
            var filter = /^\d*(?:\.\d{1,2})?$/;
            if (!filter.test(mobile)) {
                error++;
                $("#mobile_error").removeClass('d-none').text('Incorrect mobile number.');
                //return false;
            } else if (mobile.length != 10) {
                error++;
                $("#mobile_error").removeClass('d-none').text('Incorrect mobile number.');
                //return false;
            }
        }
        if ($.trim(email) == '') {
            $("#email_error").removeClass('d-none');
            error++;
            //return false;
        } else {
            var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
            if (!testEmail.test(email)) {
                $("#email_error").removeClass('d-none').text('Invalid email format.');
                error++;
                //return false;
            }
        }
        if (error == 0) {
            $(this).submit();
        } else {
            return false;
        }
    });
</script>
@endpush