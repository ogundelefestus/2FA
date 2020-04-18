<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VerifyOTPTest extends TestCase
{

    use DatabaseMigrations;

public function a_user_can_submit_otp_and_Get_verified(){
     
    $otp=rand(100000,999999);
    Cache::put(['OTP'=>$otp],now()->addSeconds(20));
    $this->post('/verifyOTP',['OTP'=>$OTP])->asertStatus(201);
    $this->assertDatabaseHas('users',['isVerified'=>1]);
}
}
