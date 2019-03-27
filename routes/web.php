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

Route::get('/home', 'HomeController@index');

Route::resource('/calendar','EventController'); 

Route::group(['middleware' => 'admin'], function () {
             
    Route::get('/crearevento','EventController@display');    
    Route::get('/listaeventos','EventController@show');
    Route::get('/informes','Admin\InformeController@index');
    Route::get('/agregarsala','Admin\SalaController@getSala');
    Route::post('/agregarsala','Admin\SalaController@postSala');

             
});


