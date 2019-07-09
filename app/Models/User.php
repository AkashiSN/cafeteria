<?php

/**
 * User.php
 *
 * PHP Version = 7.0
 *
 * @category Model
 * @package  Model
 * @author   shikibu9419 <shikibu9419@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * User class
 *
 * ユーザのモデルです。
 *
 * @category Model
 * @package  Model
 * @author   shikibu9419 <shikibu9419@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class User extends Model
{
    protected $fillable = ['name'];
    protected $table = 'users';

    /**
     * リレーションを返す
     *
     * @return void
     */
    public function reviews()
    {
        return $this -> hasMany('App\Models\Review');
    }

    public function favorites()
    {
        return $this -> hasMany('App\Models\Favorite');
    }

    Public function menus()
    {
        return $this -> belongsToMany('App\Models\Menu', 'favorites');
    }
}
