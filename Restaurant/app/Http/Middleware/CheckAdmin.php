<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

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
        if ( ! Auth::user() )
    {
        return redirect ('/')->with('status', 'You are not authorized');


    }
        if(Auth::user()->role != 'admin'){
            return redirect ('/')->with('status', 'You are not authorized');
        }
        return $next($request);
    }
}
