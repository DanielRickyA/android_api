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
Route::put('user/{id}', 'Api\UserController@update');

Route::get('SewaKendaraan', 'Api\SewaKendaraanController@index');
Route::get('SewaKendaraan/{id}', 'Api\SewaKendaraanController@show');
Route::post('SewaKendaraan', 'Api\SewaKendaraanController@store');
Route::put('SewaKendaraan/{id}', 'Api\SewaKendaraanController@update');
Route::delete('SewaKendaraan/{id}', 'Api\SewaKendaraanController@destroy');

Route::get('SewaMotor', 'Api\SewaMotorController@index');
Route::get('SewaMotor/{id}', 'Api\SewaMotorController@show');
Route::post('SewaMotor', 'Api\SewaMotorController@store');
Route::put('SewaMotor/{id}', 'Api\SewaMotorController@update');
Route::delete('SewaMotor/{id}', 'Api\SewaMotorController@destroy');

Route::get('KritikSaran', 'Api\KritikSaranController@index');
Route::get('KritikSaran/{id}', 'Api\KritikSaranController@show');
Route::post('KritikSaran', 'Api\KritikSaranController@store');
Route::put('KritikSaran/{id}', 'Api\KritikSaranController@update');
Route::delete('KritikSaran/{id}', 'Api\KritikSaranController@destroy');