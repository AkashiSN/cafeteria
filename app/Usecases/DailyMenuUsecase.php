<?php

/**
 * DailyMenuUsecase.php
 *
 * PHP Version = 7.0
 *
 * @category Usecase
 * @package  Usecase
 * @author   shikibu9419 <shikibu9419@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */

namespace App\Usecases;

use App\Models\Menu;
use App\Models\Favorite;
use App\Models\DailyMenu;

/**
 * DailyMenuUsecase class
 *
 * メニュー関連処理を行うユースケースです。
 *
 * @category Usecase
 * @package  Usecase
 * @author   shikibu9419 <shikibu9419@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class DailyMenuUsecase
{
    public function categoryToColumn($category) {
        $columns = [
            'a_set_menu' => 'menu_id_A',
            'b_set_menu' => 'menu_id_B'
        ];
        return $columns[$category];
    }
}
