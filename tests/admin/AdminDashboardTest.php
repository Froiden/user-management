<?php

use App\Models\Admin;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminDashboardTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testDashboardIndexPage(){
        
        
        $this->actingAs($this->admin(),'admin')
             ->get(route('admin.dashboard.index'))
             ->dontSee('Whoops')
             ->see('dashboard')
             ->dontSee('Sorry');
    }
}
