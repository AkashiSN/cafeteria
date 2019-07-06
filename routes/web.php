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
) -> name('menus.detail');

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
