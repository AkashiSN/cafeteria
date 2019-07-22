<?php

/**
 * Api.php
 *
 * PHP Version = 7.0
 *
 * @category Router
 * @package  Router
 * @author   shikibu9419 <shikibu9419@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Admin
Route::middleware('auth.admin.api')
    -> namespace('Admin')
    -> prefix('admin')
    -> group(
        function () {
            Route::put(
                'set_menu',
                'DailyMenuController@update'
            ) -> name('admin.daily_menus.update');

            Route::get(
                'settings',
                'MenuController@settings'
            ) -> name('admin.menus.settings');

            Route::put(
                'update_setting',
                'MenuController@updateSetting'
            ) -> name('admin.menus.update_setting');
        }
    );


// Favorites
Route::middleware('auth.api')
    -> prefix('favorites')
    -> group(
        function () {
            Route::post(
                '{menu_id}',
                'FavoriteController@store'
            ) -> name('favorites.store');

            Route::delete(
                '{menu_id}',
                'FavoriteController@destroy'
            ) -> name('favorites.destroy');
        }
    );


// Menus
Route::prefix('menus') -> group(
    function () {
        // sold_out
        Route::put(
            '{menu_id}/sold_out',
            'SoldOutController@update'
        ) -> name('menus.sold_out.update');


        // review images
        Route::get(
            '{menu_id}/images',
            'ReviewController@getImages'
        ) -> name('menus.images');

        Route::get(
            '{menu_id}/reviews/{review_id}/images',
            'ReviewController@getReviewImages'
        ) -> name('menus.reviews.images');
    }
);


// Filter
Route::get(
    '/menus/filter',
    'MenuController@filter'
) -> name('menus.filter');
