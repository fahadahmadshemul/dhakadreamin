@extends('layouts.frontend_layout')
@section('title')
    404
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
        <h2>404</h2>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="work" class="work-section reservation-section">
      <div class="container" data-aos="fade-up">
          <h1 class="text-center">404 Page Not Found</h1>
          <a href="{{route('home')}}" class="btn btn-success"> <i class="bi bi-arrow-left"></i> Back To Home</a>
      </div>
    </section><!-- End work Section -->
    <!-- Download Section -->

  </main><!-- End #main -->
  <div id="dtBox"></div><!-- End datepicker -->
@endsection