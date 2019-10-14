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

Route::get('/', 'PublicVehicleController@index');

Auth::routes();

Route::get('/profile/{id}', 'UserProfileController@show');

Route::get('/home', 'VehicleController@show');
//Vehicles routes
Route::get('/vehicles/edit', 'VehicleController@edit');
Route::patch('/vehicles/edit', 'VehicleController@update');

Route::delete('/home', 'VehicleController@destroy');

Route::get('/vehicle/create', 'VehicleController@create');
Route::post('/vehicle', 'VehicleController@store');

Route::get('/home/login', 'HomeController@index');


