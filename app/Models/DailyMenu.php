<?php

/**
 * DailyMenu.php
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
 * 日替わりメニューのモデルです。
 *
 * @category Model
 * @package  Model
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class DailyMenu extends Model
{
    protected $table = "daily_menu";
    protected $primaryKey = "date";
    protected $fillable = ['date'];
    protected $casts = [
        'date' => 'date'
    ];
    public $timestamps = false;

    /**
     * リレーションを返す
     *
     * @return void
     */
    Public function a_menu()
    {
        return $this -> hasOne('App\Models\Menu', 'menu_id_A');
    }

    Public function b_menu()
    {
        return $this -> hasOne('App\Models\Menu', 'menu_id_B');
    }
}
