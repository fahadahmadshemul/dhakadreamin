@extends('layouts.frontend_layout')
@section('title')
    Add To Cart
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
        <h2>Add To Cart</h2>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="work" class="work-section reservation-section">
      <div class="container" data-aos="fade-up">
          <form action="{{route('check-out', $room->id)}}" method="post">
              @csrf
              
            <div class="row">
                <div class="col-md-6">
                    <h2>Your Information</h2>
                    <div class="from-group">
                        <label for="">Name</label>
                        <input class="form-control" type="text" name="name" value="{{$customer->name}}" id="">
                    </div>
                    <div class="from-group">
                        <label for="">Email</label>
                        <input class="form-control" type="email" name="email" value="{{$customer->email}}" id="">
                    </div>
                    <div class="from-group">
                        <label for="">Phone</label>
                        <input class="form-control" type="text" name="phone" value="{{$customer->phone}}" id="">
                    </div>
                </div>
                <div class="col-md-6">
                    <h2>Room Information</h2>
                    <div class="form-group">
                        <label for="">Room Name</label>
                        <input type="text" class="form-control" readonly name="title" value="{{$room->title}}" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Check In </label>
                        <input type="text" class="form-control" required name="check_in" value="{{$check_in}}" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Check Out</label>
                        <input type="text" class="form-control" required name="check_out" value="{{$check_out}}" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Adult</label>
                        <input type="text" class="form-control" required name="adult" value="{{$adult}}" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Child</label>
                        <input type="text" class="form-control" required name="child" value="{{$child}}" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Infants</label>
                        <input type="text" class="form-control" required name="infant" value="{{$infant}}" id="">
                    </div>
                    <div class="form-group">
                        <br>
                        <input type="submit" value="Check Out" class="btn btn-success">
                    </div>
                </div>
            </div>
        </form>
      </div>
    </section><!-- End work Section -->
    <!-- Download Section -->

  </main><!-- End #main -->
  <div id="dtBox"></div><!-- End datepicker -->
@endsection