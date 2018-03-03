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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/downloadform', function() {
    return view('admins.downloadform');
});


Route::group(['prefix' => 'user'], function() {
    Route::get('/dashboard', ['as'=>'users-dashboard','uses'=>'UserController@getDashboard']);
});


Route::group(['prefix' => 'admin'], function() {
    Route::get('/dashboard',['as'=>'admin-dashboard','uses'=>'AdminController@getDaboard']);
});
