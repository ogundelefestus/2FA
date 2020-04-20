<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{

    use DatabaseMigrations;
    /**
     * Author:Fessy
     * Created:4/20/2020
     */


   public function after_login_can_not_access_home_page_until_verifired(){

   $this->loginInUser();
   $this->get('/home')->assertRedirect('/verifyOTP');

   }

   public function after_login_can_access_home_page_if_verifired(){
    $this->loginInUser(['isVerifed'=>  1]);
    $this->get('/home')->assertStatus(200);


   }
}
