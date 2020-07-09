<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'auth'], function() {
	Route::post('signin', 'Api\AuthController@signin');

	Route::group(['middleware' => 'auth'], function () {
		Route::get('profile', 'Api\AuthController@getProfile');
		Route::post('signout', 'Api\AuthController@signout');
	});
});
