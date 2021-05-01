@extends('layouts.frontend_layout')
@section('title')
    About
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
          {{$menu->menu4}}
        </h2>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section class="about_us_section" id="about_us_section">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-12">
            <div class="inner-content">
              @php
                  $desc = $AboutUs->description;
                  $descriptions = explode('+', $desc);
              @endphp
              @foreach ($descriptions as $description)
                  <p>{{$description}}</p>
              @endforeach
              
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection