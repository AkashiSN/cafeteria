<?php

/**
 * DailyMenuController.php
 *
 * PHP Version = 7.0
 *
 * @category Contoller
 * @package  Contoller
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */

namespace App\Http\Controllers\Menu;

use App\User;
use App\Models\Menu;
use App\Models\DailyMenu;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use DateTime;
use DateInterval;

/**
 * DailyMenuController class
 *
 * 日替わりメニューを表示するコントローラです。
 *
 * @category Contoller
 * @package  Contoller
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class DailyMenuController extends Controller
{
    /**
     * 日替わりメニューを表示する。
     *
     * @return Renderable
     */
    public function daily()
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

        foreach (self::this_weekdays() as $weekdays) {
            $select_options[] = $weekdays[0] -> format('n月j日') . '〜' . end($weekdays) -> format('n月j日');
        }

        $today_menu = DailyMenu::where('date', date("Y-m-d"))->first();
        $menus[] = array(
            "menu" => Menu::where('menu_id', $today_menu -> menu_id_A)->first(),
            "description" => "Aセット（ライス・味噌汁付き）"
        );
        $menus[] = array(
            "menu" => Menu::where('menu_id', $today_menu -> menu_id_B)->first(),
            "description" => "Bセット（味噌汁付き）"
        );

        return view('index', compact('menus', 'weekdays_list'), ['mode' => 'daily']);
    }

    // Return: [[1st Mon, ..., 1st Fri], [2nd Mon, ..., 2nd Fri], ...]
    private function this_weekdays()
    {
        $datetime = new DateTime();

        $year = (int)$datetime -> format('Y');
        $month = (int)$datetime -> format('m');
        $datetime -> setDate($year, $month, 1);

        $target = range(1, 5);  // Mon. to Fri.
        $interval = new DateInterval('P1D');

        $result = array();
        $weekday = array();

        while((int)$datetime -> format('m') == $month) {
            if(in_array((int)$datetime -> format('w'), $target)) {
                $weekday[] = clone $datetime;
                if((int)$datetime -> format('w') == 5) {
                    $result[] = $weekday;
                    $weekday = array();
                }
            }
            $datetime -> add($interval);
        }

        return $result;
    }
}
