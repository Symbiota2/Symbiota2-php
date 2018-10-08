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
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user()->getEmail();
});
Route::group(['middleware' => ['cors','auth:api']], function () {
    Route::get('me','UserController@getMe');
    Route::post('logout','UserController@logoutApi');
});
