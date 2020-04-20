<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VerifyOTPTest extends TestCase
{

    use DatabaseMigrations;
     /**
     * Author:Fessy
     * Created:4/20/2020
     */

public function a_user_can_submit_otp_and_Get_verified(){
     //$this->withoutExceptionHandling();
    $this->logInUser();
    $OTP=auth()->user()->cacheTheOTP();
    //Cache::put(['OTP'=>$otp],now()->addSeconds(20));
    $this->post('/verifyOTP',[auth()->user()->OTPKey()=>$OTP])->asertStatus(302);
    $this->assertDatabaseHas('users',['isVerified'=>1]);
}
public function user_can_see_otp_verify_page(){
    $this->logInUser();
    $this->get('/verifyOTP')
    ->assertStatus(200)
    ->assertSee('Enter OTP');
}
}
