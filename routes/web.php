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

Auth::routes();

Route::get('/','IndexController@index') -> name('index');
Route::get('/auth/google', 'OAuthLoginController@getGoogleAuth');
Route::get('/auth/callback/google', 'OAuthLoginController@authGoogleCallback');
