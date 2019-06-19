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

    private $daily_descriptions = array(
        'a_set_menu'     => 'Aセット（ライス・味噌汁付）',
        'b_set_menu'     => 'Bセット（味噌汁付）'
    );

    private $permanent_descriptions = array(
        'permanent_menu' => '常設メニュー',
        'ramen'          => '常設メニュー（ラーメン）',
        'summer_menu'    => '夏限定メニュー',
    );

    /**
     * 常設メニューを表示する。
     *
     * @return Renderable
     */
    public function home() {
        // if (Auth::check()) {
        //     $user = Auth::user();
        //     $user_id = $user -> user_id;
        //     $favorite_menu_id = Favorite::where('user_id', $user_id)->all();
        //     $favorite_menu_id_list = [];
        //     foreach ($favorite_menu_id as $id) {
        //         $favorite_menu_id_list[] = $id;
        //     }
        // }

        list($daily_menu_schedule, $select_options) = self::get_daily();
        $permanent_menu_list = self::get_permanent();

        return view('home', compact('daily_menu_schedule', 'permanent_menu_list', 'select_options'));
    }

    // 日替わりメニューの取得
    private function get_daily() {
        foreach (self::this_weekdays() as $weekdays) {
            $select_options[] = $weekdays[0] -> format('n月j日') . '〜' . end($weekdays) -> format('n月j日');
            $daily_menus = DailyMenu::whereBetween('date', [$weekdays[0], end($weekdays)]) -> get();

            $weekly_list = array();
            foreach ($daily_menus as $daily_menu) {
                $a_menu = array(
                    'menu' => Menu::where('menu_id', $daily_menu -> menu_id_A) -> first(),
                    'description' => $this -> daily_descriptions['a_set_menu']
                );
                $b_menu = array(
                    'menu' => Menu::where('menu_id', $daily_menu -> menu_id_B) -> first(),
                    'description' => $this -> daily_descriptions['b_set_menu']
                );
                $weekly_list[] = array(
                    ($daily_menu -> date -> format('n月j日')) => array($a_menu, $b_menu)
                );
            }

            $menu_schedule[] = $weekly_list;
        }

        return [$menu_schedule, $select_options];
    }

    // 常設メニューの取得
    private function get_permanent()
    {
        $summer = true;

        $permanent_menus = Menu::where('category', 'permanent_menu') -> where('alias', 0)-> get();
        $menu_list[] = array(
            'menus' => $permanent_menus,
            'description' => $this -> permanent_descriptions['permanent_menu']
        );

        $menu_list[] = array(
            'menus' => Menu::where('category', 'summer_menu') -> get(),
            'description' => $this -> permanent_descriptions['summer_menu']
        );

        $today_menu = DailyMenu::where('date', date('Y-m-d')) -> first();
        $menu_list[] = array(
            'menus' => Menu::where('menu_id', $today_menu->ramen) -> get(),
            'description' => $this -> permanent_descriptions['ramen']
        );

        return $menu_list;
    }

    /**
     * 今月の平日のリストを以下の形式で返す
     * [[1st Mon, ..., 1st Fri], [2nd Mon, ..., 2nd Fri], ...]
     */
    protected function this_weekdays()
    {
        $datetime = new DateTime();
        $year  = (int)$datetime -> format('Y');
        $month = (int)$datetime -> format('m');
        $datetime -> setDate($year, $month, 1);

        $target   = range(1, 5);  // Mon. to Fri.
        $interval = new DateInterval('P1D');  // interval: 1day

        $result  = array();
        $weekday = array();

        while((int)$datetime -> format('m') == $month) {
            $week = (int)$datetime -> format('w');
            if(in_array($week, $target)) {
                $weekday[] = clone $datetime;
                if($week == 5) {
                    $result[] = $weekday;
                    $weekday  = array();
                }
            }
            $datetime -> add($interval);
        }

        return $result;
    }
}
