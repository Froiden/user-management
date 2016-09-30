<?php

/**
 * Admin Login And Forget Password Routes
 */
Route::group(["namespace" => 'Admin',"prefix" => "admin","middleware" => "web"], function()
{
    Route::get('/', ['as' => 'admin.login', 'uses' => 'AdminLoginController@index']);
    Route::post('/login', ['as' => 'admin.login_check', 'uses' => 'AdminLoginController@ajaxLogin']);
    Route::get('logout', ['as' => 'admin.logout', 'uses' => 'AdminLoginController@logout']);

    Route::post('password/reset', ['as' => 'admin.password.post_reset', 'uses' => 'AdminLoginController@post_reset']);
    Route::get('password/reset/{id}', ['as' => 'admin.password.get_reset', 'uses' => 'AdminLoginController@get_reset']);
    Route::post('forget_password', ['as' => 'admin.forget_password', 'uses' => 'AdminLoginController@forget_password']);

});

// Admin Panel After Login
Route::group(["namespace" => 'Admin', 'middleware' => ['auth.admin','web'], 'prefix' => 'admin'], function() {

    //region Dashboard Routes
    Route::resource('dashboard', 'AdminDashboardController',["as"=>"admin"]);
    //endregion

    //region Profile Routes
    Route::resource('profile', 'AdminProfileSettingController');
    //endregion

    //region Users Routes
    Route::get('get-users', ['as' => 'admin.get-users', 'uses' => 'AdminUserController@getUsersList']);
    Route::resource('users', 'AdminUserController',["as"=>"admin"]);
    //endregion
});