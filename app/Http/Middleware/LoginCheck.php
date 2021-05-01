<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class LoginCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $id = Session::get('id');
        $email = Session::get('email');
        $username = Session::get('username');
        if($id && $email && $username)
        {
            return redirect('dashboard');
        }
        return $next($request);
    }
}
