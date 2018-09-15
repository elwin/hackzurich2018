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

Route::get('/', function() {
    App\Trip::all()->each(function ($trip) {
        App\Respoitories\ScoreRepository::completeTrip($trip);
    });

    return App\User::all();
});
//Route::get('/', 'UserController@index');
Route::get('/user', 'UserController@index');
Route::get('/user/{user}', 'TripController@index');