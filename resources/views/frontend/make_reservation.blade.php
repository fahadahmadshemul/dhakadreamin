@extends('layouts.frontend_layout')
@section('title')
    Make A Reservation
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
          {{$menu->menu2}}
        </h2>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="work" class="work-section reservation-section">
      <div class="container" data-aos="fade-up">
        <div class="top-title">
          <h3 class="text-center mb-4"><strong>{{$reservation_content->title}}</strong></h3>
          @php
              $descs = explode('+', $reservation_content->desc);
          @endphp
          @foreach ($descs as $desc)
              <p>{{$desc}}</p>
          @endforeach
        </div>
        <div class="row">
          @if ($count != 0)
              @foreach ($check as $item)
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="box-item">
                        <div class="flip-box">
                        <div class="flip-box-front text-center" style="background-image: url('{{$item->image}}');">
                            <div class="inner color-white">
                                <h3 class="flip-box-header">{{$item->title}}</h3>
                                <p>{{$item->sub_title}}</p>
                                {{-- <img src="{{URL::to($image)}}" alt="" class="flip-box-img"> --}}
                                </div>
                            </div>
                            <div class="flip-box-back text-center" style="background-image: url('{{$item->image}}');">
                    
                            <div class="inner color-white">
                                @php
                                    $descriptions = explode('+', $item->description);
                                @endphp
                                @foreach ($descriptions as $descripton)
                                    <span>- {{$descripton}}</span>
                                @endforeach
                            <a href="{{route('add-to-cart', [$item->id, $check_in, $check_out, $adult, $child, $infant])}}" class="flip-box-button">MAKE A RESERVATION</a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @else
            <div class="alert alert-danger">
              No room is empty now...!
            </div>
          @endif
            
          

        </div>
      </div>
    </section><!-- End work Section -->
    <!-- Download Section -->

  </main><!-- End #main -->
  <div id="dtBox"></div><!-- End datepicker -->
@endsection