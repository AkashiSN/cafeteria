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
use App\Models\User;
use App\Models\Review;
use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserInfo;
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
        $user_info = Auth::user();
        $user = array(
            'name' => $user_info -> name,
            'avatar' => $user_info -> avatar
        );

        return view('users.show', compact('user'));
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

    /**
     * ユーザー情報を変更画面を表示する。
     *
     * @return Renderable
     */
    public function modify()
    {
        $user_info = Auth::user();
        $user = array(
            'name'   => $user_info -> name,
            'avatar' => $user_info -> avatar
        );

        return view('users.modify', compact('user'));
    }

    /**
     * ユーザー情報を変更する。
     *
     * @param StoreUserInfo $request バリデータを通過したリクエスト
     *
     * @return Renderable
     */
    public function store(StoreUserInfo $request)
    {
        $user_info = Auth::user();

        $user = User::where('email', $user_info -> email) -> first();

        if ($request -> input('user_name') !== null) {
            $user -> name = $request -> input('user_name');
        }

        if ($request -> file("file") !== null) {
            $file = $request -> file;
            $ext = $file -> guessExtension();
            $image_name = uniqid("image_").".".$ext;

            $image_path = $file -> storeAs('icons', $image_name); // public/data/icons/以下に保存

            $user -> avatar = url("data/".$image_path);
        }

        $user -> save();

        return redirect() -> route('home');
    }
}
