@extends('layouts.frontend_layout')
@section('title')
    Contact Us
@endsection
@section('content')
      <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">
    <div class="container-fluid">
      <div class="body-content">
        @php
            $setting = DB::table('settings')->where('id', 1)->first();
        @endphp
        <img src="{{URL::to($setting->cover_image)}}" alt="01_webp" class="img-fluid" width="100%">
      </div>
      <div class="heading d-flex align-items-center justify-content-center">
        <h2>
          @php
            $menu = DB::table('menus')->where('id', 1)->first();
          @endphp
          {{$menu->menu5}}
        </h2>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="work" class="work-section contact-section">
      <div class="container" data-aos="fade-up">
        <div class="top-title">
          <h3 class="text-center"><strong>Business Hours: Saturday to Thursday 09:00AM to 09:00PM</strong></h3>
        </div>
        <div class="map_box">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1824.127762129851!2d90.38987115794345!3d23.88055614872191!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c414dc3e8613%3A0x20faca17c48c77d9!2zOCBSb2FkIE5vIDIsIOCmouCmvuCmleCmviAxMjMw!5e0!3m2!1sbn!2sbd!4v1617739530212!5m2!1sbn!2sbd" width="100%" height="450" style="border:0;" allowfullscreen="" loading="fast"></iframe>
        </div>
        <div class="row mt-4">
          @php
              $success = Session::get('success');
          @endphp
          @if ($success)
              <div class="alert alert-success">{{$success}}</div>
          @endif
          @php
              Session::put('success', NULL);
          @endphp
          <div class="col-xl-6 col-md-6 col-sm-6 col-xs-12 col-12">
            <div class="left-info-box">
              @php
                  $contact = DB::table('contact_us')->where('id', 1)->first();
              @endphp
              <ul>
                <li><span class="icon"><i class="ri-hotel-line"></i></span>{{$contact->address}}</li>
                <li><span class="icon"><i class="ri-phone-line"></i></span>{{$contact->phone}}</li>
                <li><span class="icon"><i class="ri-whatsapp-line"></i></span>{{$contact->whatsapp}}</li>
                <li><span class="icon"><i class="ri-skype-line"></i></span>{{$contact->skype}}</li>
                <li><span class="icon"><i class="ri-mail-line"></i></span>{{$contact->email}}</li>
              </ul>
                <h4>Social Media</h4>
              <div class="social-links">
                <a href="https://www.facebook.com/dhaka.dreamin" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/dhakadreamin/" target="_blank" class="instagram"><i class="bi bi-instagram bx bxl-instagram"></i></a>
                <a href="https://www.linkedin.com/company/dhaka-dreamin" target="_blank" class="linkedin"><i class="bi bi-linkedin bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-md-6 col-sm-6 col-xs-12 col-12">
            <div class="right-info-box">
              <h4>Inquiries Section : </h4>
              <form class="contact_form" action="{{route('contact-mail')}}" method="post" id="contactForm" novalidate="novalidate">
                @csrf
                <div class="form-group col-12">
                  <input type="text" name="name" placeholder="name">
                </div>
                <div class="form-group col-12">
                  <input type="email" name="email" placeholder="Email">
                </div>
                <div class="form-group col-12">
                  <input type="text" name="subject" placeholder="Subject">
                </div>
                <div class="form-group col-12">
                    <textarea class="form-control" name="message" id="exampleTextarea" rows="2" placeholder="Message"></textarea>
                </div>

                <div class="col-md-12 text-right">
                    <button type="submit" value="submit" class="btn theme_btn">Send Message</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End work Section -->
    <!-- Download Section -->

  </main><!-- End #main -->
  <div id="dtBox"></div><!-- End datepicker -->
@endsection