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

Route::group(['domain' => route_system_domain('admin')], function () {
    //登录、退出
    Route::group(['namespace' => 'Passport', 'prefix' => 'passport', 'as' => 'passport.'], function () {
        Route::match(['get', 'post'], 'login', ['as' => 'Login', 'uses' => 'PassportController@login']);
        Route::get('logout', ['as' => 'Logout', 'uses' => 'PassportController@logout']);
    });
    Route::group(['middleware' => 'admin.auth'], function () {
        //主页跳转
        Route::get('/', function () {return redirect('/admin');});

        //雅黑探针
        Route::get('/tz', function () {return view('admin::layout.tool.tz');});

        //后台
        Route::group(['namespace' => 'Admin'], function () {
            Route::get('/admin', 'IndexController@index');
        });

        //主页
        Route::group(['namespace' => 'Www'], function () {
            Route::get('/www', 'IndexController@index');
        });

        //博客
    	Route::group(['namespace' => 'Blog'], function () {
            Route::get('/blog', 'IndexController@index');
        });

        //书城
        Route::group(['namespace' => 'Book'], function () {
            Route::get('/book', 'IndexController@index');
        });

        //论坛
        Route::group(['namespace' => 'Bbs'], function () {
            Route::get('/bbs', 'IndexController@index');
        });

        //商城
    	Route::group(['namespace' => 'Mall'], function () {
            Route::get('/mall', 'IndexController@index');
        });

        //微信公众号
    	Route::group(['namespace' => 'Wechat'], function () {
            Route::get('/wechat', 'IndexController@index');
        });
        
        //进销存
        Route::group(['namespace' => 'Ims'], function () {
            Route::get('/ims', 'IndexController@index');
        });
    });
});
