<?php

/**
 * Favorite.php
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
 * Menu class
 *
 * お気に入りメニューのモデルです。
 *
 * @category Model
 * @package  Model
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class Favorite extends Model
{
    protected $table = "favorites";
    protected $primaryKey = "user_id";

    /**
     * ユーザーが親であることを指定する
     *
     * @return void
     */
    public function user()
    {
        return $this -> belongsTo('App\User');
    }

    /**
     * メニューが子であることを指定する
     *
     * @return void
     */
    Public function menu()
    {
        return  $this -> hasOne('App\Models\Menu');
    }
}
