<?php

namespace App\Http\Middleware;

use Closure;

class TwoFA
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

     /**
      * Author:Fessy
      *Created:4/17/2020
      */
    public function handle($request, Closure $next)
    {

        //Check If User Is Verified Or Else Redirect Back To Login Page
        if(auth()->user()->isVerified){
        return $next($request);
        }
        return redirect('/');

}
}
