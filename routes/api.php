<?php

use Illuminate\Http\Request;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::post('register', 'Auth\RegisterController@register');
//Route::middleware('auth:api')->get('users','UserController@index');
Route::group(['middleware' => ['cors','auth:api']], function () {
    Route::get('users','UserController@index');
    Route::get('me','UserController@show');
    Route::post('logout','UserController@logoutApi');
});
