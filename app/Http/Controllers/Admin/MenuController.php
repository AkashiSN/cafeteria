<?php

/**
 * Admin\MenuController.php
 *
 * PHP Version = 7.0
 *
 * @category Contoller
 * @package  Contoller
 * @author   shikibu9419 <shikibu9419@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */

namespace App\Http\Controllers\Admin;

use Log;
use App\Models\Menu;
use App\Models\Review;
use App\Models\Favorite;
use App\Models\DailyMenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Usecases\SetMenuUsecase as Usecase;

/**
 * Admin\MenuController class
 *
 * (Admin) メニュー情報のコントローラです。
 *
 * @category Contoller
 * @package  Contoller
 * @author   shikibu9419 <shikibu9419@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class MenuController extends Controller
{

    /**
     * メニュー作成画面を表示する。
     *
     * @return Renderable
     */
    public function create()
    {
        return view('admin.menus.create');
    }

    /**
     * メニューを作成する。
     *
     * @return Renderable
     */
    public function store()
    {
    }

    /**
     * 日替わりメニューを設定する。
     *
     * @return Renderable
     */
    public function setMenu(Usecase $usecase)
    {
        list($menu_table, $options) = $usecase -> getMenuTable();

        return view(
            'admin.menus.set_menu', compact('menu_table', 'options')
        );
    }
}
