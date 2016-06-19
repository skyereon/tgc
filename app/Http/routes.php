<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::controllers([
//    'auth' => 'Auth\AuthController',
//    'password' => 'Auth\PasswordController',
//]);

Route::get('/csgo', ['as' => 'csgo', 'uses' => 'CsgoController@index']);

Route::get('/dota', ['as' => 'dota', 'uses' => 'DotaController@index']);

Route::get('/lol', ['as' => 'lol', 'uses' => 'LolController@index']);

Route::get('/heartstone', ['as' => 'heartstone', 'uses' => 'HeartstoneController@index']);

Route::get('steamlogin', 'AuthController@login');

// Authentication routes...
//Route::get('auth/login', 'Auth\AuthController@getLogin');
//Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('logout', 'AuthController@logout');

// Registration routes...
//Route::get('auth/register', 'Auth\AuthController@getRegister');
//Route::post('auth/register', 'Auth\AuthController@postRegister');