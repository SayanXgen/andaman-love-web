<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Andaman Love</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('asset/img/favicon.png') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
  <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.0/css/font-awesome.css" crossorigin="anonymous" referrerpolicy="no-referrer">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-N2BWS826');</script>
<!-- End Google Tag Manager -->
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N2BWS826"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

  <div class="loaderBG">
    <div class="text-center home-loader">
      <img src="{{ asset('asset/img/andaman_logo.svg') }}" alt="logo"> <br>
      <span class="loader mt-3"></span>
    </div>
  </div>
  
  <div class="d-block d-md-flex marquee_head justify-content-between align-items-center">
    <div>
      <a href="{{ route('home') }}"><img src="{{ asset('asset/img/andaman_logo.svg') }}" alt="logo" width="195" height="20"></a>
    </div>
    <marquee>
      Book your Ferry tickets with us and get <span>5% Credit</span> of the total booking amount (excluding PSF charges) which can be utilized against any other services from Andaman Love!
    </marquee>
  </div>
  <!--Navbar -->
  <main>

    @yield('content')

  </main>

  <footer class="mt-5 footer">
    <div class="container">
      <div class="row pt-5">
        <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
          <a href="{{ route('home') }}"><img src="{{ asset('asset/img/andaman_logo.svg') }}" alt="logo" width="180" height="30"></a>
          <div>
            <p class="mt-3">Subscribe to Newsletter</p>
            <div>
              <input type="text" name="c_email" class="form-control txttrans" id="c_email" placeholder="Email address">
              <span class="btn form-control subs"><a href="#">Subscribe</a></span>
            </div>
            <div class="mt-3">
              <p class="call"><a href="tel:9932081242"><img src="{{ asset('asset/img/blue_call_icon.svg') }}" alt="icon" class="img1" width="20" height="20"><span
                    class="ms-2">99320 81242</span></a></p>
            </div>
            <div class="social_icn">
              <p class="fw-bold">Follow Us</p>
              <a href="https://www.instagram.com/andaman.love/" target="_blank"><img src="{{ asset('asset/img/instagram_icon.svg') }}" alt="icon" width="20" height="20"></a>
              <a href="https://www.facebook.com/people/Andaman-Love/61560242045075/" target="_blank"><img src="{{ asset('asset/img/facebook_icon.svg') }}" alt="icon" width="13" height="20"></a>
              <a href="https://in.pinterest.com/andamanlove1/" target="_blank"><img src="{{ asset('asset/img/pinterest_icon.webp') }}" alt="icon" class="img1" width="20"  height="20"></a>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-2 mb-4 mb-lg-0 footer_head">
          <h2>Quick Links</h2>
          <ul class="p-0 mt-3">
            <li class="list-unstyled"><a href="https://www.andamanlove.com/about-us/">About Andaman Love</a></li>
            <li class="list-unstyled"><a href="https://www.andamanlove.com/packages/">All Package</a></li>
            <li class="list-unstyled"><a href="https://www.andamanlove.com/ferry-listing/">Ferry Listing</a></li>
            <li class="list-unstyled"><a href="https://www.andamanlove.com/experiences/">Experiences</a></li>
            <li class="list-unstyled"><a href="https://www.andamanlove.com/andaman-nicobar-hotels/">Hotels</a></li>
            <li class="list-unstyled"><a href="https://www.andamanlove.com/faq/">FAQ</a></li>
            <li class="list-unstyled"><a href="https://www.andamanlove.com/contact-us/">Contact Us</a></li>
          </ul>
        </div>

        <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0 footer_head">
          <h2>Popular tour packages</h2>
          <ul class="p-0 mt-3">
            <li class="list-unstyled"><a href="https://www.andamanlove.com/packages/5-nights-6-days-andaman-honeymoon-package/">5 Nights 6 Days Honeymoon Package</a></li>
            <li class="list-unstyled"><a href="https://www.andamanlove.com/packages/3-nights-4-days-andaman-package-for-honeymoon/">3 Nights 4 Days Honeymoon Package</a></li>
            <li class="list-unstyled"><a href="https://www.andamanlove.com/packages/4-nights-5-days-andaman-package-for-honeymoon/">4 Night 5 Days Honeymoon Package</a></li>
            <li class="list-unstyled"><a href="https://www.andamanlove.com/packages/havelock-island-tour-package-for-family/">Havelock Island Family Package</a></li>
            <li class="list-unstyled"><a href="https://www.andamanlove.com/packages/7-nights-8-days-andaman-package-for-family/">7 Nights 8 Days Family Package</a></li>
            <li class="list-unstyled"><a href="https://www.andamanlove.com/packages/port-blair-to-diglipur-andaman-tour-package/">Port Blair to Diglipur Package</a></li>
            <li class="list-unstyled"><a href="https://andamanlove.com/packages/9-nights-10-days-andaman-package/">9 Nights 10 Days Package</a></li>
          </ul>
        </div>
        <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0 footer_head">
          <h2>Popular experiences</h2>
          <ul class="p-0 mt-3">
            <li class="list-unstyled"><a href="https://www.andamanlove.com/experiences/parasailing-in-andaman-nicobar-island/">Parasailing in Andaman</a></li>
            <li class="list-unstyled"><a href="https://www.andamanlove.com/experiences/scuba-diving-in-andaman-at-havelock-island/">Scuba Diving in Andaman</a></li>
            <li class="list-unstyled"><a href="https://www.andamanlove.com/experiences/island-hopping-in-andaman-nicobar-island/">Island Hopping in Andaman</a></li>
            <li class="list-unstyled"><a href="https://www.andamanlove.com/experiences/trip-to-kalapathar-beach-sunrise-andaman-nicobar-island/">Kalapathar Beach Sunrise</a></li>
            <li class="list-unstyled"><a href="https://www.andamanlove.com/experiences/sea-walk-in-andaman-at-havelock/">Sea Walk in Andaman</a></li>
            <li class="list-unstyled"><a href="https://www.andamanlove.com/experiences/speed-boat-ride-in-andaman-at-havelock/">Speed Boat Ride in Andaman</a></li>
            <li class="list-unstyled"><a href="https://www.andamanlove.com/experiences/kayaking-in-andaman-at-havelock-port-blair/">Kayaking in Andaman</a></li>
          </ul>
        </div>

      </div>
    </div>
    <div class="footer_end mt-5">
      <div class="container">
        <div class="row text-center text-lg-start">
          <div class="col-lg-4 footerendA">© Andaman Love {{ date('Y') }} All Right Reserved</div>
          <div class="col-lg-2 footerendA"><a href="https://www.andamanlove.com/terms-of-use/">Terms of Use</a></div>
          <div class="col-lg-2 footerendA"><a href="https://www.andamanlove.com/cancellation-policy/">Cancellation Policy</a></div>
          <div class="col-lg-2 footerendA"><a href="https://www.andamanlove.com/privacy-policy/">Privacy Policy</a></div>
          <div class="col-lg-2 footerendA"><a href="{{ route('ticket-cancellation-route') }}">Request Cancellation</a></div>
        </div>
      </div>
    </div>
  </footer>

  @yield('filter')
  
  @yield('booking')

<script href="{{ asset('asset/js/jquery.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="" crossorigin="anonymous"></script>
<script href="{{ asset('asset/js/owl.carousel.min.js') }}" integrity="" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

@stack('js')

<script>
  document.addEventListener('scroll', function (e) {
      if (window.scrollY > 200) {
          $("#payment").addClass("stick");

      } else {
          $("#payment").removeClass("stick");

      }
  });
</script>

<script>
    $(".tabBtn1").addClass("active");
    $(".tabs1").css("opacity", "1");

    $(".tabBtn").click(function () {
      $(this).siblings().removeClass("active");
      $(this).addClass("active");

      var bannerTab = $(".tabBtn.active").data("list");

      $(".tabs").css({ "opacity": "0", "z-index": "-1" });
      $(".tabs" + bannerTab + " ").css({ "opacity": "1", "z-index": "999" });
    });


    $(".delete").click(function () {

      $(this).parent().parent(".row").addClass("hide");
    })

    $(".tabBtn2").click(function () {
      $(".bk_with_us ").addClass("marginSec");
    })
    $(".tabBtn1").click(function () {
      $(".bk_with_us").removeClass("marginSec");
    });
</script>

</body>
</html>