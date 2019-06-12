<?php

/**
 * SoldOut.php
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
 * SoldOut class
 *
 * 売り切れ情報のモデルです。
 *
 * @category Model
 * @package  Model
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class SoldOut extends Model
{
    protected $table = "sold_out";
    protected $primaryKey = "menu_id";
}
