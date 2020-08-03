<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'head-family', 'middleware' => 'jwt_guard'], function () {
	Route::get('/', 'Api\HeadFamilyController@index');
	Route::get('/{id}', 'Api\HeadFamilyController@show');
	Route::post('store', 'Api\HeadFamilyController@store');
	Route::put('update', 'Api\HeadFamilyController@update');
});
