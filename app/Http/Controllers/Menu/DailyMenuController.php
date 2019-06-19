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
        $today_menu = DailyMenu::where('date', date("Y-m-d"))->first();
        $menus[] = array(
            "menu" => Menu::where('menu_id', $today_menu -> menu_id_A)->first(),
            "description" => "Aセット（ライス・味噌汁付き）"
        );
        $menus[] = array(
            "menu" => Menu::where('menu_id', $today_menu -> menu_id_B)->first(),
            "description" => "Bセット（味噌汁付き）"
        );

        return view('index', compact('menus'), ['mode' => 'daily']);
    }
}
