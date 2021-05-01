@extends('layouts.frontend_layout')
@section('title')
    Checkout
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
          {{$menu->menu1}}
        </h2>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section class="about_us_section" id="about_us_section">
      <div class="container" data-aos="fade-up">
        <div class="row">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Serial</th>
                    <th scope="col">Service Category</th>
                    <th scope="col">Service Name</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                        $collection = Cart::content();
                    @endphp
                  @foreach ($collection as $item)
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$item->options->service_category_name}}</td>
                        <td>{{$item->name}}</td>
                    </tr>
                    @php
                        $i++;
                    @endphp
                  @endforeach
                </tbody>
              </table>
              <h3 class="text-right">
                <a href="{{route('place-service-request')}}" class="btn btn-success">Send Request</a>
              </h3>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <div id="dtBox"></div><!-- End datepicker -->
@endsection