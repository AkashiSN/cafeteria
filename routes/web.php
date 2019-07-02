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
    '/menu/permanent',
    'Menu\PermanentMenuController@permanent'
) -> name('permanent');

Route::get(
    '/menu/{menu_id}/reviews',
    'ReviewController@reviews'
) -> name('menu.reviews');

Route::get(
    '/menu/{menu_id}/review',
    'ReviewController@review'
) -> name('menu.review');

Route::post(
    '/menu/{menu_id}/review/post',
    'ReviewController@postReview'
) -> name('menu.review.post');

Route::get(
    '/menu/register',
    'MenuRegisterController@menuregister'
) -> name('menu.register');

Route::get(
    '/auth/google',
    'Auth\OAuthLoginController@getGoogleAuth'
) -> name('login');

Route::get(
    '/auth/callback/google',
    'Auth\OAuthLoginController@authGoogleCallback'
);

Route::get(
    '/error',
    'ErrorController@error'
) -> name('error');
