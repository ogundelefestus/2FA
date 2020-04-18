<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{

    use DatabaseMigrations;


   public function after_login_can_not_access_home_page_until_verifired(){

   $user = factory(User::class)->create();
   $this->actingAs($user);
   $this->get('/home')->assertRedirect('/');
   }
   public function after_login_can_access_home_page_if_verifired(){

    $user = factory(User::class)->create(['isVerifed'=>  1]);
    $this->actingAs($user);
    $this->get('/home')->assertStatus(200);


   }
}
