<?php

/**
 * Web.php
 *
 * PHP Version = 7.0
 *
 * @category Router
 * @package  Router
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

// menus
Route::get(
    '/',
    'MenuController@index'
) -> name('home');

Route::get(
    '/menus/{menu_id}',
    'MenuController@show'
) -> name('menus.show');


// reviews
Route::get(
    '/menus/{menu_id}/reviews',
    'ReviewController@index'
) -> name('menus.reviews.index');

Route::get(
    '/menus/{menu_id}/reviews/create',
    'ReviewController@create'
) -> name('menus.reviews.create');

Route::post(
    '/menus/{menu_id}/reviews',
    'ReviewController@store'
) -> name('menus.reviews.store');

// my page
Route::get(
    '/my_page',
    'UserController@show'
) -> name('my_page');

Route::get(
    '/my_page/favorites',
    'UserController@favorite'
) -> name('my_page.favorites');

Route::get(
    '/my_page/reviews',
    'UserController@reviews'
) -> name('my_page.reviews');


// login
Route::get(
    '/auth/google',
    'Auth\OAuthLoginController@getGoogleAuth'
) -> name('login');

Route::get(
    '/auth/callback/google',
    'Auth\OAuthLoginController@authGoogleCallback'
);
