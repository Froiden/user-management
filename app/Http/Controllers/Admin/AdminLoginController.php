<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Reply;
use App\Http\Controllers\AdminBaseController;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class AdminLoginController extends AdminBaseController
{

    public function __construct() {
        parent::__construct();
        $this->pageTitle = trans('core.login');
    }

    public function index() {
        // If a user is already logged in, log him out
        if(\Auth::guard('admin')->check()) {
            return \Redirect::route('admin.dashboard.index');
        }

        return \View::make(settings('theme_folder').'admin.login', $this->data);
    }

    public function ajaxLogin(Requests\LoginRequest $request) {
        $email      = $request->get('email');
        $password   = $request->get('password');

        // Credentials to check admin login
        $credentials = array('email' => $email, 'password' => $password);
        $remember    = $request->remember ? true : false;

        if (\Auth::guard('admin')->attempt($credentials, $remember)) {
            // User login success
            return Reply::redirect(route('admin.dashboard.index'), 'messages.loginSuccess');

        }

        // Login Failed
        return Reply::error('messages.loginFail');
    }

    public function logout() {
        \Auth::guard('admin')->logout();
         return \Redirect::route('admin.login');
    }

}
