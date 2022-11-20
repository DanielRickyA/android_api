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

Route::post('register', 'Api\UserController@register');
Route::post('login', 'Api\UserController@login');
Route::get('user/{id}', 'Api\UserController@show');

Route::get('SewaKendaraan', 'Api\SewaKendaraanController@index');
Route::get('SewaKendaraan/{id}', 'Api\SewaKendaraanController@show');
Route::post('SewaKendaraan', 'Api\SewaKendaraanController@store');
Route::put('SewaKendaraan/{id}', 'Api\SewaKendaraanController@update');
Route::delete('SewaKendaraan/{id}', 'Api\SewaKendaraanController@destroy');
