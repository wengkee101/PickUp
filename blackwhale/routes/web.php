<?php

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
    return view('welcome');
});

//staff login
Route::get('/stafflogin', 'HomeController@stafflogin');


//for adding outlets
Route::get('/outlets', 'OutletController@index');
Route::get('/outlets/create', 'OutletController@create');
Route::post('/outlets/store', 'OutletController@store')->name('addOutlet');
Route::get('/outlets/{id}', 'OutletController@show');
Route::get('/outlets/{id}/edit', 'OutletController@edit');
Route::post('/outlets/{id}', 'OutletController@update')->name('editOutlet');
Route::get('/outlets/{id}/delete', 'OutletController@destroy')->name('deleteOutlet');