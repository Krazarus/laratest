<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'ProxiesController@index');

Auth::routes();

Route::get('register/confirm/{token}', 'Auth\RegisterController@confirmEmail')->name('register.confirm');



Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    $this->get('login', 'Auth\LoginController@showLoginForm');
    $this->post('login', 'Auth\LoginController@login')->name('admin.login');
    $this->get('logout', 'Auth\LoginController@logout');

    // Password Reset Routes...
//    $this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    $this->post('password/reset', 'Auth\ResetPasswordController@reset');
    $this->post('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');

    Route::get('/', 'HomeController@index');

});


Route::resource('proxies', 'ProxiesController');
Route::resource('users', 'UsersController');
Route::resource('checks', 'ChecksController');



Route::get('/home', 'HomeController@index');

