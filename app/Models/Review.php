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
}
