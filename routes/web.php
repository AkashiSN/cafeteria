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

use Illuminate\Support\Facades\Route;

// Index
Route::get(
    '/',
    'MenuController@index'
) -> name('home');


// Admin
Route::middleware('auth.admin')
    -> namespace('Admin')
    -> prefix('admin/menus')
    -> group(
        function () {
            Route::get(
                'create',
                'MenuController@create'
            ) -> name('admin.menus.create');

            Route::post(
                'store',
                'MenuController@store'
            ) -> name('admin.menus.store');

            Route::get(
                'set_menu',
                'MenuController@setMenu'
            ) -> name('admin.menus.set_menu');
        }
    );


// Menus
Route::prefix('menus') -> group(
    function () {
        // menus
        Route::get(
            'search',
            'MenuController@search'
        ) -> name('menus.search');

        Route::get(
            '{menu_id}',
            'MenuController@show'
        ) -> name('menus.show');

        // reviews
        Route::get(
            '{menu_id}/reviews',
            'ReviewController@index'
        ) -> name('menus.reviews.index');

        // 投稿は認証必要
        Route::middleware('auth') -> group(
            function () {
                Route::get(
                    '{menu_id}/reviews/create',
                    'ReviewController@create'
                ) -> name('menus.reviews.create');

                Route::post(
                    '{menu_id}/reviews',
                    'ReviewController@store'
                ) -> name('menus.reviews.store');
            }
        );
    }
);


// my page
Route::middleware('auth')
    -> prefix('my_page')
    -> group(
        function () {
            Route::get(
                '',
                'UserController@show'
            ) -> name('my_page');

            Route::get(
                'favorites',
                'UserController@favorites'
            ) -> name('my_page.favorites');

            Route::get(
                'reviews',
                'UserController@reviews'
            ) -> name('my_page.reviews');

            Route::get(
                'edit',
                'UserController@edit'
            ) -> name('my_page.edit');

            Route::put(
                'store',
                'UserController@store'
            ) -> name('my_page.store');
        }
    );


// Auth
Route::prefix('auth') -> group(
    function () {
        // login
        Route::get(
            'google',
            'Auth\OAuthLoginController@getGoogleAuth'
        ) -> name('login');

        Route::get(
            'callback/google',
            'Auth\OAuthLoginController@authGoogleCallback'
        );

        // logout
        Route::get(
            'logout',
            'Auth\OAuthLoginController@getLogout'
        ) -> name('logout');
    }
);


Route::get(
    'error',
    'ErrorController@error'
) -> name('error');
