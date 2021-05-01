@extends('layouts.frontend_layout')
@section('title')
    {{$content->title}}
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
        <h2>{{$content->title}}</h2>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="work" class="work-section reservation-section">
      <div class="container" data-aos="fade-up">
         <div class="row">
             <div class="col-md-6 col-xl-6 col-12 col-sm-12">
                <img class="img-fluid" src="{{URL::to($content->image)}}" alt="">
             </div>
             <div class="col-md-6 col-xl-6 col-12 col-sm-12">
                 <p>{{$content->desc}}</p>
             </div>
         </div>
      </div>
    </section><!-- End work Section -->
    <!-- Download Section -->

  </main><!-- End #main -->
  <div id="dtBox"></div><!-- End datepicker -->
@endsection