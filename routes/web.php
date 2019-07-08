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

Route::get(
    '/',
    'MenuController@index'
) -> name('home');

Route::get(
    '/menus/{menu_id}',
    'MenuController@show'
) -> name('menus.show');


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


Route::get(
    '/users/{user_id}/favorites',
    'FavoriteController@index'
) -> name('user_favorites');

Route::get(
    '/users/{user_id}/reviews',
    'ReviewController@user_reviews'
) -> name('user_reviews');


Route::get(
    '/auth/google',
    'Auth\OAuthLoginController@getGoogleAuth'
) -> name('login');

Route::get(
    '/auth/callback/google',
    'Auth\OAuthLoginController@authGoogleCallback'
);
