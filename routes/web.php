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
    'MenuController@home'
) -> name('home');

Route::get(
    '/menu/{menu_id}',
    'MenuDetailController@menuDetail'
) -> name('menu.detail');

Route::get(
    '/menu/{menu_id}/reviews',
    'ReviewController@index'
) -> name('menu.reviews.index');

Route::get(
    '/menu/{menu_id}/reviews/create',
    'ReviewController@create'
) -> name('menu.reviews.create');

Route::post(
    '/menu/{menu_id}/reviews',
    'ReviewController@store'
) -> name('menu.reviews.store');

Route::get(
    '/auth/google',
    'Auth\OAuthLoginController@getGoogleAuth'
) -> name('login');

Route::get(
    '/auth/callback/google',
    'Auth\OAuthLoginController@authGoogleCallback'
);
