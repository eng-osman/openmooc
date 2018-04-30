<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
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
        // check login & user_group = 1
        if(Auth::check()) {
            if (Auth::user()->user_group == 1) {
                return $next($request);
            } else {
                return "You Don't have permission to see this page";
            }
        }else{
            return redirect('login');
        }
    }
}
