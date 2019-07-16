<?php

/**
 * Menu.php
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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

/**
 * Menu class
 *
 * メニューのモデルです。
 *
 * @category Model
 * @package  Model
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class Menu extends Model
{
    protected $table = 'menus';
    public $timestamps = false;

    protected $fillable = [
        "item_name", "category", "price", "energy", "protein", "lipid", "salt"
    ];

    static public $descriptions = [
        'a_set_menu'     => 'Aセット（ライス・味噌汁付）',
        'b_set_menu'     => 'Bセット（味噌汁付）',
        'permanent_menu' => '常設メニュー',
        'ramen'          => '常設メニュー（ラーメン）',
        'summer_menu'    => '夏限定メニュー',
    ];

    /**
     * リレーションを返す
     *
     * @return void
     */
    Public function sold_out()
    {
        return $this -> hasOne('App\Models\SoldOut');
    }

    Public function reviews()
    {
        return $this -> hasMany('App\Models\Review');
    }

    Public function favorites()
    {
        return $this -> hasMany('App\Models\Favorite');
    }

    Public function users()
    {
        return $this -> belongsToMany('App\Models\User', 'favorites');
    }

    /**
     * 売り切れ情報がjoinされたMenuのEloquentを返す
     *
     * @return Illuminate\Database\Eloquent\Builder
     */
    static public function getWithStatuses() {
        return Menu::leftJoin('sold_out', 'menus.id', '=', 'sold_out.menu_id');
    }

    /**
     * ユーザがメニューをお気に入りに登録しているかどうかを返す
     *
     * @return Boolean
     */
    public function isLiked() {
        return Auth::check() &&
            Favorite::where('menu_id', $this -> id)
                -> where('user_id', Auth::user() -> id)
                -> exists();
    }
}
