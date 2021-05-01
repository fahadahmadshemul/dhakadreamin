<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use Session;
use App\Models\User;
use App\Models\Room;
use App\Models\BusinessCenter;
use App\Models\ConciergeService;
use App\Models\Event;
use App\Models\External;
use App\Models\FoodBeverage;
use App\Models\HousekeppingRoom;
use App\Models\Laundry;
use App\Models\DryCleaning;
use App\Models\Pressing;
use App\Models\AboutUs;
use App\Models\FooterAbout;
use App\Models\FooterCommunity;
use App\Models\FooterSupport;

//for send mail
use App\Mail\ServicePlace;
use App\Mail\AirportDropPick;
use App\Mail\CarRental;
use App\Mail\BicycleRental;
use App\Mail\ContactUs;
use Illuminate\Support\Facades\Mail;

class ServiceCenterController extends Controller
{
    //index
    public function index()
    {
        
        $business = BusinessCenter::all();
        $concierge = ConciergeService::all();
        $event = Event::all();
        $external = External::all();
        $foodbeverage = FoodBeverage::all();
        $housekeppingroom = HousekeppingRoom::all();
        return view('frontend.service_center.service_center', compact('business','concierge', 'event', 'external', 'foodbeverage', 'housekeppingroom'));
    }
    //concierge_service
    public function concierge_service(Request $request)
    {
        // Cart::destroy();
        // return back();
        $id = $request->id;
        $concierge_service = $request->concierge_service;
        foreach ($concierge_service as $key => $value) {
            Cart::add([
                'id' => uniqid(),
                'name' => $value,
                'qty' => 1,
                'price' => 1,
                'weight' => 1,
                'options' => ['service_category_name' => $request->service_category_name]
            ]);
        }
        Session::put('success', 'Add To Cart Successfully....!');
        return back();
    }

    //service_checkout
    public function service_checkout()
    {
        return view('frontend.service_center.service_checkout');
    }

    //place_service_request
    public function place_service_request()
    {
        $cart_collection = Cart::content();
        $customer_id = Session::get('customr_id');
        $customer = User::find($customer_id);
        $room = Room::where('booked_user_id', $customer_id)->first();
        if($room != NULL){
            $room_no = $room->title;
        }else{
            $room_no = NULL;
        }
        $mail = Mail::to('reservation@dhakadreamin.com')->send(new ServicePlace($cart_collection, $customer, $room_no));
        Session::put('checkout_message', 'Place Your Request Successfully....!');
        Cart::destroy();
        return redirect('success');
    }

    //airport_pick_up_drop
    public function airport_pick_up_drop(Request $request)
    {
        $details = [
            'check_inDate'    => $request->check_inDate,
            'check_inTime'   => $request->check_inTime,
            'check_outDate'   => $request->check_outDate,
            'check_outTime'  => $request->check_outTime,
            'adult_per_room' => $request->adult_per_room,
            'child_per_room' => $request->child_per_room,
            'infants'       => $request->infants,
            'name'       => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'whatsapp'   => $request->whatsapp,
            'message'   => $request->message,
        ];
        $customer_id = Session::get('customr_id');
        $customer = User::find($customer_id);
        $mail = Mail::to('fahadahmadshemul@gmail.com')->send(new AirportDropPick($details, $customer));
        Session::put('success', 'Airport Pick Up/Drop Off Successfully Complete....!');
        return back();
    }

    //car_rental
    public function car_rental(Request $request)
    {
        $details = [
            'Inside_City'    => $request->Inside_City,
            'Outside_City'   => $request->Outside_City,
            'check_inDate'    => $request->check_inDate,
            'check_inTime'   => $request->check_inTime,
            'check_outDate'   => $request->check_outDate,
            'check_outTime'  => $request->check_outTime,
            'adult_per_room'       => $request->child_per_room,
            'child_per_room'       => $request->child_per_room,
            'infants'       => $request->infants,
            'Name'       => $request->Name,
            'Email'      => $request->Email,
            'phone'      => $request->phone,
            'Whatsapp'   => $request->WhatsApp,
            'message'   => $request->message,
        ];
        $customer_id = Session::get('customr_id');
        $customer = User::find($customer_id);
        $mail = Mail::to('fahadahmadshemul@gmail.com')->send(new CarRental($details, $customer));
        Session::put('success', 'Car Rental Request Successfully Complete....!');
        return back();
    }

    //
    public function bicycle_rental(Request $request)
    {
        $details = [
            'check_inDate'    => $request->check_inDate,
            'check_inTime'   => $request->check_inTime,
            'check_outDate'   => $request->check_outDate,
            'check_outTime'  => $request->check_outTime,
            'adult_per_room'       => $request->child_per_room,
            'child_per_room'       => $request->child_per_room,
            'infants'       => $request->infants,
            'Name'       => $request->Name,
            'Email'      => $request->Email,
            'phone'      => $request->phone,
            'Whatsapp'   => $request->WhatsApp,
            'message'   => $request->message,
        ];
        $customer_id = Session::get('customr_id');
        $customer = User::find($customer_id);
        $mail = Mail::to('fahadahmadshemul@gmail.com')->send(new BicycleRental($details, $customer));
        Session::put('success', 'Bicycle Rental Request Successfully Complete....!');
        return back();
    }

    //about_us
    public function about_us()
    {
        $AboutUs = AboutUs::find(1);
        return view('about', compact('AboutUs'));
    }

    //contact us
    public function contact_us()
    {
        return view('contact');
    }

    //contact_mail
    public function contact_mail(Request $request)
    {
        $details = [
        
            'name'       => $request->name,
            'email'      => $request->email,
            'subject'      => $request->subject,
            'message'   => $request->message,
        ];
        $customer_id = Session::get('customr_id');
        $customer = User::find($customer_id);
        $mail = Mail::to('info@dhakadreamin.com')->send(new ContactUs($details));
        Session::put('success', 'Send Inquiries Request Successfully....!');
        return back();
    }

    // use App\Models\FooterAbout;
    // use App\Models\FooterCommunity;
    // use App\Models\FooterSupport;
    //about_content_by_id
    public function about_content_by_id($id)
    {
        $content = FooterAbout::where('category', $id)->first();
        if($content != NULL)
        {
            return view('frontend.footer.footer_about', compact('content'));
        }else{
            return view('frontend.404');
        }
        
    }
    public function community_content_by_id($id)
    {
        $content = FooterCommunity::where('category', $id)->first();
        if($content != NULL){
            return view('frontend.footer.footer_community', compact('content'));
        }else{
            return view('frontend.404');
        }
        
    }
    public function support_content_by_id($id)
    {
        $content = FooterSupport::where('category', $id)->first();
        if($content != NULL)
        {
            return view('frontend.footer.footer_support', compact('content'));
        }else{
            return view('frontend.404');
        }
        
    }

}
