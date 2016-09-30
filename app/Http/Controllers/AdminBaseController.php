<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminBaseController extends Controller
{
    public $data = [];

    //region Magic Functions
    public function __set($name, $value) {
        $this->data[$name] = $value;
    }

    public function __get($name) {
        return $this->data[$name];
    }

    public function __isset($name)
    {
        return isset($this->data[$name]);
    }
    //endregion

    /**
     * AdminBaseController constructor.
     */
    public function __construct()
    {
        //Inject currently logged in admin object into every view of admin dashboard

        $this->middleware(function ($request, $next) {
            $this->admin = auth()->guard('admin')->user();
            $this->projectName = "Froiden";
            return $next($request);
        });

//        if (\Auth::guard('admin')->check()) {
//            $this->admin = Auth::guard('admin')->user();
//        }
//        $this->projectName = "Froiden";
    }

}
