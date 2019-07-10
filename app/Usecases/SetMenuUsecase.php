<?php

/**
 * SetMenuUsecase.php
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
 * SetMenuUsecase class
 *
 * メニュー関連処理を行うユースケースです。
 *
 * @category Usecase
 * @package  Usecase
 * @author   shikibu9419 <shikibu9419@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class SetMenuUsecase extends DateUsecase
{

    /**
     * 日替わりメニューの取得
     *
     * @return [$menu_table, $options]
     */
    public function getMenuTable()
    {
        foreach (self::thisWeekdays() as $workdays) {
            $options[] = $workdays[0] -> format('n月j日')
                . '〜' . end($workdays) -> format('n月j日');

            $weekly_list = [];
            foreach ($workdays as $workday) {
                $daily_menu = DailyMenu::where(['date' => $workday]) -> first();
                if (!$daily_menu) {
                    continue;
                }

                $a_menu = Menu::select('id', 'item_name')
                    -> find($daily_menu -> menu_id_A);
                $b_menu = Menu::select('id', 'item_name')
                    -> find($daily_menu -> menu_id_B);

                $weekday = $this -> japanese_weekday[(int)$workday -> format('w')];
                $date_label = $workday -> format("n月j日") . '（' . $weekday . '）';
                $weekly_list[$date_label] = [$a_menu, $b_menu];
            }

            $menu_table[] = $weekly_list;
        }

        return [$menu_table, $options];
    }
}
