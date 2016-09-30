<?php

use App\Models\Admin;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminUserTest extends TestCase
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

    public function testUserIndexPage(){

        $this->actingAs($this->admin(),'admin')
             ->get(route('admin.users.index'))
             ->dontSee('Whoops')
             ->see('users')
             ->dontSee('Sorry');
    }

    public function testUserCreate() {
        
        $this->actingAs($this->admin(),'admin')
             ->get(route('admin.users.create'))
             ->dontSee('Whoops')
             ->see('input')
             ->dontSee('Sorry');
        // Missing fields
        $this->actingAs($this->admin(),'admin')
             ->post(route('admin.users.store'),
                 ["name" => "",
                  "email" => "",
                  "password" => "",
                  "dob"     =>  "",
                  "gender"     =>  "",
                 ],
                 [
                     'X-Requested-With' => 'XMLHttpRequest'
                 ])
             ->dontSee("Whoops")
             ->see("fail");

        // Some field filled
        $this->actingAs($this->admin(),'admin')
             ->post(route('admin.users.store'),
                 ["name" => "",
                  "email" => "test@test.com",
                  "password" => "1122323",
                  "dob"     =>  "2016-09-01",
                  "gender"     =>  "",
                 ],
                 [
                     'X-Requested-With' => 'XMLHttpRequest'
                 ])
             ->dontSee("Whoops")
             ->see("fail");

        // Some field filled
        $this->actingAs($this->admin(),'admin')
             ->post(route('admin.users.store'),
                 ["name" => "new",
                  "email" => "test1@test.com",
                  "password" => "1122323",
                  "dob"     =>  "2016-09-01",
                  "gender"     =>  "male",
                 ],
                 [
                     'X-Requested-With' => 'XMLHttpRequest'
                 ])
             ->dontSee("Whoops")
             ->see("success");

    }
    public function testUserEdit() {

        $this->actingAs($this->admin(),'admin')
             ->get(route('admin.users.edit',$this->user()->id))
             ->dontSee('Whoops')
             ->see('input')
             ->dontSee('Sorry');
        // Missing fields
        $this->actingAs($this->admin(),'admin')
             ->put(route('admin.users.update',$this->user()->id),
                 ["name" => "",
                  "email" => "",
                  "password" => "",
                  "dob"     =>  "",
                  "gender"     =>  "",
                 ],
                 [
                     'X-Requested-With' => 'XMLHttpRequest'
                 ])
             ->dontSee("Whoops")
             ->see("fail");

        // Some field filled
        $this->actingAs($this->admin(),'admin')
            ->put(route('admin.users.update',$this->user()->id),
                 ["name" => "",
                  "email" => "test@test.com",
                  "password" => "1122323",
                  "dob"     =>  "2016-09-01",
                  "gender"     =>  "",
                 ],
                 [
                     'X-Requested-With' => 'XMLHttpRequest'
                 ])
             ->dontSee("Whoops")
             ->see("fail");

        // Some field filled
        $this->actingAs($this->admin(),'admin')
            ->put(route('admin.users.update',$this->user()->id),
                 [ "id" => $this->user()->id,
                  "name" => "new",
                  "email" => "test1@test.com",
                  "password" => "1122323",
                  "dob"     =>  \Carbon\Carbon::now(),
                  "gender"     =>  "male",
                     "status" => "active"
                 ],
                 [
                     'X-Requested-With' => 'XMLHttpRequest'
                 ])
             ->dontSee("Whoops")
             ->see("success");

    }

    public function testUserDelete() {


        // Missing fields
        $this->actingAs($this->admin(),'admin')
             ->delete(route('admin.users.destroy',$this->user()->id),
                 [
                 ],
                 [
                     'X-Requested-With' => 'XMLHttpRequest'
                 ])
             ->dontSee("Whoops")
             ->see("success");

    }
}
