<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\User;
use App\Models\RoomContent;

use Session;
//for send mail
use App\Mail\CheckOutMail;
use Illuminate\Support\Facades\Mail;
//for send mail end----- 

class ReservationController extends Controller
{
    //search_for_reservation
    public function search_for_reservation()
    {
        $check_in = $_GET['Check_in'];
        $check_out = $_GET['Check_out'];
        $adult = $_GET['adult'];
        $child = $_GET['child'];
        $infant = $_GET['infant'];
        $check = Room::where('book_date_from', NULL)
                    ->where('book_date_to', NULL)
                    ->orWhere('book_date_from', '!=', $check_in)
                    ->orWhere('book_date_to', '!=', $check_out)
                    ->get();
        $count = Room::where('book_date_from', NULL)
                    ->where('book_date_to', NULL)
                    ->orWhere('book_date_from', '!=', $check_in)
                    ->orWhere('book_date_to', '!=', $check_out)
                    ->count();
        $reservation_content = RoomContent::find(1);
        return view('frontend.make_reservation', compact('check', 'check_in', 'check_out', 'adult', 'child', 'infant',  'count','reservation_content'));
    }

    //reservation
    public function reservation(){
        $check = Room::where('book_date_from', NULL)
                    ->where('book_date_to', NULL)
                    ->where('booked_user_id', NULL)
                    ->get();
        $count = Room::where('book_date_from', NULL)
                    ->where('book_date_to', NULL)
                    ->where('booked_user_id', NULL)
                    ->count();
        $reservation_content = RoomContent::find(1);
        return view('frontend.reservation', compact('check', 'count', 'reservation_content'));
    }

    //add_to_cart
    public function add_to_cart($id, $check_in, $check_out, $adult, $child, $infant)
    {
        
        $customer_id = Session::get('customr_id');
        $customer = User::find($customer_id);
        $room = Room::find($id);
        return view('frontend.add_to_cart', compact('customer', 'id', 'room', 'check_in', 'check_out', 'adult', 'child', 'infant'));
    }
    //add_to_cart2
    public function add_to_cart_2($id)
    {
        $customer_id = Session::get('customr_id');
        $customer = User::find($customer_id);
        $room = Room::find($id);
        return view('frontend.add_to_cart2', compact('customer', 'id', 'room',));
    }

    //check_out
    public function check_out(Request $request,$id)
    {
        $details = [
            'customer_name' => $request->name,
            'customer_email' => $request->email,
            'customer_phone' => $request->phone,
            'title' => $request->title,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'adult' => $request->adult,
            'child' => $request->child,
            'infant' => $request->infant,
        ];
        
        $mail = Mail::to('fahadahmadshemul@gmail.com')->send(new CheckOutMail($details));
        if($mail)
        {
            $customer_id = Session::get('customr_id');
            $save = Room::find($id);
            if($save->book_date_from == NULL || $save->book_date_to == NULL || $save->booked_user_id == NULL)
            {
                $save->book_date_from = $request->check_in;
                $save->book_date_to = $request->check_out;
                $save->booked_user_id = $customer_id;
                $save->save();
                Session::put('checkout_message', 'A staff from Dhaka Dreamin’ will be with you shortly with prices and procedures.');
                return redirect('success');
            }
        }else{
            $customer_id = Session::get('customr_id');
            $save = Room::find($id);
            if($save->book_date_from == NULL || $save->book_date_to == NULL || $save->booked_user_id == NULL)
            {
                $save->book_date_from = $request->check_in;
                $save->book_date_to = $request->check_out;
                $save->booked_user_id = $customer_id;
                $save->save();
                Session::put('checkout_message', 'A staff from Dhaka Dreamin’ will be with you shortly with prices and procedures.');
                return redirect('success');
            }
        }
        
    }

    //check_out2
    public function check_out2(Request $request,$id){
        $details = [
            'customer_name' => $request->name,
            'customer_email' => $request->email,
            'customer_phone' => $request->phone,
            'title' => $request->title,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'adult' => $request->adult,
            'child' => $request->child,
            'infant' => $request->infant,
        ];
        

        $mail = Mail::to('fahadahmadshemul@gmail.com')->send(new CheckOutMail($details));
        if($mail)
        {
            $customer_id = Session::get('customr_id');
            $save = Room::find($id);
            if($save->booked_user_id == NULL)
            {
                $save->booked_user_id = $customer_id;
                $save->save();
                Session::put('checkout_message', 'A staff from Dhaka Dreamin’ will be with you shortly with prices and procedures.');
                return redirect('success');
            }
        }else{
            $customer_id = Session::get('customr_id');
            $save = Room::find($id);
            if($save->booked_user_id == NULL)
            {
                $save->booked_user_id = $customer_id;
                $save->save();
                Session::put('checkout_message', 'A staff from Dhaka Dreamin’ will be with you shortly with prices and procedures.');
                return redirect('success');
            }
        }
    }

    //success
    public function success()
    {
        return view('frontend.success');
    }
}
