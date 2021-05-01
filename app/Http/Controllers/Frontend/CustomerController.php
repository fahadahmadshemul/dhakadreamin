<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Session;

class CustomerController extends Controller
{
    //signup
    public function signup()
    {
        return view('frontend.signup');
    }

    //save_signup
    public function save_signup(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required|min:9',
            'password' => 'required',
        ]);
        $save = new User;
        $save->name = $request->name;
        $save->email = $request->email;
        $save->phone = $request->phone;
        $save->password = md5(sha1($request->password));
        $save->save();
        $save->id;
        Session::put('customr_id', $save->id);
        Session::put('customr_name', $request->name);
        Session::put('customr_email', $request->email);
        Session::put('customr_phone', $request->phone);
        Session::put('success', 'Sign Up Successfully Completed..!');
        return redirect('/');
    }

    //login
    public function login()
    {
        return view('frontend.login');
    }
    //login
    public function login2()
    {
        return view('frontend.login2');
    }

    //logout-
    public function logout()
    {
        Session::put('customr_id', NULL);
        Session::put('customr_name', NULL);
        Session::put('customr_email', NULL);
        Session::put('customr_phone', NULL);
        return redirect('customer-login');
    }

    //save
    public function save(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $check = User::where('email', $request->email)->where('password', md5(sha1($request->password)))->first();
        
        if($check)
        {
            Session::put('customr_id', $check->id);
            Session::put('customr_name', $check->name);
            Session::put('customr_email', $check->email);
            Session::put('customr_phone', $check->phone);
            return redirect('/');
        } 
    }

    //authcheck 
    private function authcheck()
    {
        $customer_id = Session::get('customr_id');
        $customer_name = Session::get('customr_name');
        $customer_email = Session::get('customr_email');
        $customer_phone = Session::get('customr_phone');

        if ($customer_id == NULL && $customer_name == NULL && $customer_email == NULL && $customer_phone == NULL){
            
        }
    }

    
}
