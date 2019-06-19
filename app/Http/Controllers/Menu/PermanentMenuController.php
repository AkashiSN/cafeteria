<?php

/**
 * PermanentMenuController.php
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

use App\Models\Menu;
use App\Models\Favorite;
use App\Models\DailyMenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * PermanentMenuController class
 *
 * 常設メニューを表示するコントローラです。
 *
 * @category Contoller
 * @package  Contoller
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class PermanentMenuController extends Controller
{
    /**
     * 常設メニューを表示する。
     *
     * @return Renderable
     */
    public function permanent()
    {
        $summer = true;

        $permanent_menus = Menu::where('category', 'permanent_menu')->get();

        foreach ($permanent_menus as $menu) {
            if ($menu -> alias === 0) {
                $menus[] = array(
                    "menu" => $menu,
                    "description" => "常設メニュー",
                );
            }
        }

        if ($summer) {
            $summer_menus = Menu::where('category', 'summer_menu')->get();
            foreach ($summer_menus as $menu) {
                $menus[] = array(
                    "menu" => $menu,
                    'description' => "夏限定メニュー",
                );
            }
        }

        $today_menu = DailyMenu::where('date', date("Y-m-d"))->first();
        $menus[] = array(
            "menu" => Menu::where('menu_id', $today_menu->ramen)->first(),
            "description" => "常設メニュー（ラーメン）",
        );

        return view('index', compact('menus'), ['mode' => 'permanent']);
    }
}
