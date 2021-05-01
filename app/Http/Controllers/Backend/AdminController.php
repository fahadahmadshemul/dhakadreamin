<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Session;

class AdminController extends Controller
{
    //index
    public function index()
    {
        return view('dashboard');
    }
    //login
    public function login()
    {
        return view('backend.login');
    }
    //save_login
    public function save_login(Request $request)
    {
        $request->validate([
           'username' => 'required', 
           'password' => 'required', 
        ]);
        $username = $request->username;
        $password = md5(sha1($request->password));
        $save_login = Admin::where('username', $username)->where('password', $password)->first();
        if($save_login)
        {
            Session::put('id', $save_login->id);
            Session::put('username', $save_login->username);
            Session::put('email', $save_login->email);
            return redirect('dashboard');
        }else{
            Session::put('admin_login_fail', 'User Name or Password Not Match....');
            return back();
        }
    }
    //logout
    public function logout()
    {
        Session::put('id', NULL);
        Session::put('username', NULL);
        Session::put('email', NULL);
        return redirect('admin-login');
    }
}
