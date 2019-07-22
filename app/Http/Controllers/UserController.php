<?php

/**
 * UserController.php
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

use App\Models\Menu;
use App\Models\Review;
use App\Models\Favorite;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * UserController class
 *
 * ユーザ情報のコントローラです。
 *
 * @category Contoller
 * @package  Contoller
 * @author   shikibu9419 <shikibu9419@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class UserController extends Controller
{
    /**
     * マイページを表示する。
     *
     * @return Renderable
     */
    public function show()
    {
        return view('users.show', ['user' => Auth::user()]);
    }

    /**
     * ユーザのお気に入り一覧を表示する。
     *
     * @return Renderable
     */
    public function favorites()
    {
        $menu_ids = Favorite::where('user_id', Auth::user() -> id)
                            -> pluck('menu_id');
        $menus = Menu::find($menu_ids);

        return view('users.favorites', compact('menus'));
    }

    /**
     * ユーザのレビュー一覧を表示する。
     *
     * @return Renderable
     */
    public function reviews()
    {
        $user = Auth::user();
        $reviews = Review::where('user_id', $user -> id) -> get();
        $reviews_list = [];

        foreach ($reviews as $review) {
            $menu = Menu::find($review -> menu_id);
            $reviews_list[] = array(
                'menu'       => $menu,
                'review_id'  => $review -> id,
                'evaluation' => $review -> evaluation,
                'created_at' => $review -> created_at -> format('Y-m-d'),
                'comment'    => $review -> comment
            );
        }

        return view('users.reviews', compact('reviews_list', 'user'));
    }
}
