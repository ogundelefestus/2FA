<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    public function setup(){

        parent::setUP();
        $this->withoutExceptionHandling();
    }
    public function LogInUser($args=[]){

        
   $user = factory(User::class)->create($args);
   $this->actingAs($user);
    }
}
