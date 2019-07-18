<?php

/**
 * Evaluation.php
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
 * Evaluation class
 *
 * 平均評価のモデルです。
 *
 * @category Model
 * @package  Model
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class Evaluation extends Model
{
    protected $table = 'evaluations';
    protected $primaryKey = "menu_id";
    protected $fillable = ['menu_id', 'evaluation'];
    public $timestamps = false;

    /**
     * リレーションを返す
     *
     * @return void
     */
    public function evaluation()
    {
        return $this->belongsTo('App\Models\Menu');
    }
}
