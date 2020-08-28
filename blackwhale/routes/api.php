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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('teacats', 'TeaCatResourceController');
Route::resource('teasers', 'TeaSerResourceController');
Route::get('outlets', 'OutletController@rindex');
Route::get('outlets/{id}', 'OutletController@rshow');
// Route::get('orders', 'OrderController@rindex');
// Route::post('orders', 'OrderController@rstore');
// Route::resource('orders', 'OrderResourceController');
Route::get('orders', 'OrderResourceController@index');
Route::post('orders', 'OrderResourceController@store');
Route::get('customers', 'CustomerResourceController@index');
Route::post('customers', 'CustomerResourceController@store');
