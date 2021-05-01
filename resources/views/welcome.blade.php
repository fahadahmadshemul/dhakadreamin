@extends('layouts.frontend_layout')
@section('title')
    Home
@endsection
@section('search_for_reservation')
<div class="container d-flex align-items-center justify-content-center">
  <div class="checkin_box d-lg-block d-xl-block d-md-none d-none">
    <form method="get" action="{{route('search-for-reservation')}}" id="check_avail_home" autocomplete="off">
      @csrf
      <div class="row">
        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 d-flex align-items-center justify-content-center">
          <div class="form-group col-xl-6 col-md-6 col-sm-6 col-12">
            <label for="inputArrival">Check in</label>
            <input type="date" name="Check_in" id="inputArrival" placeholder="Add dates">
          </div>
          <div class="form-group col-xl-6 col-md-6 col-sm-6 col-12">
            <label for="inputCheckout">Check out</label>
            <input type="date" name="Check_out" id="inputCheckout" placeholder="Add dates">
          </div>
        </div>
        <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 d-flex align-items-center justify-content-center">
          <div class="form-group col-xl-4 col-md-4 col-sm-4 col-12">
            <label for="addGuest">Adult</label>
            <input type="number" name="adult" >
          </div> 
          <div class="form-group col-xl-4 col-md-4 col-sm-4 col-12">
            <label for="addGuest">Child</label>
            <input type="number" name="child" >
          </div> 
          <div class="form-group col-xl-4 col-md-4 col-sm-4 col-12">
            <label for="addGuest">Infant</label>
            <input type="number" name="infant">
          </div>  
        </div>
      </div>

      <div class="search_btn">
        @php
            $check_login = Session::get('customr_id');
        @endphp
        @if ($check_login != NULL)
        <button type="submit" class="btn btn-outline-secondary"><i class="bi bi-search"></i></button>
        @else
        <button type="button" onclick="alert('Please Sign Up or Login to your account to continue.')" class="btn btn-outline-secondary"><i class="bi bi-search"></i></button>
        
        @endif
        
      </div>
    </form>
  </div>
</div>
@endsection
@section('content')
      <!-- ======= Hero Section ======= -->
      @php
        $setting = DB::table('settings')->where('id', 1)->first();
      @endphp
  <section id="hero" class="hero hero_section d-flex align-items-center justify-content-center" style="background: url('{{URL::to($setting->cover_image)}}') center center no-repeat;">
    <div class="container">
      <div class="body-content">
        <!-- <img src="{{asset('/')}}public/frontend/assets/img/01.webp" alt="01_webp" class="img-fluid" width="100%"> -->
        <div class="checkin_box d-lg-none d-xl-none">
          <form method="get" action="{{route('search-for-reservation')}}" id="check_avail_home" autocomplete="off">
            @csrf
            <div class="row">
              <div class="form-group left-box col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 d-flex align-items-center justify-content-center">
                <div class="form-group col-xl-6 col-md-6 col-sm-6 col-xs-12 col-12">
                  <label for="inputArrival">Check in</label>
                  <input type="date" name="Check_in" id="inputArrival" placeholder="Add dates">
                </div>
                <div class="form-group col-xl-6 col-md-6 col-sm-6 col-xs-12 col-12">
                  <label for="inputCheckout">Check out</label>
                  <input type="date" name="Check_out" id="inputCheckout" placeholder="Add dates">
                </div>
              </div>
              <div class="form-group right-box col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 d-flex align-items-center justify-content-center">
                <div class="form-group col-xl-4 col-md-4 col-sm-4 col-xs-12 col-12">
                  <label for="addGuest">Adult</label>
                  <input type="number" name="adult">
                </div> 
                <div class="form-group col-xl-4 col-md-4 col-sm-4 col-xs-12 col-12">
                  <label for="addGuest">Child</label>
                  <input type="number" name="child">
                </div> 
                <div class="form-group col-xl-4 col-md-4 col-sm-4 col-xs-12 col-12">
                  <label for="addGuest">Infant</label>
                  <input type="number"  name="infant">
                </div>  
              </div>
            </div>

            <div class="search_btn">
              @php
                  $check_login = Session::get('customr_id');
              @endphp
              @if ($check_login != NULL)
              <button type="submit" class="btn btn-outline-secondary"><i class="bi bi-search"></i></button>
              @else
              <button type="button" onclick="alert('Please Login To Your Account Or Signup Now..!')" class="btn btn-outline-secondary"><i class="bi bi-search"></i></button>
              @endif
            </div>
          </form>
        </div>
      </div>
      <div class="heading d-none align-items-center justify-content-center">
        <h2>Made possible by Hosts</h2>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="work" class="work-section">
      <div class="container" data-aos="fade-up">
        <div class="top-title d-flex align-items-center justify-content-center">
          <h3>How does it work?</h3>
        </div>
        <div class="row">
          @foreach($how_work as $h_work)
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
            <div class="box-content">
              <div class="img">
                <img src="{{URL::to($h_work->image)}}" alt="charity_icon_6" class="align-left">
              </div>
              <div class="box-content-area">
                <h4>{{$h_work->title}}</h4>
                <p>{{$h_work->desc}}</p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section><!-- End work Section -->

    <!-- Download Section -->

    <section class="download-section" id="download-section">
      <div class="container">
        <div class="top-title">
          <h3><strong>DOWNLOAD OUR IOS &ANDROID APPS</strong></h3>
        </div>
        @php
            $setting = DB::table('settings')->where('id', 1)->first();
        @endphp
        <div class="row justify-content-center">
          <div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 col-12">
            <div class="video-contnet embed-responsive embed-responsive-4by3">
              <iframe class="embed-responsive-item" src="{{$setting->app_video}}" title="DOWNLOAD OUR IOS &ANDROID APPS" width="100%" height="420"  allowfullscreen></iframe>
            </div>

          </div>
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
            <div class="android-content text-center">
              <h4>Welcome to Dhaka Dreamin’ App</h4>
              <a href="#" class="avia_image" target="_blank">
                <img class="avia_image" src="{{$setting->app_photo}}" alt="" title="Dhaka Dreamin’ App" itemprop="contentURL">
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ========== LIVE ANYWHERE ============= -->
    <section id="live-section" class="live-section">
      <div class="container" data-aos="fade-right">
        <div class="top-title d-flex align-items-center justify-content-center">
          <h3><strong>Reserve our rooms</strong></h3>
        </div>
        <div class="row">
          @foreach ($rooms as $item)
          <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
              <div class="image-area">
                <a href="{{route('reservation')}}" target="_blank">
                  <img src="{{URL::to($item->image)}}" alt="LOOSING MY BLUES" title="LOOSING MY BLUES" class="rounded">
                  <h5>{{$item->sub_title}}</h5>
                </a>
              </div>
          </div>
          @endforeach
          <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 justify-content-center align-items-center d-flex">
            <div class="image-area see_more_btn">
              <a href="{{route('reservation')}}" target="_blank" class="btn btn-primary">See More</a>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End LIVE Section -->

    <!-- ========== service ANYWHERE ============= -->
    <section id="service-section" class="live-section service-section">
      <div class="container" data-aos="fade-left">
        <div class="top-title d-flex align-items-center justify-content-center">
          <h3><strong>OUR SERVICE CENTER</strong></h3>
        </div>
        <div class="row">
          @foreach ($service_center as $s_c)
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
              <div class="image-area">
                <a href="{{route('service-center')}}" target="_blank">
                  <img src="{{URL::to($s_c->image)}}" alt="TRANSPORT" title="{{$s_c->title}}" class="rounded">
                  <h5>{{$s_c->title}}</h5>
                  <p>{{$s_c->description}}</p>
                </a>
              </div>
            </div>
          @endforeach
          <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 justify-content-center align-items-center d-flex">
            <div class="image-area see_more_btn">
              <a href="{{route('service-center')}}" target="_blank" class="btn btn-primary">See More</a>
            </div>
          </div>

        </div>
      </div>
    </section><!-- End service Section -->

    <!-- ========== service ANYWHERE ============= -->
    <section id="footer-section" class="live-section footer-section">
      <div class="container" data-aos="fade-up">
        <div class="row justify-content-between">
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 d-flex justify-content-start">
            <div class="footer-content">
              <h4>About</h4>
              <div class="list-items d-flex align-items-center">
                <ul class="list-items">
                  <li><a href="{{route('about-content-by-id', 1)}}"><i class="bi bi-chevron-right"></i> How Dhaka Dreamin’ Works</a></li>
                  <li><a href="{{route('about-content-by-id', 2)}}"><i class="bi bi-chevron-right"></i> Dhaka Dreamin’ for Homestay</a></li>
                  <li><a href="{{route('about-content-by-id', 3)}}"><i class="bi bi-chevron-right"></i> Dhaka Dreamin’ for Business</a></li>
                  <li><a href="{{route('about-content-by-id', 4)}}"><i class="bi bi-chevron-right"></i> Newsroom</a></li>
                  <li><a href="{{route('about-content-by-id', 5)}}"><i class="bi bi-chevron-right"></i> Founders’ Letter</a></li>
                  <li><a href="{{route('about-us')}}"><i class="bi bi-chevron-right"></i> About Us</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 d-flex justify-content-center">
            <div class="footer-content">
              <h4>COMMUNITY</h4>
              <div class="list-items d-flex align-items-center">
                <ul class="list-items">
                  <li><a href="{{route('community-content-by-id', 1)}}"><i class="bi bi-chevron-right"></i> Dhaka Dreamin’ Members</a></li>
                  <li><a href="{{route('community-content-by-id', 2)}}"><i class="bi bi-chevron-right"></i> Guest Referrals</a></li>
                  <li><a href="{{route('community-content-by-id', 3)}}"><i class="bi bi-chevron-right"></i> Gift Cards</a></li>
                  <li><a href="{{route('community-content-by-id', 4)}}"><i class="bi bi-chevron-right"></i> Accessibility</a></li>
                  <li><a href="{{route('community-content-by-id', 5)}}"><i class="bi bi-chevron-right"></i> Against Discrimination</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 d-flex justify-content-end">
            <div class="footer-content">
              <h4>SUPPORT</h4>
              <div class="list-items d-flex align-items-center">
                <ul class="list-items">
                  <li><a href="{{route('support-content-by-id', 1)}}"><i class="bi bi-chevron-right"></i> Help Center</a></li>
                  <li><a href="{{route('support-content-by-id', 2)}}"><i class="bi bi-chevron-right"></i> Trust & Safety</a></li>
                  <li><a href="{{route('support-content-by-id', 3)}}"><i class="bi bi-chevron-right"></i> Cancellation Options</a></li>
                  <li><a href="{{route('support-content-by-id', 4)}}"><i class="bi bi-chevron-right"></i> Refund Policy</a></li>
                  <li><a href="{{route('support-content-by-id', 5)}}"><i class="bi bi-chevron-right"></i> Privacy Policy</a></li>
                  <li><a href="{{route('support-content-by-id', 6)}}"><i class="bi bi-chevron-right"></i> Safety Fact Sheet</a></li>
                  <li><a href="{{route('support-content-by-id', 7)}}"><i class="bi bi-chevron-right"></i> Security Fact Sheet</a></li>
                  <li><a href="{{route('contact-us')}}"><i class="bi bi-chevron-right"></i> Contact Us</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End service Section -->

  </main><!-- End #main -->

  
@endsection