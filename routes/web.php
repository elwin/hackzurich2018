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

//Route::get('/', 'UserController@test');
Route::get('/', 'UserController@index');
Route::get('/user', 'UserController@index');
Route::post('/user', 'UserController@create');
Route::get('/trip/{user}', 'TripController@index');
Route::post('/trip/{user}', 'TripController@create');
Route::get('/segment/{trip}', 'TripController@show');

Route::get('streetname', 'StreetController@place');