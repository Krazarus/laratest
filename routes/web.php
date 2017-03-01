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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('register/confirm/{token}', 'Auth\RegisterController@confirmEmail')->name('register.confirm');

//Route::post('login', 'Auth\LoginController@postLogin');


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
//    Route::group(['middleware' => 'admin:admin'], function () {
//        Auth::routes();
//    });
});


Route::resource('proxies', 'ProxiesController');
Route::resource('users', 'UsersController');

//Route::get('test', ['middleware' => 'admin:admin', function(){
//    return 'Pew pew';
//}]);






Route::get('/home', 'HomeController@index');

