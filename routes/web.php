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

Route::get('/team3/','IndexController@index') -> name('index');
Route::get('/team3/auth/google', 'OAuthLoginController@getGoogleAuth');
Route::get('/team3/auth/callback/google', 'OAuthLoginController@authGoogleCallback');
