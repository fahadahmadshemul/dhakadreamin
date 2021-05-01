<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class DashboardCheck
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
        $username = Session::get('username');
        $email = Session::get('email');
        if(($id == NULL) || ($username == NULL) || ($email == NULL))
        {
            return redirect('admin-login');
        }
        return $next($request);
    }
}
