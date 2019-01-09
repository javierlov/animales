<?php

namespace App\Http\Middleware;

use Closure;

class CountryMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $country)
    {
        //$country = 'Mexico'; 
        if( $country == 'Argentina' ){ 
            return $next($request);             
        } 
        return redirect('/'); 
             
    }
}
