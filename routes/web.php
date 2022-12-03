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

Route::get('/', function () {
    return view('front/home');
});

Auth::routes();

Route::middleware('auth')
    ->prefix('admin') //per il /admin/home
    ->name('admin.')   //per il nome admin.home
    ->namespace('Admin')  //toglie Admin\
    ->group(function () {
        Route::get('/home', 'HomeController@index')->name('home');
        Route::resource('restaurants', 'RestaurantController')->only('index', 'create', 'store');
        Route::resource('plates', 'PlateController');
    });

Route::post('/orders/store', 'Admin\OrderController@store');

Route::get('{any?}', function () {
    return view('front.home');
})->where('any', '.*');
