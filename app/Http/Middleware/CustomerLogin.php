<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class CustomerLogin
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
        $customer_id = Session::get('customr_id');
        $customer_name = Session::get('customr_name');
        $customer_email = Session::get('customr_email');
        $customer_phone = Session::get('customr_phone');

        if ($customer_id != NULL && $customer_name != NULL && $customer_email != NULL && $customer_phone != NULL){
            return redirect('/');
        }
        return $next($request);
    }
}
