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

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\SoldOut;

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

Route::middleware('auth:api') -> get(
    '/user',
    function (Request $request) {
        return $request->user();
    }
);

Route::post(
    '/users/{user_id}/favorites',
    'FavoriteController@store'
) -> name('store_user_favorite');

Route::post(
    '/menus/{menu_id}/sold_out',
    'SoldOutController@store'
) -> name('menus.sold_out.store');

Route::get(
    '/menus/{menu_id}/images',
    'ReviewController@getImages'
) -> name('menus.images');

Route::get(
    '/menus/{menu_id}/reviews/{review_id}/images',
    'ReviewController@getReviewImages'
) -> name('menus.reviews.images');
