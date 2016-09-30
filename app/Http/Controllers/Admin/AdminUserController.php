<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Reply;
use App\Http\Controllers\AdminBaseController;
use App\Http\Requests;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Facades\Datatables;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

class AdminUserController extends AdminBaseController
{

    public function __construct() {
        parent::__construct();
        $this->pageTitle = trans('menu.users');
    }

    public function index() {
        return \View::make(settings('theme_folder').'admin.users.index', $this->data);
    }

    public function getUsersList() {
        $users = User::select('id', 'name', 'email', 'dob', 'gender', 'created_at', 'status');

        $data = Datatables::of($users)
            ->addColumn(
                'action',
                function($row) {
                     // Edit Button
                     $string = '<button onclick="editModal('.$row->id.')" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</button> ';
                     //Delete Button
                     $string .= '<button onclick="deleteAlert('.$row->id.',\''.addslashes($row->name).'\')" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
                     return $string;
                }
            )
            ->editColumn(
                'created_at',
                function ($row) {
                    return Carbon::parse($row->created_at)->format('d F, Y');
                }
            )
            ->editColumn(
                'dob',
                function ($row) {
                    return Carbon::createFromFormat('Y-m-d', $row->dob)
                        ->diff(Carbon::now())
                        ->format('%y years, %m months and %d days');
                }
            )
            ->editColumn(
                'status',
                function ($row) {
                    $color = ['active' => 'success', 'inactive' => 'danger'];

                    return "<span id='status{$row->id}' class='label label-{$color[$row->status]}'>" .
                    trans("core." . $row->status) . "</span>";
                }
            )
            ->editColumn(
                'gender',
                function ($row) {
                    $color = ['male' => 'aqua-active', 'female' => 'maroon'];

                    return "<span id='status{$row->id}' class='label bg-{$color[$row->gender]} disabled ".
                        "color-palette'> <i class='fa fa-{$row->gender}'></i> " .
                        $row->gender. "</span>";
                }
            )
            ->make(true);
        return $data;

    }

    public function create() {

        return \View::make(settings('theme_folder').'admin.users.create-edit', $this->data);
    }

    public function store(UserStoreRequest $request) {
        \DB::beginTransaction();

        $user = new User();
        $user->name  = $request->get('name');
        $user->email = $request->get('email');
        $user->dob   = Carbon::parse($request->get('dob'))->format('Y-m-d');
        $user->gender   = $request->get('gender');
        $user->password = Hash::make($request->get('password'));
        $user->save();

        \DB::commit();
        return Reply::success('messages.createSuccess');

    }

    public function edit($id) {
        $this->user = User::find($id);

        //Call the same create view for edit
        return $this->create();
    }

    public function update(UserUpdateRequest $request,$id) {
        \DB::beginTransaction();

        $user = User::find($id);
        $user->name     = $request->get('name');
        $user->email    = $request->get('email');
        $user->status   = $request->get('status');
        $user->dob   = Carbon::parse($request->get('dob'))->format('Y-m-d');
        $user->gender   = $request->get('gender');

        if($request->password){
            $user->password = Hash::make($request->password);
        }

        $user->save();

        \DB::commit();
        return Reply::success('messages.updateSuccess');

    }

    public function destroy($id) {
        User::destroy($id);
        return Reply::success('messages.deleteSuccess');
    }

}
