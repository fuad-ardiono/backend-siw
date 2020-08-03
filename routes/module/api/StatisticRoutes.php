<?php
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'statistic'], function () {
	Route::get('/', 'Api\StatisticController@index');
});
