<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class VerifyOTPController extends Controller
{
    //
     /**
     * Author:Fessy
     * Created:4/20/2020
     */

    public function verify(Request $request){
     

        if(request('OTP')===Cache::get('OTP')){
        
      auth()->user()->update(['isVerified'=>true]);
      return redirect('/home');

    }
}

public function showVerifyForm(){

    return view('OTP.verify');
}
}