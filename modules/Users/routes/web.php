<?php

use Illuminate\Support\Facades\Auth;

Route::group(['middleware' => 'web', 'namespace' => 'Modules\Users\Http\Controllers'], function () {
    Auth::routes();

	Route::group(['middleware' => 'auth'],function () {
		Route::get('/home', 'HomeController@getHomePage')->name('home');
		Route::post('/home', 'HomeController@postEditUser')->name('home.post');
	});
});
