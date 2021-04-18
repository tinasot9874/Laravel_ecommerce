<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

/****************---------------Router Admin------------------*******************/
Route::group(['prefix'=>'admin', 'namespace'=>'Admin'], function(){

    Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'LoginController@login')->name('admin.login');
    Route::get('logout', 'LoginController@logout')->name('admin.logout');



    Route::group(['middleware' => ['auth:admin']], function (){
        Route::get('/', 'DashboardController@index')->name('admin.dashboard');

        Route::get('/settings', 'SettingController@index')->name('admin.settings');
        Route::post('/settings', 'SettingController@update')->name('admin.settings.update');
    });

});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/', function () {
    return view('welcome');
});







