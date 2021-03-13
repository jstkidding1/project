<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
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
        if(auth()->user()->announcement_admin == 1){
            return $next($request);
        }else if(auth()->user()->attendance_admin == 2){
            return $next($request);
        }else if(auth()->user()->report_admin == 3){
            return $next($request);
        }else{

            return redirect('home')->with('error',"You don't have admin access.");
        }
   
    }
}
