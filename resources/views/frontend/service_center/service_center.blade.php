@extends('layouts.frontend_layout')
@section('title')
    Service Center
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
          <div class="col-12">
            <div class="inner-content">
              <div class="row">
                <div class="col-4">
                  <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-concierge-list" data-bs-toggle="list" href="#list-concierge" role="tab" aria-controls="concierge">CONCIERGE SERVICE</a>
                    <a class="list-group-item list-group-item-action" id="list-housekeeping-list" data-bs-toggle="list" href="#list-housekeeping" role="tab" aria-controls="housekeeping">HOUSEKEEPING AND ROOM SERVICE</a>
                    <a class="list-group-item list-group-item-action" id="list-profile-list" data-bs-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Transport Service</a>
                    <a class="list-group-item list-group-item-action" id="list-home-list" data-bs-toggle="list" href="#list-home" role="tab" aria-controls="home">Laundry, Dry Cleaning and Pressing Service</a>
                    <a class="list-group-item list-group-item-action" id="list-food-list" data-bs-toggle="list" href="#list-food" role="tab" aria-controls="food">FOOD AND BEVERAGE SERVICE</a>
                    <a class="list-group-item list-group-item-action" id="list-owner-list" data-bs-toggle="list" href="#list-owner" role="tab" aria-controls="owner">OWNERS SPECIAL</a>
                    <a class="list-group-item list-group-item-action" id="list-event-list" data-bs-toggle="list" href="#list-event" role="tab" aria-controls="owner">EVENT SERVICE</a>
                    <a class="list-group-item list-group-item-action" id="list-business-list" data-bs-toggle="list" href="#list-business" role="tab" aria-controls="owner">BUSINESS CENTER SERVICE</a>
                    <a class="list-group-item list-group-item-action" id="list-foreigner-list" data-bs-toggle="list" href="#list-foreigner" role="tab" aria-controls="owner">EXTERNAL SERVICE FOR FOREIGNERS</a>
                  </div>
                </div>
                <div class="col-8">
                  <div class="tab-content" id="nav-tabContent">
                    @php
                        $success = Session::get('success');
                    @endphp
                    @if ($success)
                        <div class="alert alert-success">{{$success}}</div>
                    @endif
                    @php
                        Session::put('success', NULL);
                    @endphp
                    {{-- @foreach (Cart::content() as $row)
                    <p style="color: red">{{$row->options->service_category_name}}</p>
                    
                        {{$row->name}}
                        
                    @endforeach --}}
                    <div class="tab-pane fade show active" id="list-concierge" role="tabpanel" aria-labelledby="list-concierge-list"><!-- Start tab-pane -->
                      <div class="tab-content" id="pills-tabContent2">
                          <div style="text-align:right">
                            <a href="{{route('service-check-out')}}" class="btn btn-success">Checkout (<?php echo Cart::count(); ?>)</a>
                          </div>
                        <form action="{{route('add-cart-concierge-service')}}" method="post">
                            @csrf
                            <div class="tab-pane fade show active" id="pills-concierge" role="tabpanel" aria-labelledby="pills-concierge-tab">
                            <h5>CONCIERGE SERVICE</h5>
                            
                            
                            <div class="list-group">
                                <input type="hidden" name="service_category_name" value="CONCIERGE SERVICE">
                                <!-- <h4><strong>Men’s</strong></h4> -->
                                @foreach ($concierge as $con)
                                  <label class="list-group-item">
                                  <input class="form-check-input me-1" type="checkbox" name="concierge_service[]" value="{{$con->service_name}}">
                                  {{$con->service_name}}
                                  </label>
                                @endforeach
                                
                            </div>
                            <div class="add-to-card">
                                <input type="submit" class="btn btn-success cart px-auto" value="ADD TO CART">
                            </div>
                            </div>
                        </form>
                      </div>
                    </div><!-- End tab-pane -->

                    
                        <div class="tab-pane fade" id="list-housekeeping" role="tabpanel" aria-labelledby="list-housekeeping-list"><!-- Start tab-pane -->
                        <div class="tab-content" id="pills-tabContent2">
                            <form action="{{route('add-cart-concierge-service')}}" method="post">
                                @csrf
                                <input type="hidden" name="service_category_name" value="HOUSEKEEPING AND ROOM SERVICE">
                            <div class="tab-pane fade show active" id="pills-airport" role="tabpanel" aria-labelledby="pills-airport-tab">
                            <h5>HOUSEKEEPING AND ROOM SERVICE</h5>
                            <div class="list-group">
                                <!-- <h4><strong>Men’s</strong></h4> -->
                                @foreach ($housekeppingroom as $hk)
                                    <label class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" name="concierge_service[]" value="{{$hk->service_name}}">
                                {{$hk->service_name}}
                                </label>
                                @endforeach
                            </div>
                            <div class="add-to-card">
                                <input type="submit" class="btn btn-success cart px-auto" value="ADD TO CART">
                            </div>
                            </div>
                        </form>
                        </div>
                        </div><!-- End tab-pane -->
                    
                    
                    <!---- * akno kora hoy nai...--->

                    <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list"><!-- Start tab-pane -->
                      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="pills-car-tab" data-bs-toggle="pill" data-bs-target="#pills-car" type="button" role="tab" aria-controls="pills-car" aria-selected="false">Airport Pick Up/Drop Off</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="pills-car2-tab" data-bs-toggle="pill" data-bs-target="#pills-car2" type="button" role="tab" aria-controls="pills-car2" aria-selected="false">Full Day Car Rental</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="pills-bicycle-tab" data-bs-toggle="pill" data-bs-target="#pills-bicycle" type="button" role="tab" aria-controls="pills-bicycle" aria-selected="false">Bicycle Rental</button>
                        </li>
                      </ul>
                      <div class="tab-content" id="pills-tabContent3">
                        <div class="tab-pane fade show active" id="pills-car" role="tabpanel" aria-labelledby="pills-car-tab"><!-- Start Tab Pane -->
                        @php
                            $airport_content = DB::table('airport_contents')->where('id', 1)->first();
                        @endphp
                        
                          <h5>{{$airport_content->title}}</h5>
                          <p>{{$airport_content->desc}}</p>
                          <div class="list-group bg-fff">
                            <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th>Type of vehicles</th>
                                  <th>Price per trip (USD)</th>
                                </tr>
                              </thead>
                              <tbody>
                                @php
                                    $vehicle_desc = $airport_content->vehicle_desc;
                                    $vehicle_descs = explode('+', $vehicle_desc);
                                    
                                @endphp
                                @foreach ($vehicle_descs as $vd)
                                <tr>
                                  <td>{{$vd}}</td>
                                  <td>Get Quotation</td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                            <div class="make-reservation">
                              <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><i class="bi bi-calendar2-check-fill"></i><span style="margin-left: 10px; display: inline-block;">MAKE A RESERVATION</span>
                                    </button>
                                  </h2>
                                  <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                      <div class="panel-default widget-booking" style="padding: 0; display: inline-block; width: 100%;">
                                        <!-- <div class="panel-heading mb-3">
                                          <h4>MAKE A RESERVATION</h4>
                                        </div> -->
                                        <div class="panel-body checkrateform">
                                            <form  action="{{route('airport-pick-up-drop')}}" method="POST">
                                              @csrf
                                              <div class="row">
                                                
                                                <div class=" col-md-6 col-xl-12 col-sm-12 col-12">
                                                  <label class="">
                                                    <input class="form-check-input me-1" type="checkbox" id="inputPick">
                                                    Pick Up
                                                    </label>
                                                </div>
                                                <br>
                                                <br>
                                                
                                                <div class="form-group col-xl-6 col-md-6 col-sm-12 col-12 d-none" id="showcheckinDate">
                                                  <input type="date" name="check_inDate" id="inputArrival" placeholder="Month-Date-Year">
                                                </div>
                                                <div class="form-group col-xl-6 col-md-6 col-sm-12 col-12 d-none" id="showcheckinTime">
                                                  <input type="time" name="check_inTime" id="inputCheckout" placeholder="Hour-Minute">
                                                </div>

                                                <div class="col-md-6 col-xl-12 col-sm-12 col-12">
                                                  <label class="">
                                                    <input class="form-check-input me-1" type="checkbox" id="inputDrop">
                                                    Drop Off
                                                    </label>
                                                </div>
                                                <br>
                                                <br>
                                                <div class="form-group col-xl-6 col-md-6 col-sm-12 col-12 d-none" id="showcheckoutDate">
                                                  <input type="date" name="check_outDate" id="inputArrival" placeholder="Month-Date-Year">
                                                </div>
                                                <div class="form-group col-xl-6 col-md-6 col-sm-12 col-12 d-none" id="showcheckoutTime">
                                                  <input type="time" name="check_outTime" id="inputCheckout" placeholder="Hour-Minute">
                                                </div>
                                                
                                                <div class="form-group col-xl-4 col-md-4 col-sm-12 col-12" data-children-count="1">
                                                    <label for="exampleSelect1">Adults per room:</label>
                                                    <select class="form-select" name="adult_per_room" id="exampleSelect1">
                                                      <option value="0" selected="selected">0</option>
                                                      <option value="1">1</option>
                                                      <option value="2">2</option>
                                                      <option value="3">3</option>
                                                      <option value="4">4</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-xl-4 col-md-4 col-sm-12 col-12" data-children-count="1">
                                                    <label for="exampleSelect2">Children :</label>
                                                    <select class="form-select" name="child_per_room" id="exampleSelect2">
                                                      <option value="0" selected="selected">0</option>
                                                      <option value="1">1</option>
                                                      <option value="2">2</option>
                                                      <option value="3">3</option>
                                                      <option value="4">4</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-xl-4 col-md-4 col-sm-12 col-12" data-children-count="1">
                                                    <label for="exampleSelect3">Infants :</label>
                                                    <select class="form-select" name="infants" id="exampleSelect3">
                                                      <option value="0" selected="selected">0</option>
                                                      <option value="1">1</option>
                                                      <option value="2">2</option>
                                                      <option value="3">3</option>
                                                      <option value="4">4</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-xl-6 col-md-6 col-sm-12 col-12" data-children-count="1">
                                                    <label>Name :</label>
                                                    <input name="name" type="text" placeholder="Name">
                                                </div>
                                                <div class="form-group col-xl-6 col-md-6 col-sm-12 col-12" data-children-count="1">
                                                    <label for="exampleInputEmail1">Email :</label>
                                                    <input name="email" type="email" placeholder="Email" id="exampleInputEmail1">
                                                </div>
                                                <div class="form-group col-xl-6 col-md-6 col-sm-12 col-12" data-children-count="1">
                                                    <label>Phone :</label>
                                                    <input name="phone" type="text" placeholder="Phone">
                                                </div>
                                                <div class="form-group col-xl-6 col-md-6 col-sm-12 col-12" data-children-count="1">
                                                    <label>WhatsApp :</label>
                                                    <input name="whatsapp" type="text" placeholder="WhatsApp">
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="exampleTextarea">Message</label>
                                                    <textarea class="form-control" name="message" id="exampleTextarea" rows="2"></textarea>
                                                </div>
                                                <div class="form-group col-12">
                                                    <div class="add-to-card">
                                                      <input type="submit" class="btn btn-success cart px-auto" value="Send Request">
                                                    </div>
                                                </div>
                                              </div>
                                            </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="faq_section bg-fff mt-4 p-4">
                            <h4 class="mb-3">Frequently Asked Questions [FAQs]</h4>
                            @php
                                $a_faqs = DB::table('airport_faqs')->where('category', 1)->get();
                            @endphp
                            @foreach ($a_faqs as $a_faq)
                              <h5>{{$a_faq->question}}</h5>
                              <p>{{$a_faq->ans}}</p>
                            @endforeach
                          </div>
                        </div><!-- End Tab Pane -->
                        <div class="tab-pane fade" id="pills-car2" role="tabpanel" aria-labelledby="pills-car2-tab"><!-- Start Tab Pane -->
                          @php
                              $car_rental = DB::table('car_rental_contents')->where('id', 1)->first();
                          @endphp
                          <h5>{{$car_rental->title}}</h5>
                          @php
                              $car_loops = explode('+', $car_rental->car_desc);
                          @endphp
                          @foreach ($car_loops as $car_loop)
                              <p>{{$car_loop}}</p>
                          @endforeach
                          <div class="list-group bg-fff">
                            <div class="make-reservation">
                              <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i class="bi bi-calendar2-check-fill"></i><span style="margin-left: 10px; display: inline-block;">MAKE A RESERVATION</span>
                                    </button>
                                  </h2>
                                  <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                      <div class="panel-default widget-booking" style="padding: 0; display: inline-block; width: 100%;">
                                        <!-- <div class="panel-heading mb-3">
                                          <h4>MAKE A RESERVATION</h4>
                                        </div> -->
                                        <div class="panel-body checkrateform">
                                            <form method="POST" name="idForm" action="{{route('car-rental')}}">
                                              @csrf
                                              <div class="row">

                                                <div class="form-group col-xl-6 col-md-6 col-sm-12 col-12">
                                                  <input type="text" name="Inside_City" id="inputInside" placeholder="Inside City">
                                                </div>
                                                <div class="form-group col-xl-6 col-md-6 col-sm-12 col-12">
                                                  <input type="text" name="Outside_City" id="inputOutside" placeholder="Outside City">
                                                </div>

                                                <div class=" col-md-6 col-xl-12 col-sm-12 col-12">
                                                  <label class="">
                                                    <input class="form-check-input me-1" type="checkbox" id="inputPick2">
                                                    Pick Up
                                                    </label>
                                                </div>
                                                <br>
                                                <br>
                                                
                                                <div class="form-group col-xl-6 col-md-6 col-sm-12 col-12 d-none" id="showcheckinDate2">
                                                  <input type="date" name="check_inDate" id="inputArrival" placeholder="Month-Date-Year">
                                                </div>
                                                <div class="form-group col-xl-6 col-md-6 col-sm-12 col-12 d-none" id="showcheckinTime2">
                                                  <input type="time" name="check_inTime" id="inputCheckout" placeholder="Hour-Minute">
                                                </div>

                                                <div class="col-md-6 col-xl-12 col-sm-12 col-12">
                                                  <label class="">
                                                    <input class="form-check-input me-1" type="checkbox" id="inputDrop2">
                                                    Drop Off
                                                    </label>
                                                </div>
                                                <br>
                                                <br>
                                                <div class="form-group col-xl-6 col-md-6 col-sm-12 col-12 d-none" id="showcheckoutDate2">
                                                  <input type="date" name="check_outDate" id="inputArrival" placeholder="Month-Date-Year">
                                                </div>
                                                <div class="form-group col-xl-6 col-md-6 col-sm-12 col-12 d-none" id="showcheckoutTime2">
                                                  <input type="time" name="check_outTime" id="inputCheckout" placeholder="Hour-Minute">
                                                </div>
                                                
                                                <div class="form-group col-xl-4 col-md-4 col-sm-12 col-12" data-children-count="1">
                                                    <label for="exampleSelect1">Adults per room:</label>
                                                    <select class="form-select" name="adult_per_room" id="exampleSelect1">
                                                      <option value="0" selected="selected">0</option>
                                                      <option value="1">1</option>
                                                      <option value="2">2</option>
                                                      <option value="3">3</option>
                                                      <option value="4">4</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-xl-4 col-md-4 col-sm-12 col-12" data-children-count="1">
                                                    <label for="exampleSelect2">Children :</label>
                                                    <select class="form-select" name="child_per_room" id="exampleSelect2">
                                                      <option value="0" selected="selected">0</option>
                                                      <option value="1">1</option>
                                                      <option value="2">2</option>
                                                      <option value="3">3</option>
                                                      <option value="4">4</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-xl-4 col-md-4 col-sm-12 col-12" data-children-count="1">
                                                    <label for="exampleSelect3">Infants :</label>
                                                    <select class="form-select" name="infants" id="exampleSelect3">
                                                      <option value="0" selected="selected">0</option>
                                                      <option value="1">1</option>
                                                      <option value="2">2</option>
                                                      <option value="3">3</option>
                                                      <option value="4">4</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-xl-6 col-md-6 col-sm-12 col-12" data-children-count="1">
                                                    <label>Name :</label>
                                                    <input name="Name" type="text" placeholder="Name">
                                                </div>
                                                <div class="form-group col-xl-6 col-md-6 col-sm-12 col-12" data-children-count="1">
                                                    <label for="exampleInputEmail1">Email :</label>
                                                    <input name="Email" type="email" placeholder="Email" id="exampleInputEmail1">
                                                </div>
                                                <div class="form-group col-xl-6 col-md-6 col-sm-12 col-12" data-children-count="1">
                                                    <label>Phone :</label>
                                                    <input name="phone" type="text" placeholder="Phone">
                                                </div>
                                                <div class="form-group col-xl-6 col-md-6 col-sm-12 col-12" data-children-count="1">
                                                    <label>WhatsApp :</label>
                                                    <input name="WhatsApp" type="text" placeholder="WhatsApp">
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="exampleTextarea">Message</label>
                                                    <textarea class="form-control" name="message" id="exampleTextarea" rows="2"></textarea>
                                                </div>
                                                <div class="form-group col-12">
                                                    <div class="add-to-card">
                                                      <input type="submit" value="Send Request" class="btn btn-success cart px-auto" >
                                                    </div>
                                                </div>
                                              </div>
                                            </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="faq_section bg-fff mt-4 p-4">
                            <h4 class="mb-3">Frequently Asked Questions [FAQs]</h4>
                            @php
                                $a_faqs = DB::table('airport_faqs')->where('category', 2)->get();
                            @endphp
                            @foreach ($a_faqs as $a_faq)
                              <h5>{{$a_faq->question}}</h5>
                              <p>{{$a_faq->ans}}</p>
                            @endforeach
                          </div>
                        </div><!-- End Tab Pane -->

                        <div class="tab-pane fade" id="pills-bicycle" role="tabpanel" aria-labelledby="pills-bicycle-tab"><!-- Start Tab Pane -->
                          @php
                              $b_rental = DB::table('bycycle_contents')->where('id', 1)->first();
                          @endphp
                          <h5>{{$b_rental->title}}</h5>
                          @php
                              $b_loops = explode('+', $b_rental->desc);
                          @endphp
                          @foreach ($b_loops as $b_loop)
                          <p>{{$b_loop}}</p>
                          @endforeach
                          <div class="list-group bg-fff">
                            <div class="make-reservation">
                              <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><i class="bi bi-calendar2-check-fill"></i><span style="margin-left: 10px; display: inline-block;">MAKE A RESERVATION</span>
                                    </button>
                                  </h2>
                                  <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                      <div class="panel-default widget-booking" style="padding: 0; display: inline-block; width: 100%;">
                                        <!-- <div class="panel-heading mb-3">
                                          <h4>MAKE A RESERVATION</h4>
                                        </div> -->
                                        <div class="panel-body checkrateform">
                                            <form name="idForm" action="{{route('bicycle-rental')}}" method="POST">
                                              @csrf
                                              <div class="row">

                                                <div class=" col-md-6 col-xl-12 col-sm-12 col-12">
                                                  <label class="">
                                                    <input class="form-check-input me-1" type="checkbox" id="inputPick3">
                                                    Pick Up
                                                    </label>
                                                </div>
                                                <br>
                                                <br>
                                                
                                                <div class="form-group col-xl-6 col-md-6 col-sm-12 col-12 d-none" id="showcheckinDate3">
                                                  <input type="date" name="check_inDate" id="inputArrival" placeholder="Month-Date-Year">
                                                </div>
                                                <div class="form-group col-xl-6 col-md-6 col-sm-12 col-12 d-none" id="showcheckinTime3">
                                                  <input type="time" name="check_inTime" id="inputCheckout" placeholder="Hour-Minute">
                                                </div>

                                                <div class="col-md-6 col-xl-12 col-sm-12 col-12">
                                                  <label class="">
                                                    <input class="form-check-input me-1" type="checkbox" id="inputDrop3">
                                                    Drop Off
                                                    </label>
                                                </div>
                                                <br>
                                                <br>
                                                <div class="form-group col-xl-6 col-md-6 col-sm-12 col-12 d-none" id="showcheckoutDate3">
                                                  <input type="date" name="check_outDate" id="inputArrival" placeholder="Month-Date-Year">
                                                </div>
                                                <div class="form-group col-xl-6 col-md-6 col-sm-12 col-12 d-none" id="showcheckoutTime3">
                                                  <input type="time" name="check_outTime" id="inputCheckout" placeholder="Hour-Minute">
                                                </div>
                                                
                                                <div class="form-group col-xl-4 col-md-4 col-sm-12 col-12" data-children-count="1">
                                                    <label for="exampleSelect1">Adults per room:</label>
                                                    <select class="form-select" name="adult_per_room" id="exampleSelect1">
                                                      <option value="0" selected="selected">0</option>
                                                      <option value="1">1</option>
                                                      <option value="2">2</option>
                                                      <option value="3">3</option>
                                                      <option value="4">4</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-xl-4 col-md-4 col-sm-12 col-12" data-children-count="1">
                                                    <label for="exampleSelect2">Children :</label>
                                                    <select class="form-select" name="child_per_room" id="exampleSelect2">
                                                      <option value="0" selected="selected">0</option>
                                                      <option value="1">1</option>
                                                      <option value="2">2</option>
                                                      <option value="3">3</option>
                                                      <option value="4">4</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-xl-4 col-md-4 col-sm-12 col-12" data-children-count="1">
                                                    <label for="exampleSelect3">Infants :</label>
                                                    <select class="form-select" name="infants" id="exampleSelect3">
                                                      <option value="0" selected="selected">0</option>
                                                      <option value="1">1</option>
                                                      <option value="2">2</option>
                                                      <option value="3">3</option>
                                                      <option value="4">4</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-xl-6 col-md-6 col-sm-12 col-12" data-children-count="1">
                                                    <label>Name :</label>
                                                    <input name="Name" type="text" placeholder="Name">
                                                </div>
                                                <div class="form-group col-xl-6 col-md-6 col-sm-12 col-12" data-children-count="1">
                                                    <label for="exampleInputEmail1">Email :</label>
                                                    <input name="Email" type="email" placeholder="Email" id="exampleInputEmail1">
                                                </div>
                                                <div class="form-group col-xl-6 col-md-6 col-sm-12 col-12" data-children-count="1">
                                                    <label>Phone :</label>
                                                    <input name="phone" type="text" placeholder="Phone">
                                                </div>
                                                <div class="form-group col-xl-6 col-md-6 col-sm-12 col-12" data-children-count="1">
                                                    <label>WhatsApp :</label>
                                                    <input name="WhatsApp" type="text" placeholder="WhatsApp">
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="exampleTextarea">Message</label>
                                                    <textarea class="form-control" name="message" id="exampleTextarea" rows="2"></textarea>
                                                </div>
                                                <div class="form-group col-12">
                                                    <div class="add-to-card">
                                                      <input type="submit" value="Send Request" class="btn btn-success cart px-auto">
                                                    </div>
                                                </div>
                                              </div>
                                            </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="faq_section bg-fff mt-4 p-4">
                            <h4 class="mb-3">Frequently Asked Questions [FAQs]</h4>
                            @php
                                $a_faqs = DB::table('airport_faqs')->where('category', 3)->get();
                            @endphp
                            @foreach ($a_faqs as $a_faq)
                              <h5>{{$a_faq->question}}</h5>
                              <p>{{$a_faq->ans}}</p>
                            @endforeach
                          </div>
                        </div><!-- End Tab Pane -->
                      </div>
                    </div><!-- End tab-pane -->

                    <div class="tab-pane fade" id="list-home" role="tabpanel" aria-labelledby="list-home-list"><!-- Start tab-pane -->
                      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="pills-laundry-tab" data-bs-toggle="pill" data-bs-target="#pills-laundry" type="button" role="tab" aria-controls="pills-laundry" aria-selected="true">Laundry</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="pills-dry-tab" data-bs-toggle="pill" data-bs-target="#pills-dry" type="button" role="tab" aria-controls="pills-dry" aria-selected="false">Dry Cleaning</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="pills-pressing-tab" data-bs-toggle="pill" data-bs-target="#pills-pressing" type="button" role="tab" aria-controls="pills-pressing" aria-selected="false">Pressing</button>
                        </li>
                      </ul>
                      <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-laundry" role="tabpanel" aria-labelledby="pills-laundry-tab">
                            <form action="{{route('add-cart-concierge-service')}}" method="post">
                                @csrf
                                <h5>Laundry (Water Wash with Detergent and Scent)</h5>
                                <input type="hidden" name="service_category_name" value="Laundry (Water Wash with Detergent and Scent)">
                                <div class="list-group">
                                    <h4><strong>Men’s</strong></h4>
                                    @php
                                        $mens = DB::table('laundries')->where('category', 1)->get();
                                    @endphp
                                    @foreach ($mens as $men)
                                        <label class="list-group-item">
                                        <input class="form-check-input me-1" name="concierge_service[]" type="checkbox" value="{{$men->service_name}}">
                                        {{$men->service_name}}
                                        </label>
                                    @endforeach
                                    

                                    <h4><strong>Women’s</strong></h4>
                                    @php
                                        $womens = DB::table('laundries')->where('category', 2)->get();
                                    @endphp
                                    @foreach ($womens as $women)
                                      <label class="list-group-item">
                                      <input class="form-check-input me-1" name="concierge_service[]" type="checkbox" value="{{$women->service_name}}">
                                      {{$women->service_name}}
                                      </label>
                                    @endforeach
                                    

                                    <h4><strong>Children’s</strong></h4>
                                    @php
                                      $childrens = DB::table('laundries')->where('category', 3)->get();
                                    @endphp
                                    @foreach ($childrens as $children)
                                      <label class="list-group-item">
                                      <input class="form-check-input me-1" name="concierge_service[]" type="checkbox" value="{{$children->service_name}}">
                                      {{$children->service_name}}
                                      </label>
                                    @endforeach
                                    

                                    <h4><strong>Household</strong></h4>
                                    @php
                                      $households = DB::table('laundries')->where('category', 4)->get();
                                    @endphp
                                    @foreach ($households as $household)
                                        
                                    @endforeach
                                    <label class="list-group-item">
                                    <input class="form-check-input me-1" name="concierge_service[]" type="checkbox" value="{{$household->service_name}}">
                                    {{$household->service_name}}
                                    </label>
                                </div>
                                <div class="add-to-card">
                                    <input type="submit" class="btn btn-success cart px-auto" value="ADD TO CART">
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="pills-dry" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <form action="{{route('add-cart-concierge-service')}}" method="post">
                                @csrf
                                <input type="hidden" name="service_category_name" value="Dry Cleaning (Dry wash withnon-water-based solvents to remove stains)">
                                <h5>Dry Cleaning (Dry wash withnon-water-based solvents to remove stains)</h5>
                                <div class="list-group">
                                <h4><strong>Men’s</strong></h4>
                                @php
                                    $dry_mens = DB::table('dry_cleanings')->where('category', 1)->get();
                                @endphp
                                @foreach ($dry_mens as $dry_men)
                                  <label class="list-group-item">
                                    <input class="form-check-input me-1" name="concierge_service[]" type="checkbox" value="{{$dry_men->service_name}}">
                                    {{$dry_men->service_name}}
                                  </label>
                                @endforeach
                                

                                <h4><strong>Women’s</strong></h4>
                                @php
                                    $dry_womens = DB::table('dry_cleanings')->where('category', 2)->get();
                                @endphp
                                @foreach ($dry_womens as $dry_women)
                                    <label class="list-group-item">
                                    <input class="form-check-input me-1" name="concierge_service[]" type="checkbox" value="{{$dry_women->service_name}}">
                                        {{$dry_women->service_name}}
                                    </label>
                                @endforeach
                                

                                <h4><strong>Children’s</strong></h4>
                                @php
                                    $dry_childs = DB::table('dry_cleanings')->where('category', 3)->get();
                                @endphp
                                @foreach ($dry_childs as $dry_child)
                                    <label class="list-group-item">
                                    <input class="form-check-input me-1" name="concierge_service[]" type="checkbox" value="{{$dry_child->service_name}}">
                                        {{$dry_child->service_name}}
                                    </label>
                                @endforeach
                                
                                <h4><strong>Household</strong></h4>
                                @php
                                    $dry_households = DB::table('dry_cleanings')->where('category', 4)->get();
                                @endphp
                                @foreach ($dry_households as $dry_household)
                                    <label class="list-group-item">
                                    <input class="form-check-input me-1" name="concierge_service[]" type="checkbox" value="{{$dry_household->service_name}}">
                                        {{$dry_household->service_name}}
                                    </label>
                                @endforeach
                                
                                </div>
                                <div class="add-to-card">
                                <input type="submit" class="btn btn-success cart px-auto" value="ADD TO CART">
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="pills-pressing" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <form action="{{route('add-cart-concierge-service')}}" method="post">
                                @csrf
                                <input type="hidden" name="service_category_name" value="Pressing (Professional ironing to remove wrinkles in finished clothes)">
                                <h5>Pressing (Professional ironing to remove wrinkles in finished clothes)</h5>
                                <div class="list-group">
                                    <h4><strong>Men’s</strong></h4>
                                    @php
                                      $men_pressings = DB::table('pressings')->where('category', 1)->get();
                                    @endphp
                                    @foreach ($men_pressings as $men_pressing)
                                        <label class="list-group-item">
                                        <input class="form-check-input me-1" name="concierge_service[]" type="checkbox" value="{{$men_pressing->service_name}}">
                                        {{$men_pressing->service_name}}
                                        </label>
                                    @endforeach
                                    
                                    <h4><strong>Women’s</strong></h4>
                                    @php
                                      $women_pressings = DB::table('pressings')->where('category', 2)->get();
                                    @endphp
                                    @foreach ($women_pressings as $women_pressing)
                                        <label class="list-group-item">
                                        <input class="form-check-input me-1" name="concierge_service[]" type="checkbox" value="{{$women_pressing->service_name}}">
                                        {{$women_pressing->service_name}}
                                        </label>
                                    @endforeach
                                    
                                    <h4><strong>Children’s</strong></h4>
                                    @php
                                      $child_pressings = DB::table('pressings')->where('category', 3)->get();
                                    @endphp
                                    @foreach ($child_pressings as $child_pressing)
                                        <label class="list-group-item">
                                        <input class="form-check-input me-1" name="concierge_service[]" type="checkbox" value="{{$child_pressing->service_name}}">
                                        {{$child_pressing->service_name}}
                                        </label>
                                    @endforeach
                                    

                                    <h4><strong>Household</strong></h4>
                                    @php
                                      $household_pressings = DB::table('pressings')->where('category', 4)->get();
                                    @endphp
                                    @foreach ($household_pressings as $household_pressing)
                                        
                                    @endforeach
                                    <label class="list-group-item">
                                    <input class="form-check-input me-1" name="concierge_service[]" type="checkbox" value="{{$household_pressing->service_name}}">
                                    {{$household_pressing->service_name}}
                                    </label>
                                </div>
                                <div class="add-to-card">
                                    <input type="submit" class="btn btn-success cart px-auto" value="ADD TO CART">
                                </div>
                            </form>
                        </div>
                      </div>
                    </div><!-- End tab-pane -->

                    <div class="tab-pane fade" id="list-food" role="tabpanel" aria-labelledby="list-food-list"><!-- Start tab-pane -->
                      <div class="tab-content" id="pills-tabContent2">
                        <div class="tab-pane fade show active" id="pills-airport" role="tabpanel" aria-labelledby="pills-airport-tab">
                            <form action="{{route('add-cart-concierge-service')}}" method="post">
                                @csrf
                                <input type="hidden" name="service_category_name" value="FOOD AND BEVERAGE SERVICE">
                                <h5>FOOD AND BEVERAGE SERVICE</h5>
                                <div class="list-group">
                                    <!-- <h4><strong>Men’s</strong></h4> -->
                                    @foreach ($foodbeverage as $fb)
                                        
                                    @endforeach
                                    <label class="list-group-item">
                                    <input class="form-check-input me-1" type="checkbox" name="concierge_service[]" value="{{$fb->service_name}}">
                                    {{$fb->service_name}}
                                    </label>
                                </div>
                                <div class="add-to-card">
                                    <input type="submit" class="btn btn-success cart px-auto" value="ADD TO CART">
                                </div>
                            </form>
                        </div>
                      </div>
                    </div><!-- End tab-pane -->

                    <div class="tab-pane fade" id="list-owner" role="tabpanel" aria-labelledby="list-owner-list"><!-- Start tab-pane -->
                      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="pills-grooming-tab" data-bs-toggle="pill" data-bs-target="#pills-grooming" type="button" role="tab" aria-controls="pills-grooming" aria-selected="true">MENZ GROOMING SERVICE</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="pills-apparel-tab" data-bs-toggle="pill" data-bs-target="#pills-apparel" type="button" role="tab" aria-controls="pills-apparel" aria-selected="false">MENZ APPAREL SERVICE</button>
                        </li>
                      </ul>
                      <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-grooming" role="tabpanel" aria-labelledby="pills-grooming-tab">
                          @php
                              $owner_specials = DB::table('owner_specials')->where('category',1)->get();
                              $count = DB::table('owner_specials')->where('category',1)->count();
                          @endphp
                          @if ($count == 0)
                              <h5>MENZ GROOMING SERVICE (Coming Soon)</h5>
                          @else
                              <h5>MENZ GROOMING SERVICE</h5>
                              <form action="{{route('add-cart-concierge-service')}}" method="post">
                                @csrf
                                <input type="hidden" name="service_category_name" value="MENZ GROOMING SERVICE">
                                <div class="list-group">
                                    <!-- <h4><strong>Men’s</strong></h4> -->
                                    @foreach ($owner_specials as $ws1)
                                      <label class="list-group-item">
                                      <input class="form-check-input me-1" name="concierge_service[]" type="checkbox" value="{{$ws1->service_name}}">
                                      {{$ws1->service_name}}
                                      </label>
                                    @endforeach
                                    
                                </div>
                                <div class="add-to-card">
                                    <input type="submit" class="btn btn-success cart px-auto" value="ADD TO CART">
                                </div>
                            </form>
                          @endif
                          
                        </div>
                        <div class="tab-pane fade" id="pills-apparel" role="tabpanel" aria-labelledby="pills-apparel-tab">
                          @php
                              $owner_specials2 = DB::table('owner_specials')->where('category',2)->get();
                              $count2 = DB::table('owner_specials')->where('category',2)->count();
                          @endphp
                          @if($count2 == 0)
                          <h5>MENZ APPAREL SERVICE (Coming Soon)</h5>
                          @else
                          <form action="{{route('add-cart-concierge-service')}}" method="post">
                                @csrf
                                <input type="hidden" name="service_category_name" value="MENZ APPAREL SERVICE">
                                <h5>MENZ APPAREL SERVICE</h5>
                                <div class="list-group">
                                    <!-- <h4><strong>Men’s</strong></h4> -->
                                    @foreach ($owner_specials2 as $ws)
                                      <label class="list-group-item">
                                      <input class="form-check-input me-1" name="concierge_service[]" type="checkbox" value="{{$ws->service_name}}">
                                      {{$ws->service_name}}
                                      </label>
                                    @endforeach
                                    
                                </div>
                                <div class="add-to-card">
                                    <input type="submit" class="btn btn-success cart px-auto" value="ADD TO CART">
                                </div>
                            </form>
                          @endif
                        </div>
                      </div>
                    </div><!-- End tab-pane -->

                    <div class="tab-pane fade" id="list-event" role="tabpanel" aria-labelledby="list-event-list"><!-- Start tab-pane -->
                      <div class="tab-content" id="pills-tabContent2">
                        <div class="tab-pane fade show active" id="pills-event" role="tabpanel" aria-labelledby="pills-event-tab">
                            <form action="{{route('add-cart-concierge-service')}}" method="post">
                                @csrf
                                <input type="hidden" name="service_category_name" value="EVENT SERVICE">
                                <h5>EVENT SERVICE</h5>
                                <div class="list-group">
                                    <!-- <h4><strong>Men’s</strong></h4> -->
                                    @foreach ($event as $ev)
                                      <label class="list-group-item">
                                      <input class="form-check-input me-1" name="concierge_service[]" type="checkbox" value="{{$ev->service_name}}">
                                      {{$ev->service_name}}
                                      </label>
                                    @endforeach
                                    
                                </div>
                                <div class="add-to-card">
                                    <input type="submit" class="btn btn-success cart px-auto" value="ADD TO CART">
                                </div>
                            </form>
                        </div>
                      </div>
                    </div><!-- End tab-pane -->

                    <div class="tab-pane fade" id="list-business" role="tabpanel" aria-labelledby="list-business-list"><!-- Start tab-pane -->
                      <div class="tab-content" id="pills-tabContent2">
                        <div class="tab-pane fade show active" id="pills-business" role="tabpanel" aria-labelledby="pills-business-tab">
                            <form action="{{route('add-cart-concierge-service')}}" method="post">
                                @csrf
                                <input type="hidden" name="service_category_name" value="BUSINESS CENTER SERVICE">
                                <h5>BUSINESS CENTER SERVICE</h5>
                                <div class="list-group">
                                    <!-- <h4><strong>Men’s</strong></h4> -->
                                    @foreach ($business as $bu)
                                        <label class="list-group-item">
                                        <input class="form-check-input me-1" name="concierge_service[]" type="checkbox" value="{{$bu->service_name}}">
                                        {{$bu->service_name}}
                                        </label>
                                    @endforeach
                                    
                                </div>
                                <div class="add-to-card">
                                    <input type="submit" class="btn btn-success cart px-auto" value="ADD TO CART">
                                </div>
                            </form>
                        </div>
                      </div>
                    </div><!-- End tab-pane -->

                    <div class="tab-pane fade" id="list-foreigner" role="tabpanel" aria-labelledby="list-foreigner-list"><!-- Start tab-pane -->
                      <div class="tab-content" id="pills-tabContent2">
                        <div class="tab-pane fade show active" id="pills-foreigner" role="tabpanel" aria-labelledby="pills-foreigner-tab">
                            <form action="{{route('add-cart-concierge-service')}}" method="post">
                                @csrf
                                <input type="hidden" name="service_category_name" value="EXTERNAL SERVICE FOR FOREIGNERS">
                                <h5>EXTERNAL SERVICE FOR FOREIGNERS</h5>
                                <div class="list-group">
                                    <!-- <h4><strong>Men’s</strong></h4> -->
                                    @foreach ($external as $ex)
                                      <label class="list-group-item">
                                      <input class="form-check-input me-1" name="concierge_service[]" type="checkbox" value="{{$ex->service_name}}">
                                      {{$ex->service_name}}
                                      </label>
                                    @endforeach
                                    
                                </div>
                                <div class="add-to-card">
                                    <input type="submit" class="btn btn-success cart px-auto" value="ADD TO CART">
                                </div>
                            </form>
                        </div>
                      </div>
                    </div><!-- End tab-pane -->

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row d-flex align-items-center justify-content-center">
          <div class="col-12" data-aos="fade-up">
            <div class="top-title inner-heading d-flex align-items-center justify-content-center">
              <h3>How to order at Dhaka Dreamin’ App</h3>
            </div>
            <div class="video-contnet">
              @php
                  $setting = DB::table('settings')->where('id', 1)->first();
              @endphp
              {{-- <iframe width="100%" height="420" src="https://www.youtube.com/embed/ux-wbgMA20g" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
              <iframe class="embed-responsive-item" src="{{$setting->app_video}}" title="DOWNLOAD OUR IOS &ANDROID APPS" width="100%" height="420"  allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <div id="dtBox"></div><!-- End datepicker -->
@endsection