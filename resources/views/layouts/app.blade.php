<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('assets/images/favicon.ico') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" integrity="" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
   
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

</head>

<body>
    <div class="overlay"></div>
    <div class="ad text-center py-2 text-white">
        <p class="m-0"> FLAT Rs 100/- OFF ON ALL FERRY BOOKINGS (ONLY FOR NAUTIKA & MAKRUZZ)</p>
    </div>
    <header>
        <nav class="navbar navbar-expand-lg py-0">
            <div class="container-fluid justify-content-between flex-row-reverse flex-lg-row">
                <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('assets/images/logo.png') }}" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="bi bi-view-list" id="menu"></i>
                    <i class="bi bi-x-lg" id="menuclose"></i>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link menuBtn active" aria-current="page" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menuBtn" href="{{ url('/#blog') }}">Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menuBtn" href="{{ url('/about') }}">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menuBtn" href="{{ url('/#faq') }}">FAQs</a>
                        </li>

                        {{-- @if (Auth::check()) --}}
                        @if (session('user_name'))
                        <li class="nav-item ms-md-3">
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                                @csrf
                                <a href="#" style="text-decoration: none" id="logout">
                                    <img src="{{ asset('assets/images/logout-svgrepo-com.png') }}" alt="" class="me-2" style="width:32px">
                                    <?php $user = Auth::user(); ?>

                                    <?php $user_name = $user->name ?? 'Users'; ?>
                                    <span style="color: #FFF;">{{ $user_name }}</span>
                                </a>
                            </form>
                        </li>
                        @else
                        <li class="nav-item ms-md-3">
                            <a class="nav-link d-flex align-items-center btn rounded-0" data-bs-toggle="modal" data-bs-target="#loginModal">
                                <img src="{{ asset('assets/images/profile-demo.svg') }}" alt="" class="me-2">
                                Agent Login
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    @yield('content')
    <footer class="desktop mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <a href=""><img src="{{ asset('assets/images/logo.png') }}" width="180px" alt=""></a>
                </div>
                <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <h2>Contact Us</h2>
                    <ul class="p-0">
                        <li class="list-unstyled">Address:</li>
                        <li class="list-unstyled">Near old electricity Office, Haddo Ward No. 2, Port Blair, South
                            Andaman, Andaman & Nicobar Islands, India - 744102</li>
                        <li class="list-unstyled">
                            <p class="mb-0">
                                <a class="text-decoration-none text-white" href="mailto: asmithatourandtravels22@gmail.com">bookmyferry@gmail.com</a>
                            </p>
                        </li>

                        <li class="list-unstyled"><a href="tel:+91 9933215711" class="text-decoration-none text-white">+91 9933752444</a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <h2>Recent Posts</h2>
                    <ul class="p-0">
                        <li class="list-unstyled">7 Reasons to Choose Makana Charters for your Na Pali Coast Cruise
                        </li>
                        <li class="list-unstyled">The Honu (Sea Turtle) and Its Importance to Hawaii</li>
                        <li class="list-unstyled">6 Tips for Photographing the Na Pali Coast</li>
                    </ul>
                </div>
                <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0 footer_links">
                    <h2>Quick Links</h2>
                    <ul class="p-0">
                        <li class="list-unstyled"> <a href="{{ url('/about') }}">About Us </a> </li>
                        <li class="list-unstyled"> <a href="{{ url('/terms-and-conditions') }}">Terms and Conditions
                            </a></li>
                        <li class="list-unstyled"> <a href="{{ url('/privacy-policy') }}">Privacy and Policies</a>
                        </li>
                        <li class="list-unstyled"> <a href="{{ url('/cancellation-refund') }}">Refund Policies</a>
                        </li>
                        <li class="list-unstyled"> <a href="{{ url('/ticket-cancellation-request') }}">Booking
                                Cancellation </a></li>
                    </ul>
                </div>
                <div class="col-12 d-flex align-items-center justify-content-end mt-4">
                    <a href="" class="me-2"><img src="images/instagram.svg" width="24px" alt=""></a>
                    <a href="" class="me-2"><img src="images/facebook.svg" width="24px" alt=""></a>
                    <a href=""><img src="images/youtube.svg" width="24px" alt=""></a>
                </div>
            </div>
        </div>
    </footer>
    <footer class="mobile mt-5">
        <div class="row">
            <div class="col-12 mb-4 text-center">
                <a href=""><img src="{{ asset('assets/images/logo.png') }}" width="180px" alt=""></a>
            </div>
            <div class="col-12">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                About Us
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="p-0">
                                    <li class="list-unstyled">Address:</li>
                                    <li class="list-unstyled">Near old electricity Office, Haddo Ward No. 2, Port Blair, South
                                        Andaman, Andaman & Nicobar Islands, India - 744102</li>
                                    <li class="list-unstyled">
                                        <p class="mb-0">
                                            <a class="text-decoration-none text-white" href="mailto: asmithatourandtravels22@gmail.com">bookmyferry@gmail.com</a>
                                        </p>
                                    </li>

                                    <li class="list-unstyled"><a href="tel:+91 9933215711" class="text-decoration-none text-white">+91 9933752444</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Recent Posts
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul class="p-0">
                                    <li class="list-unstyled">7 Reasons to Choose Makana Charters for your Na Pali
                                        Coast Cruise
                                    </li>
                                    <li class="list-unstyled">The Honu (Sea Turtle) and Its Importance to Hawaii
                                    </li>
                                    <li class="list-unstyled">6 Tips for Photographing the Na Pali Coast</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                Quick Links
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body footer_links">
                                <ul class="p-0">
                                    <li class="list-unstyled"> <a href="{{ url('/about') }}">About Us </a> </li>
                                    <li class="list-unstyled"> <a href="{{ url('/terms-and-conditions') }}">Terms and Conditions
                                        </a></li>
                                    <li class="list-unstyled"> <a href="{{ url('/privacy-policy') }}">Privacy and Policies</a>
                                    </li>
                                    <li class="list-unstyled"> <a href="{{ url('/cancellation-refund') }}">Refund Policies</a>
                                    </li>
                                    <li class="list-unstyled"> <a href="{{ url('/ticket-cancellation-request') }}">Booking
                                            Cancellation </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12 d-flex align-items-center justify-content-end mt-4">
                <a href="" class="me-2"><img src="{{ asset('assets/images/instagram.svg') }}" width="24px" alt=""></a>
                <a href="" class="me-2"><img src="{{ asset('assets/images/facebook.svg') }}" width="24px" alt=""></a>
                <a href=""><img src="{{ asset('assets/images/youtube.svg') }}" width="24px" alt=""></a>
            </div>
        </div>
    </footer>

    <!-- BOOKING SUMMARY MODAL -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Log In</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span id="error_msg" style="color: red"></span>
                    <form id="loginForm">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputpassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp">
                        </div>

                        {{-- <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">OTP</label>
                            <input type="number" class="form-control" pattern="\d*" maxlength="6" id="otp" style="display: none">
                        </div> --}}

                        {{-- <input type="hidden" name="boatScheduleId" id="boatScheduleId">
                        
                        <input type="hidden" name="ferryScheduleId" id="ferryScheduleId">
                        <input type="hidden" name="ferryclassId" id="ferryClassId"> --}}
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" id="login">Login</button>
                            {{-- <button type="button" class="btn btn-pr imary login-in-btn" style="display: none"
                                id="login">Login</button> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    {{-- <div class="modal fade" id="phoneVerificationModal" tabindex="-1" aria-labelledby="phoneVerificationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="">
                <div class="modal-header" style="background: #0076ae; color:#FFF">
                    <h5 class="modal-title" id="phoneVerificationModalLabel">Register to Procced</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Mobile Number Input -->
                    <div class="mb-3">
                        <label for="mobileNumber" class="form-label">Mobile Number</label>
                        <input type="text" class="form-control" id="mobileNumber" name="abc" placeholder="Enter mobile number" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);" required>
                        <div class="invalid-feedback">
                            Please enter a valid 10-digit mobile number.
                        </div>
                    </div>
                    <!-- OTP Input -->
                    <div class="mb-3" id="otpInput" style="display: none;">
                        <label for="otp" class="form-label">OTP</label>
                        <input type="text" class="form-control" id="otp" placeholder="Enter OTP">
                    </div>

                    <div class="mb-3" id="not_matched" style="display: none;">
                        <label class="form-label" style="color:#FF0000">OTP does not matched</label>
                    </div>

                    <div class="mb-3" id="otp_matched" style="display: none;">
                        <label for="otp" class="form-label" style=" color: #008000; border: 1px solid #008000; padding: 4px;
    border-radius: 3px">OTP Matched</label>
                    </div>
                    <button type="button" class="btn btn-primary" id="sendOTPButton">Send OTP</button>
                    <button type="button" class="btn btn-primary" id="verifyOTPButton" style="display: none;">Verify OTP</button>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Save</button> -->
                    <div class="btn " id="procced_button" style="display: none;">
                        <button type="button" id="procced_button" style="background: #0076ae; padding: 5px 25px; border-radius: 5px;">Procced</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div> --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ url('assets/js/script.js') }}?v=1"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    @stack('js')
    <script>
        $(document).ready(function() {
            $('#loginForm').on('submit', function(e) {
                e.preventDefault();
                var email = $("#email").val();
                var password = $("#password").val();

                sendDataViaAjax(email, password);
            });


            function sendDataViaAjax(email, password) {
                $.ajax({
                    url: "{{ url('login-check') }}",
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        email: email,
                        password: password
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.status == 'success') {
                            $('#loginModal').modal('hide');
                            window.location.reload();

                        } else {
                            $('#error_msg').text(response.error);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        // console.error(textStatus, errorThrown);
                    }
                });
            }

            $('#logout').on('click', function(e) {
                $.ajax({
                    url: "{{ url('logout') }}",
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            window.location.reload();
                            alert('Logout Successfull');
                        } else {
                            $('#error_msg').text(response.error);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        // console.error(textStatus, errorThrown);
                    }
                });

            })

        });
    </script>


</body>

</html>