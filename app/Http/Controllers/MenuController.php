<?php

/**
 * MenuController.php
 *
 * PHP Version = 7.0
 *
 * @category Contoller
 * @package  Contoller
 * @author   shikibu9419 <shikibu9419@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Favorite;
use App\Models\DailyMenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DateTime;
use DateInterval;

/**
 * MenuController class
 *
 * メニュー関連の継承用コントローラです。
 *
 * @category Contoller
 * @package  Contoller
 * @author   shikibu9419 <shikibu9419@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class MenuController extends Controller
{

    private $_daily_descriptions = array(
        'a_set_menu'     => 'Aセット（ライス・味噌汁付）',
        'b_set_menu'     => 'Bセット（味噌汁付）'
    );

    private $_permanent_descriptions = array(
        'permanent_menu' => '常設メニュー',
        'ramen'          => '常設メニュー（ラーメン）',
        'summer_menu'    => '夏限定メニュー',
    );

    private $_japanese_weekday = array(
        '日', '月', '火', '水', '木', '金', '土'
    );

    /**
     * 常設メニューを表示する。
     *
     * @return Renderable
     */
    public function home()
    {
        // if (Auth::check()) {
        //     $user = Auth::user();
        //     $user_id = $user -> user_id;
        //     $favorite_menu_id = Favorite::where('user_id', $user_id)->all();
        //     $favorite_menu_id_list = [];
        //     foreach ($favorite_menu_id as $id) {
        //         $favorite_menu_id_list[] = $id;
        //     }
        // }

        list($daily_schedule, $select_options) = self::_getDaily();
        $permanent_list = self::_getPermanent();

        return view(
            'home',
            compact('daily_schedule', 'permanent_list', 'select_options')
        );
    }

    /**
     * 日替わりメニューの取得
     *
     * @return [$menu_schedule, $select_options]
     */
    private function _getDaily()
    {
        foreach (self::thisWeekdays() as $workdays) {
            $select_options[] = $workdays[0] -> format('n月j日')
                    . '〜' . end($workdays) -> format('n月j日');

            $daily_menus = DailyMenu::whereBetween(
                'date',
                [$workdays[0], end($workdays)]
            ) -> get();

            $weekly_list = array();
            foreach ($daily_menus as $daily_menu) {
                $a_menu = array(
                    'menu' => Menu::where(
                        'menus.id',
                        $daily_menu -> menu_id_A
                    ) -> leftJoin(
                        'sold_out',
                        'menus.id',
                        '=',
                        'sold_out.menu_id'
                    ) -> first(),
                    'description' => $this -> _daily_descriptions['a_set_menu']
                );
                $b_menu = array(
                    'menu' => Menu::where(
                        'menus.id',
                        $daily_menu -> menu_id_B
                    ) -> leftJoin(
                        'sold_out',
                        'menus.id',
                        '=',
                        'sold_out.menu_id'
                    ) -> first(),
                    'description' => $this -> _daily_descriptions['b_set_menu']
                );

                $date = $daily_menu -> date;
                $weekday = $this -> _japanese_weekday[$date -> format("w")];
                $weekly_list[] = array(
                    ($date -> format("n月j日") . '（' . $weekday . '）')
                        => array($a_menu, $b_menu)
                );
            }

            $menu_schedule[] = $weekly_list;
        }

        return [$menu_schedule, $select_options];
    }

    /**
     * 常設メニューの取得
     *
     * @return $menu_list
     */
    private function _getPermanent()
    {
        $summer = true;

        $permanent_menus = Menu::where('category', 'permanent_menu')
            -> where('alias', 0)
            -> leftJoin('sold_out', 'menus.id', '=', 'sold_out.menu_id')
            -> get();

        $menu_list[] = array(
            'menus' => $permanent_menus,
            'description' => $this -> _permanent_descriptions['permanent_menu']
        );

        $menu_list[] = array(
            'menus' => Menu::where('category', 'summer_menu')
                -> leftJoin('sold_out', 'menus.id', '=', 'sold_out.menu_id')
                -> get(),
            'description' => $this -> _permanent_descriptions['summer_menu']
        );

        $today_menu = DailyMenu::where('date', date('Y-m-d')) -> first();
        $menu_list[] = array(
            'menus' => Menu::where('menus.id', $today_menu -> ramen)
                -> leftJoin('sold_out', 'menus.id', '=', 'sold_out.menu_id')
                -> get(),
            'description' => $this -> _permanent_descriptions['ramen']
        );

        return $menu_list;
    }

    /**
     * 今月の平日のリストを以下の形式で返す
     *
     * @return [[1st Mon, ..., 1st Fri], [2nd Mon, ..., 2nd Fri], ...]
     */
    protected function thisWeekdays()
    {
        $datetime = new DateTime();
        $year  = (int)$datetime -> format('Y');
        $month = (int)$datetime -> format('m');
        $datetime -> setDate($year, $month, 1);

        $target   = range(1, 5);  // Mon. to Fri.
        $interval = new DateInterval('P1D');  // interval: 1day

        $result  = array();
        $workdays = array();

        while ((int)$datetime -> format('m') == $month) {
            $week = (int)$datetime -> format('w');
            if (in_array($week, $target)) {
                $workdays[] = clone $datetime;
                if ($week == 5) {
                    $result[] = $workdays;
                    $workdays = array();
                }
            }
            $datetime -> add($interval);
        }

        return $result;
    }
}
