<?php

/**
 * ReviewController.php
 *
 * PHP Version = 7.0
 *
 * @category Contoller
 * @package  Contoller
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */

namespace App\Http\Controllers\Review;

use App\User;
use App\Models\Menu;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * ReviewController class
 *
 * レビューのコントローラーです
 *
 * @category Contoller
 * @package  Contoller
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class ReviewController extends Controller
{
    /**
     * レビュー一覧を表示する
     *
     * @param int $menu_id メニューID
     *
     * @return Renderable
     */
    public function reviews($menu_id)
    {
        $reviews = Review::where('menu_id', $menu_id)
            -> leftJoin('users', 'reviews.user_id', '=', 'users.user_id')
            -> get();
        $menu = Menu::where('menu_id', $menu_id) -> first();

        return view('reviews', compact('reviews', 'menu'));
    }

    /**
     * レビュー投稿画面を表示する
     *
     * @param int $menu_id メニューID
     *
     * @return Renderable
     */
    public function review($menu_id)
    {
        return view('review', ['menu_id' => $menu_id, 'message' => "hoge"]);
    }

    /**
     * レビューを投稿する
     *
     * @param Request $request リクエスト
     * @param int     $menu_id メニューID
     *
     * @return Renderable
     */
    public function postReview(Request $request, $menu_id)
    {
        if (!Auth::check()) {
            return view('review', ['menu_id' => $menu_id, 'message' => "authocation"]);
        }

        $menu = Menu::where('menu_id', $menu_id)->first();
        if (!$menu->exists) {
            return view('review', ['menu_id' => $menu_id, 'message' => "menu"]);
        }

        $user = Auth::user();
        $user_id = $user -> user_id;

        $review = array(
            "user_id" => $user_id,
            "menu_id" => $menu_id,
            "evaluation" => $request->input('evaluation'),
            "comment" => $request->input('comment'),
            "image_path" => "hoge",
        );

        Review::create($review);
        return redirect() -> route('menu.review', ['menu_id' => $menu_id]);
    }
}
