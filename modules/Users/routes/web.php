<?php

use Illuminate\Support\Facades\Auth;

Route::group(['middleware' => 'web', 'namespace' => 'Modules\Users\Http\Controllers'], function () {
    Auth::routes();
});
