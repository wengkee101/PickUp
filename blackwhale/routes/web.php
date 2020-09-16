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
    if (session('success_message')){ 
        Alert::success('Success', session('success_message'));
    }
    return view('welcome');
});

Route::get('/cust', function () {
    return view('customer.viewmenu');
});

Route::get('/checkout', function () {
    return view('customer.checkout');
});

Route::get('/homepage', function () {
    return view('homepage');
});

Route::get('/about', function () {
    return view('aboutUs');
});

Route::get('/outlet', function () {
    return view('outlet');
});

Route::get('/staffhome', function(){
    if (session('success_message')){ 
        Alert::success('Success', session('success_message'));
    }
    return view('staffhome');
});

Route::get('/view', function(){
    return view('view');
});

//view Update Event                 - function:D    Testing:    UI Design:   Complete:       
Route::get('/eventupdate', 'EventController@index');
Route::post('/addevent', 'EventController@store')->name('addevent'); //the name at behind is from form-action
Route::get('/eventpage', 'EventController@display');

//view Franchise Opportunities      - function:     Testing:    UI Design:   Complete:
Route::get('/franchise', 'FranchiseController@index');
Route::post('/addform', 'FranchiseController@store')->name('addform');
Route::get('/franchise_page', 'FranchiseController@display');
Route::any('/franchisesearch', 'FranchiseController@userSearch');

//for adding outlets
Route::get('/outlets', 'OutletController@index');
Route::get('/outlets/create', 'OutletController@create');
Route::post('/outlets/store', 'OutletController@store')->name('addOutlet');
Route::get('/outlets/{id}', 'OutletController@show');
Route::get('/outlets/{id}/edit', 'OutletController@edit');
Route::post('/outlets/{id}', 'OutletController@update')->name('editOutlet');
Route::get('/outlets/{id}/delete', 'OutletController@destroy')->name('deleteOutlet');
    //for search query in outlets
Route::any('/search', 'OutletController@userSearch');


//Route for tea series
Route::get('/teas', 'TeaSerController@index');
Route::resource('teaser', "TeaSerController");
Route::resource('teacat', "TeaCatController");
Route::post('/teaser/store', 'TeaSerController@store')->name('addTeaSer');
Route::post('/teacat/store', 'TeaCatController@store')->name('addTeaCat');
Route::post('/teaser/{id}/update', 'TeaSerController@update')->name('editTeaSer');
Route::post('/teacat/{id}/update', 'TeaCatController@update')->name('editTeaCat');
Route::get('/teacat/{id}/delete', 'TeaCatController@destroy')->name('deleteTeaCat');
Route::get('/teaser/{id}/delete', 'TeaSerController@destroy')->name('deleteTeaSer');
Route::get('teasss', 'TeaSerController@sss');

//view Help Center                  - function:     Testing:    UI Design:   Complete:

//authentication and staff
Auth::routes();
Auth::routes();
Route::get('/orders', 'OrderController@index');
Route::get('/order/{id}', 'OrderController@show');
Route::get('/custDetails', 'OrderController@custIndex');

Route::get('/home', 'HomeController@index')->name('home');



