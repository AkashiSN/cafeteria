<?php

/**
 * FavoriteController.php
 *
 * PHP Version = 7.0
 *
 * @category Contoller
 * @package  Contoller
 * @author   shikibu9419 <shikibu9419@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * FavoriteController class
 *
 * お気に入り情報のコントローラです。
 *
 * @category Contoller
 * @package  Contoller
 * @author   shikibu9419 <shikibu9419@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class FavoriteController extends Controller
{
    /**
     * お気に入り情報を登録します。
     *
     * @param Request $request APIリクエスト
     *
     * @return string json形式のステータス
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return response() -> json(
                [
                    'status' => 500,
                    'errors' => 'Please login.'
                ],
                200
            );
        }

        $user_id = Auth::user() -> id;
        $menu_id = $request -> menu_id;

        if (!Menu::where('id', $menu_id) -> exists()) {
            return response() -> json(
                [
                    'status' => 404,
                    'errors' => 'This menu is not found.'
                ],
                200
            );
        }

        $favorite = Favorite::firstOrNew(
            [
            'user_id' => $user_id,
            'menu_id' => $menu_id
            ]
        );

        if (!$favorite -> exists) {
            $favorite -> id = Favorite::max('id') + 1;
            $favorite -> save();
        }

        $status = 200;
        return response() -> json([], $status);
    }

    /**
     * お気に入り情報を削除します。
     *
     * @param Request $request APIリクエスト
     * @param int     $menu_id メニューID
     *
     * @return string json形式のステータス
     */
    public function destroy(Request $request, $menu_id)
    {
        if (!Auth::check()) {
            return response() -> json(
                [
                    'status' => 500,
                    'errors' => 'Please login.'
                ],
                200
            );
        }

        $user_id = Auth::user() -> id;
        $favorites = Favorite::where(
            'menu_id',
            $menu_id
        ) -> where('user_id', $user_id);

        if (!$favorites -> exists()) {
            return response() -> json(
                [
                    'status' => 500,
                    'errors' => "You didn't like this."
                ],
                200
            );
        }

        $favorites -> delete();

        $status = 200;
        return response() -> json([], $status);
    }
}
