<?php

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

Route::group([
    'prefix' => 'product'
], function(){
    Route::post('create', 'ProductController@create')->middleware('auth:api');
    Route::get('products', 'ProductController@products')->middleware('auth:api');
});

Route::group([
    'prefix' => 'sell'
], function(){
    Route::post('create', 'SellController@create')->middleware('auth:api');
});
