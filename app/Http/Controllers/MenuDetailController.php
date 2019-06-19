<?php

/**
 * MenuDetailController.php
 *
 * PHP Version = 7.0
 *
 * @category Contoller
 * @package  Contoller
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * MenuDetailController class
 *
 * メニュー詳細を表示するコントローラーです
 *
 * @category Contoller
 * @package  Contoller
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class MenuDetailController extends Controller
{
    /**
     * 日替わりメニューを表示する。
     *
     * @param int $menu_id メニューID
     *
     * @return Renderable
     */
    public function menuDetail($menu_id)
    {
        $menu = Menu::where('menu_id', $menu_id)->first();

        return view('detail', compact('menu'));
    }
}