<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminLoginPageTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
    //index
    public function testIndex()
    {
        // Check if Login Page is visible or not
        $this->visit('/admin')
            ->dontSee('Whoops')
            ->dontSee('Sorry');

        $this->visit('/admin')
            ->see('Login')
            ->dontSee('Whoops');
    }

    public function testAuth(){

        // Input Field Blank
        $post_url = route('admin.login_check');
        $this->post($post_url,
            [
                'email' => '',
                'password' =>''
            ],
            [
                'X-Requested-With' => 'XMLHttpRequest'
            ])
             ->dontSee('Whoops')
             ->see('fail');


        //Wrong Login Details
        $this->post($post_url,
            [
              "email" => "ajaysdfadfsafd",
              "password" => "123456",
           ],
            ['X-Requested-With' => 'XMLHttpRequest'])
             ->dontSee('success')
             ->dontSee('Whoops')
             ->dontSee('Sorry');

        $this->post($post_url,
            [
                "email" => $this->admin()->email,
                "password" => "123456",
            ],
            ['X-Requested-With' => 'XMLHttpRequest'])
             ->dontSee('Whoops')
             ->see("success")
             ->dontSee('Sorry');
    }
}
