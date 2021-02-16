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

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


Route::middleware(['auth'])->group(function () {

    Route::get('admin', 'Admin\AdminController@index');
    Route::resource('admin/users', 'Admin\UsersController');
    Route::resource('admin/cities', 'Admin\CitiesController');
    Route::resource('admin/salons', 'Admin\SalonsController');

});

