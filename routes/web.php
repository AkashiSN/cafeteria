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
    '/menus/{menu_id}',
    'MenuDetailController@menuDetail'
) -> name('menu.detail');

Route::get(
    '/menus/{menu_id}/reviews',
    'ReviewController@reviews'
) -> name('menu.reviews');

Route::get(
    '/menus/{menu_id}/review',
    'ReviewController@review'
) -> name('menu.review');

Route::post(
    '/menus/{menu_id}/review/post',
    'ReviewController@postReview'
) -> name('menu.review.post');

Route::get(
    '/auth/google',
    'Auth\OAuthLoginController@getGoogleAuth'
) -> name('login');

Route::get(
    '/auth/callback/google',
    'Auth\OAuthLoginController@authGoogleCallback'
);
