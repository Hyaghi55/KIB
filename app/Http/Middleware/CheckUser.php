<?php

namespace App\Http\Middleware;
use Closure;
use Auth;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
   public function handle($request, Closure $next)
    {
        if (Auth::check()) {

    if(Auth::user()->active=='1')
        return $next($request);   

    else
    	session(['link' => url()->previous()]);
        return redirect('user/active');
        }
	session(['link' => url()->previous()]);
    return redirect('/user/login');
    }
}
