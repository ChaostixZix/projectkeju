<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => '/'], function () {
    Route::get('/', 'chaos@index')->name('index');

    Route::get('user/profile', function () {
    });

    Route::get('/log-in', 'chaos@login')->name('login');

    Route::get('/panel/{page?}/{arg?}', 'chaos@dash')->name('dash');

    Route::post('/login', 'chaos@login_post')->name('login_post');

    Route::get('/buyrank/{page?}', 'chaos@donate');

    Route::post('/changepw', 'chaos@cpw');

    route::get('/logout', 'chaos@logout');

    route::get('/test', 'chaos@test');

    route::get('/sellrank', 'chaos@sellrank');

    route::post('/postadd', 'chaos@addpost');

    route::get('/test', 'chaos@test');

});