<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        if(Auth::check()){
            if(Auth::user()->role_as == '1'){
                return $next($request);
            }
            else{
                return redirect('/')->with('status','Access Denied!!! AS YOU ARE NOT AS ADMIN');
            }
        }
        else{
            return redirect('/home')->with('status','Please Login First');
        }
    }
}
