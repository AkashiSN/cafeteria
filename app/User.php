<?php

/**
 * User.php
 *
 * PHP Version = 7.0
 *
 * @category Model
 * @package  Model
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * User class
 *
 * ユーザーのモデルです。
 *
 * @category Model
 * @package  Model
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class User extends Authenticatable
{
    protected $fillable = [
        "name", "email"
    ];
    protected $primaryKey = 'user_id';

    protected $table = 'users';

    /**
     * お気に入りを登録する
     *
     * @return void
     */
    public function favorite()
    {
        return $this->hasMany('App\Models\Favorite');
    }
}
