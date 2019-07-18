<?php

/**
 * Review.php
 *
 * PHP Version = 7.0
 *
 * @category Model
 * @package  Model
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Review class
 *
 * レビューのモデルです。
 *
 * @category Model
 * @package  Model
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class Review extends Model
{
    protected $fillable = [
        "user_id", "menu_id", "evaluation", "comment", "image_path"
    ];
    protected $table = "reviews";

    /**
     * リレーションを返す
     *
     * @return void
     */
    public function images()
    {
        return $this->hasMany('App\Models\ReviewImage');
    }

    /**
     * ユーザー名を付け加えたレビューのリストを返す。
     *
     * @param int $menu_id メニューID
     *
     * @return array レビューのリスト
     */
    public static function getReviewsWithUserName($menu_id)
    {
        $reviews = Review::where('menu_id', $menu_id) -> get();
        $reviews_list = array();

        foreach ($reviews as $review) {
            $user = User::where('id', $review -> user_id) -> first();
            $reviews_list[] = array(
                'user_name'  => $user -> name,
                'review_id'  => $review -> id,
                'evaluation' => $review -> evaluation,
                'created_at' => $review -> created_at ->format('Y-m-d H:i:s'),
                'comment'    => $review -> comment
            );
        }

        return $reviews_list;
    }
}
