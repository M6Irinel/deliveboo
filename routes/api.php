<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::resource('restaurants', 'Api\RestaurantController')->only('index', 'show');
Route::get('/restaurants/index/{value}', 'Api\RestaurantController@index');
Route::get('/restaurants/{value}', 'Api\RestaurantController@show');

Route::resource('typologies', 'Api\TypologiesController')->only('index', 'show');

// For EMAIL
// Route::post('email', 'Api\EmailController@store')->name('email');

Route::get('generate', 'Api\BraintreeController@generate');
Route::post('make/payment', 'Api\BraintreeController@makePayment');
