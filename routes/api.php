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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\SoldOut;

Auth::routes();

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

// auth
Route::middleware('auth:api') -> get(
    '/user',
    function (Request $request) {
        return $request->user();
    }
);

// auth
Route::middleware('auth:api') -> group(
    function () {
        // favorites
        Route::post(
            '/favorites',
            'FavoriteController@store'
        ) -> name('favorites.store');

        Route::delete(
            '/favorites/{menu_id}',
            'FavoriteController@destroy'
        ) -> name('favorites.destroy');
    }
);


// sold_out
Route::put(
    '/menus/{menu_id}/sold_out',
    'SoldOutController@update'
) -> name('menus.sold_out.update');


// review images
Route::get(
    '/menus/{menu_id}/images',
    'ReviewController@getImages'
) -> name('menus.images');

Route::get(
    '/menus/{menu_id}/reviews/{review_id}/images',
    'ReviewController@getReviewImages'
) -> name('menus.reviews.images');
