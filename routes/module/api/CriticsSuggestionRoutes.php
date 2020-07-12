<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'critics-suggestion', 'middleware' => 'jwt_guard'], function () {
	Route::group(['middleware' => 'acl:resident'], function () {
		Route::post('store', 'Api\CriticsSuggestionController@store');
	});
	Route::group(['middleware' => 'acl:admin'], function () {
		Route::get('/', 'Api\CriticsSuggestionController@index');
		Route::put('/mark-is-read/{id}', 'Api\CriticsSuggestionController@markIsRead');
	});
});

