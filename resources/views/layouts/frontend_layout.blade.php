<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dhaka Dreamin - @yield('title')</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  @php
    $setting = DB::table('settings')->where('id',1)->first();
  @endphp
  <link rel="shortcut icon" href="{{URL::to($setting->site_logo)}}" type="image/x-icon">

  <link href="{{URL::to($setting->site_logo)}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('/')}}public/frontend/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{asset('/')}}public/frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{asset('/')}}public/frontend/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{asset('/')}}public/frontend/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{asset('/')}}public/frontend/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="{{asset('/')}}public/frontend/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('/')}}public/frontend/assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{asset('/')}}public/frontend/assets/css/DateTimePicker.css">

  <!-- =======================================================
  * Template Name: Dhaka Dreamin
  * Template URL: https://bootstrapmade.com/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  @php
      $setting = DB::table('settings')->where('id', 1)->first();
  @endphp
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <div class="site-logo d-flex align-items-center">
        <a href="{{route('home')}}" class="logo">
          <img src="{{URL::to($setting->site_logo)}}" alt="">
        </a>
      </div>
      @php
          $menus = DB::table('menus')->where('id', 1)->first();
      @endphp
      <div class="navbar d-flex justify-content-center align-items-center d-lg-block d-xl-block d-md-none d-none">
        <ul>
          <li><a class="nav-link cool-link {{Request::is('service-center') ? 'active': ''}}" href="{{route('service-center')}}">{{$menus->menu1}}</a></li>
          <li><a href="{{route('reservation')}}" class="cool-link {{Request::is('search-for-reservation') || Request::is('reservation') ? 'active': ''}}">{{$menus->menu2}}</a></li>
          <li><a href="#" class="cool-link">{{$menus->menu3}}</a></li>
        </ul>
      </div>
      @php
          $customer_id = Session::get('customr_id');
          $customer_name = Session::get('customr_name');
          $customer_email = Session::get('customr_email');
          $customer_phone = Session::get('customr_phone');
      @endphp
      <div class="navbar right-menu d-flex justify-content-end align-items-center d-lg-block d-xl-block d-md-none d-none">
        <ul>

          <li><a href="{{route('about-us')}}" class="cool-link {{Request::is('about-us') ? 'active': ''}}">{{$menus->menu4}}</a></li>
          <li><a href="{{route('contact-us')}}" class="cool-link {{Request::is('contact-us') ? 'active': ''}}">{{$menus->menu5}}</a></li>
          @if ($customer_name == NULL)
            <li class="dropdown"><a href="#"><span>{{$menus->menu6}}</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                @if ($customer_id == NULL && $customer_name == NULL && $customer_email == NULL && $customer_phone == NULL)
                  <li><a href="{{route('signup')}}">Sign up</a></li>
                  <li><a href="{{route('customer-login')}}">Log in</a></li>
                @else
                <li><a href="{{route('customer-logout')}}">Logout</a></li>
                @endif
                <li><a href="#">Help</a></li>
              </ul>
            </li>
          @else
          <li class="dropdown"><a href="#"><span>{{$customer_name}}</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{route('customer-logout')}}">Logout</a></li>
              <li><a href="#">Help</a></li>
            </ul>
          </li>
          @endif
          
        </ul>
      </div>

      <nav id="navbar" class="navbar d-lg-none d-xl-none">
        <ul>
            <li><a class="nav-link {{Request::is('service-center') ? 'active':''}}" href="{{route('service-center')}}">{{$menus->menu1}}</a></li>
            <li><a class="nav-link {{Request::is('search-for-reservation') || Request::is('reservation') ? 'active':''}}" href="{{route('reservation')}}">{{$menus->menu2}}</a></li>
            <li><a class="nav-link" href="#">{{$menus->menu3}}</a></li>
            <li><a class="nav-link {{Request::is('about-us') ? 'active': ''}}" href="{{route('about-us')}}">{{$menus->menu4}}</a></li>
            <li><a class="nav-link {{Request::is('contact-us') ? 'active': ''}}" href="{{route('contact-us')}}">{{$menus->menu5}}</a></li>
            
            @if ($customer_name == NULL)
              <li class="dropdown"><a href="#"><span>{{$menus->menu6}}</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  @if ($customer_id == NULL && $customer_name == NULL && $customer_email == NULL && $customer_phone == NULL)
                  <li><a href="{{route('signup')}}">Sign up</a></li>
                  <li><a href="{{route('customer-login')}}">Log in</a></li>
                  @else
                  <li><a href="{{route('customer-logout')}}">Logout</a></li>
                  @endif
                  <li><a href="#">Help</a></li>
                </ul>
              </li>
            @else
            <li class="dropdown"><a href="#"><span>{{$customer_name}}</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="{{route('customer-logout')}}">Logout</a></li>
                <li><a href="#">Help</a></li>
              </ul>
            </li>
            @endif
            
          </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
    @yield('search_for_reservation')
  </header><!-- End Header -->

@yield('content')

  <div id="dtBox"></div><!-- End datepicker -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="container">
      <div class="social-links d-flex align-items-center justify-content-center">
        <a href="https://www.facebook.com/dhaka.dreamin" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="https://www.instagram.com/dhakadreamin/" target="_blank" class="instagram"><i class="bi bi-instagram bx bxl-instagram"></i></a>
        <a href="https://www.linkedin.com/company/dhaka-dreamin" target="_blank" class="linkedin"><i class="bi bi-linkedin bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; 2021 <strong><span>Dhaka Dreamin’</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <!-- <script src="assets/js/jquery-1.11.2.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="{{asset('/')}}public/frontend/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
  <script src="{{asset('/')}}public/frontend/assets/vendor/aos/aos.js"></script>
  <script src="{{asset('/')}}public/frontend/assets/vendor/php-email-form/validate.js"></script>
  <script src="{{asset('/')}}public/frontend/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{asset('/')}}public/frontend/assets/vendor/purecounter/purecounter.js"></script>
  <script src="{{asset('/')}}public/frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{asset('/')}}public/frontend/assets/vendor/glightbox/js/glightbox.min.js"></script>
  
  <script type="text/javascript" src="{{asset('/')}}public/frontend/assets/js/DateTimePicker.js"></script>
  <script type="text/javascript">$("#dtBox").DateTimePicker();</script>

  <!-- Template Main JS File -->
  <script src="{{asset('/')}}public/frontend/assets/js/main.js"></script>

  <script type="text/javascript">
   $('body').on('click', '#inputPick', function(){
    $('#showcheckinDate').toggleClass('d-none');
    $('#showcheckinTime').toggleClass('d-none');
   });
   
   $('body').on('click', '#inputDrop', function(){
    $('#showcheckoutDate').toggleClass('d-none');
    $('#showcheckoutTime').toggleClass('d-none');
   });
   //car rental
   $('body').on('click', '#inputPick2', function(){
    $('#showcheckinDate2').toggleClass('d-none');
    $('#showcheckinTime2').toggleClass('d-none');
   });
   
   $('body').on('click', '#inputDrop2', function(){
    $('#showcheckoutDate2').toggleClass('d-none');
    $('#showcheckoutTime2').toggleClass('d-none');
   });
   
   //bycycle renta
   $('body').on('click', '#inputPick3', function(){
    $('#showcheckinDate3').toggleClass('d-none');
    $('#showcheckinTime3').toggleClass('d-none');
   });
   
   $('body').on('click', '#inputDrop3', function(){
    $('#showcheckoutDate3').toggleClass('d-none');
    $('#showcheckoutTime3').toggleClass('d-none');
   });

   $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
  </script>

</body>

</html>