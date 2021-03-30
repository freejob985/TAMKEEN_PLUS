<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\ComingSoon;

class MaintananceMode
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
        $ip = $request->ip();

        $comingsoon = ComingSoon::first();


        $ip_address = array();

        
     
        


        return $next($request);
                
            
        
        
    }
}
