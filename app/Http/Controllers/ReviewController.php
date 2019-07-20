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

use App\Models\Menu;
use App\Models\Review;
use App\Models\Evaluation;
use App\Models\ReviewImage;
use App\Http\Requests\StoreReview;
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
    public function index($menu_id)
    {
        $reviews_list = Review::getReviewsWithUserName($menu_id);
        $menu_name = Menu::find($menu_id) -> item_name;
        return view('reviews.index', compact('reviews_list', 'menu_id', 'menu_name'));
    }

    /**
     * メニューIDに対応した画像のURLを取得
     *
     * @param int $menu_id メニューID
     *
     * @return string json形式のURLのリスト
     */
    public function getImages($menu_id)
    {
        $images = ReviewImage::where('menu_id', $menu_id) -> get();
        if (count($images) === 0) {
            return response() -> json(
                [
                    'status' => 204,
                    'errors' => 'Image does not exist'
                ],
                200
            );
        }
        $url_list = array();
        foreach ($images as $image) {
            $url_list[] = url("/data/" . $image -> image_path);
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
            return response() -> json(
                [
                    'status' => 204,
                    'errors' => 'Review image does not exist'
                ],
                200
            );
        }
        $url_list = array();
        foreach ($review_images as $review_image) {
            $url_list[] = url("/data/" . $review_image -> image_path);
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
        $item_name = Menu::where('id', $menu_id) -> first() -> item_name;
        return view('reviews.create', compact('item_name', 'menu_id'));
    }

    /**
     * レビューを投稿する
     *
     * @param StoreReview $request バリデータを通過したリクエスト
     * @param int         $menu_id メニューID
     *
     * @return Renderable
     */
    public function store(StoreReview $request, $menu_id)
    {
        if (!Menu::where('id', $menu_id) -> exists()) {
            return redirect() -> route('home');
        }

        $user = Auth::user();
        $user_id = $user -> id;

        $review = Review::create(
            [
            "user_id"    => $user_id,
            "menu_id"    => $menu_id,
            "evaluation" => $request -> input('evaluation'),
            "comment"    => $request -> input('comment') ?? "",
            ]
        );

        if ($request -> file("files") !== null) {
            foreach ($request -> file("files") as $index => $e) {
                $ext = $e['image'] -> guessExtension();
                $image_name = uniqid("image_").".".$ext;

                $image_path = $e['image'] -> storeAs('images', $image_name); // public/data/images/以下に保存

                $review -> images() -> create(
                    [
                        'image_path' => $image_path,
                        'menu_id' => $menu_id
                    ]
                ); // review_idに対応したものを登録する
            }
        }

        $average_evaluation = Review::where('menu_id', $menu_id) -> get()
            -> average('evaluation');

        $evaluation = Evaluation::firstOrNew(['menu_id' => $menu_id]);
        $evaluation['evaluation'] = $average_evaluation;
        $evaluation -> save();

        return redirect() -> route('menus.reviews.index', ['menu_id' => $menu_id]);
    }
}
