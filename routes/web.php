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
    'Menu\DailyMenuController@daily'
) -> name('index');

Route::get(
    '/menu/daily',
    'Menu\DailyMenuController@daily'
) -> name('menu.daily');

Route::get(
    '/menu/permanent',
    'Menu\PermanentMenuController@permanent'
) -> name('menu.permanent');

Route::get(
    '/menu/{menu_id}',
    'Menu\MenuDetailController@menuDetail'
) -> name('menu.detail');

Route::get(
    '/menu/{menu_id}/reviews',
    'Review\ReviewController@reviews'
) -> name('menu.reviews');

Route::get(
    '/menu/{menu_id}/review',
    'Review\ReviewController@review'
) -> name('menu.review');

Route::post(
    '/menu/{menu_id}/review/post',
    'Review\ReviewController@postReview'
) -> name('menu.review.post');

Route::get(
    '/auth/google',
    'Auth\OAuthLoginController@getGoogleAuth'
) -> name('login');

Route::get(
    '/auth/callback/google',
    'Auth\OAuthLoginController@authGoogleCallback'
);
