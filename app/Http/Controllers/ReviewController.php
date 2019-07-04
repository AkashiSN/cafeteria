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

namespace App\Http\Controllers;

use App\User;
use App\Models\Menu;
use App\Models\Review;
use App\Models\ReviewImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
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
    public function index($menu_id)
    {
        $reviews_list = Review::where('menu_id', $menu_id)
            -> leftJoin('users', 'reviews.user_id', '=', 'users.user_id')
            -> get();
        $menu = Menu::where('menu_id', $menu_id) -> first();

        return view('reviews.index', compact('reviews_list', 'menu'));
    }

    /**
     * レビューIDに対応した画像のURLを取得
     *
     * @param int $menu_id   メニューID
     * @param int $review_id レビューID
     *
     * @return string json形式のURLのリスト
     */
    public function getReviewImages($menu_id, $review_id)
    {
        $review_images = ReviewImage::where('review_id', $review_id) -> get();
        if (count($review_images) === 0) {
            $status = 404;
            return response() -> json(
                [
                    'status' => $status,
                    'errors' => 'Review image does not exist'
                ],
                204
            );
        }
        $url_list = array();
        foreach ($review_images as $review_image) {
            $url_list[] = url("/review/" . $review_image -> image_path);
        }

        $status = 200;
        return response() -> json(
            [
                'status' => $status,
                'url_list' => $url_list
            ],
            $status
        );
    }

    /**
     * レビュー投稿画面を表示する
     *
     * @param int $menu_id メニューID
     *
     * @return Renderable
     */
    public function create($menu_id)
    {
        if (!Auth::check()) {
            return view(
                'reviews.list',
                ['menu_id' => $menu_id, 'message' => "authocation"]
            );
        }
        $item_name = Menu::where('menu_id', $menu_id)->first()->item_name;
        return view('reviews.create', compact('item_name', 'menu_id'));
    }

    /**
     * レビューを投稿する
     *
     * @param Request $request リクエスト
     * @param int     $menu_id メニューID
     *
     * @return Renderable
     */
    public function store(Request $request, $menu_id)
    {
        if (!Auth::check()) {
            return view(
                'reviews.index',
                ['menu_id' => $menu_id, 'message' => "authocation"]
            );
        }

        $menu = Menu::where('menu_id', $menu_id)->first();
        if (!$menu->exists) {
            return view('home');
        }

        if ($request -> input('evaluation') === null) {
            return redirect() -> route(
                'menus.reviews.create',
                ['menu_id' => $menu_id]
            );
        }

        $user = Auth::user();
        $user_id = $user -> user_id;

        $review = Review::create(
            [
            "user_id" => $user_id,
            "menu_id" => $menu_id,
            "evaluation" => $request -> input('evaluation'),
            "comment" => $request -> input('comment') ?? "",
            ]
        );

        if ($request -> file("files") !== null) {
            foreach ($request -> file("files") as $index => $e) {
                $ext = $e['image']->guessExtension();
                $image_name = uniqid("image_").".".$ext;

                $image_path = $e['image'] -> storeAs('images', $image_name); // public/reviews/images/以下に保存

                $review -> images()->create(['image_path'=> $image_path]); // review_idに対応したものを登録する
            }
        }
        return redirect() -> route('menus.reviews.index', ['menu_id' => $menu_id]);
    }
}
