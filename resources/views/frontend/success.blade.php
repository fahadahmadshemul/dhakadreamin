@extends('layouts.frontend_layout')
@section('title')
    Success
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
        <h2>Success</h2>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="work" class="work-section reservation-section">
      <div class="container" data-aos="fade-up">
              @csrf
              @php
                $checkout_message = Session::get('checkout_message');
                $checkout_message_error = Session::get('checkout_message_error');
              @endphp
              @if ($checkout_message)
                  
                  <div class="alert alert-success" role="alert">
                    {{$checkout_message}}
                  </div>
              @endif
              @php
                  $checkout_message = Session::put('checkout_message', NULL);
                  $checkout_message_error = Session::put('checkout_message_error', NULL);
              @endphp
              <div class="text-right">
                  <a class="btn btn-primary" href="{{route('home')}}">Back To Home</a>
              </div>
      </div>
    </section><!-- End work Section -->
    <!-- Download Section -->

  </main><!-- End #main -->
  <div id="dtBox"></div><!-- End datepicker -->
@endsection