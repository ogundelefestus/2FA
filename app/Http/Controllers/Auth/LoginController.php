<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use  App\Mail\OTPMail;
use Mail;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;



      /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */

    
    protected function attemptLogin(Request $request)
    {
        //Mail::send(new OTPMail);
        $result=$this->guard()->attempt(
            $this->credentials($request),
             $request->filled('remember')
        );

        if($result){
            $OTP=rand(100000, 999999);
            //dd($OTP)
            Mail::to('festusogundele9@gmail.com')->send(new OTPMail($OTP));
        }
        return $result;
    }





    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
