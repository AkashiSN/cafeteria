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
            $status = 500;
            return response() -> json(
                ['errors' => 'Please login.'],
                $status
            );
        }

        $user_id = Auth::user() -> user_id;
        $menu_id = $request -> menu_id;

        if (!Menu::where('id', $menu_id) -> exists()) {
            $status = 500;
            return response() -> json(
                ['errors' => 'This menu is not found.'],
                $status
            );
        }

        if (Favorite::where('user_id', $user_id) -> where('menu_id', $menu_id) -> exists()) {
            $status = 200;
            return response() -> json(
                ['errors' => 'Already liked.'],
                $status
            );
        }

        $favorite = Favorite::create([
            'id' => Favorite::max('id'),
            'user_id' => $user_id,
            'menu_id' => $menu_id,
        ]);

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
            $status = 500;
            return response() -> json(
                ['errors' => 'Please login.'],
                $status
            );
        }

        $user_id = Auth::user() -> user_id;
        $favorites = Favorite::where('menu_id', $menu_id) -> where('user_id', $user_id);

        if (!$favorites -> exists()) {
            $status = 500;
            return response() -> json(
                ['errors' => 'This favorite is not found'],
                $status
            );
        }

        $favorites -> delete();

        $status = 200;
        return response() -> json([], $status);
    }
}
