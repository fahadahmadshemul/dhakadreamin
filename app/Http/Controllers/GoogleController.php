<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use Exception;
use App\Models\User;
use Session;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    
    {
        //dd($user = Socialite::driver('google')->user());
        try {
    
            $user = Socialite::driver('google')->user();
     
            $finduser = User::where('google_id', $user->id)->first();
     
            if($finduser){
                //i have to put data in session
                Session::put('customr_id', $finduser->id);
                Session::put('customr_name', $finduser->name);
                Session::put('customr_email', $finduser->email);
                Session::put('customr_phone', $finduser->phone);
                return redirect('/');
     
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => md5(sha1('123456')),
                ]);
                
                //i have to put data in session
                Session::put('customr_id', $newUser->id);
                Session::put('customr_name', $newUser->name);
                Session::put('customr_email', $newUser->email);
                Session::put('customr_phone', $newUser->phone);
                return redirect('/');
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    
    //for login with facebook
    //facebook
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
    
            $user = Socialite::driver('facebook')->user();
            $isUser = User::where('google_id', $user->id)->first();
     
            if($isUser){
                //i have to put data in session
                Session::put('customr_id', $isUser->id);
                Session::put('customr_name', $isUser->name);
                Session::put('customr_email', $isUser->email);
                Session::put('customr_phone', $isUser->phone);
                return redirect('/');
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => md5(sha1('123456')),
                ]);
                
                //i have to put data in session
                Session::put('customr_id', $newUser->id);
                Session::put('customr_name', $newUser->name);
                Session::put('customr_email', $newUser->email);
                Session::put('customr_phone', $newUser->phone);
                return redirect('/');
            }
    
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
}
