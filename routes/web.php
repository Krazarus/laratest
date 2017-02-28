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


Route::resource('proxies', 'ProxiesController');
Route::resource('users', 'UsersController');

Route::get('test', ['middleware' => 'admin:admin', function(){
    return 'Pew pew';
}]);




Auth::routes();

Route::get('/home', 'HomeController@index');
