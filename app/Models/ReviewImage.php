<?php

/**
 * ReviewImage.php
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
 * レビュー画像のモデルです。
 *
 * @category Model
 * @package  Model
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class ReviewImage extends Model
{
    protected $fillable = ['review_id', 'image_path'];
    protected $table = "review_images";

    /**
     * レビューが親であることを指定する
     *
     * @return void
     */
    public function review()
    {
        return $this->belongsTo('App\Models\Review');
    }
}
