<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['domain' => route_system_domain('wechat')], function () {
    Route::group(['prefix' => 'test', 'namespace' => 'Test'], function () {
        Route::get('valid', 'check\\CheckController@valid');
    });
    Route::group(['namespace' => 'pro'], function () {
        
    });
});
