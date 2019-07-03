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
    '/menus/{menu_id}/sold_out',
    'SoldOutController@store'
) -> name('menu.sold_out.store');
