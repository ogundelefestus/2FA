<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class EmailTest extends TestCase
{
    /**
     * Author:Fessy
     * Created:4/17/2020
     */
    use DatabaseMigrations;
    public function an_otp_email_is_send_when_user_is_logged_in(){
      Mail::fake();
      $this->withoutExceptionHandling();
        $user=factory(User::class)->create();
       $res=$this->post('/login',['email'=>$user->email,'password'=>'secret']);
       Mail::assertSent(OTPMail::class);
    }

    public function an_otp_email_is_not_send_if_credentials_are_incorrect(){
      

      Mail::fake();
      //$this->withoutExceptionHandling();
        $user=factory(User::class)->create();
       $res=$this->post('/login',['email'=>$user->email,'password'=>'secretbgg']);
       Mail::assertNotSent(OTPMail::class);




    }

    public function otp_is_stred_in_cache_for_user(){
      $user=factory(User::class)->create();
      $res=$this->post('/login',['email'=>$user->email,'password'=>'secretbgg']);
      $this->assertNotNull($user->OTP());

    }
}
