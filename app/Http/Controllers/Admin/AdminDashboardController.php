<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminBaseController;
use App\Http\Requests;
use Illuminate\Support\Facades\View;

class AdminDashboardController extends AdminBaseController
{

    public function __construct() {
        parent::__construct();
        $this->pageTitle = trans('menu.dashboard');
    }

    public function index() {
        return View::make(settings('theme_folder').'admin.dashboard', $this->data);
    }
    
}
