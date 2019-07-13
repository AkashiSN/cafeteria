<?php

/**
 * MenuUsecase.php
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
 * MenuUsecase class
 *
 * メニュー関連処理を行うユースケースです。
 *
 * @category Usecase
 * @package  Usecase
 * @author   shikibu9419 <shikibu9419@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class MenuUsecase extends DateUsecase
{

    /**
     * 日替わりメニューの取得
     *
     * @return [$menu_schedule, $options]
     */
    public function getDaily()
    {
        foreach (self::thisWeekdays() as $workdays) {
            $options[] = $workdays[0]
                -> format('n月j日') . '〜' . end($workdays) -> format('n月j日');

            $daily_menus = DailyMenu::whereBetween(
                'date',
                [$workdays[0], end($workdays)]
            ) -> get();

            $weekly_list = array();
            foreach ($daily_menus as $daily_menu) {
                $a_menu = array(
                    'menu' => Menu::getWithStatuses()
                        -> find($daily_menu -> menu_id_A),
                    'description' => Menu::$descriptions['a_set_menu']
                );
                $b_menu = array(
                    'menu' => Menu::getWithStatuses()
                        -> find($daily_menu -> menu_id_B),
                    'description' => Menu::$descriptions['b_set_menu']
                );

                $date = $daily_menu -> date;
                $weekday = $this -> japanese_weekday[$date -> format("w")];
                $weekly_list[] = array(
                    ($date -> format("n月j日") . '（' . $weekday . '）')
                        => array($a_menu, $b_menu)
                );
            }

            $menu_schedule[] = $weekly_list;
        }

        return [$menu_schedule, $options];
    }

    /**
     * 常設メニューの取得
     *
     * @return $menu_list
     */
    public function getPermanent()
    {
        $summer = true;

        $permanent_menus = Menu::getWithStatuses()
            -> where('category', 'permanent_menu')
            -> where('alias', 0)
            -> get();

        $menu_list[] = array(
            'menus' => $permanent_menus,
            'description' => Menu::$descriptions['permanent_menu']
        );

        $menu_list[] = array(
            'menus' => Menu::getWithStatuses()
                -> where('category', 'summer_menu')
                -> get(),
            'description' => Menu::$descriptions['summer_menu']
        );

        $today_menu = DailyMenu::where('date', date('Y-m-d')) -> first();
        $menu_list[] = array(
            'menus' => Menu::getWithStatuses()
                -> where('menus.id', $today_menu -> ramen)
                -> get(),
            'description' => Menu::$descriptions['ramen']
        );

        return $menu_list;
    }
}
