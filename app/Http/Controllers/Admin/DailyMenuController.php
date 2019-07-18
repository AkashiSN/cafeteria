<?php

/**
 * Admin\DailyMenuController.php
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

use DateTime;
use App\Models\Menu;
use App\Models\Review;
use App\Models\Favorite;
use App\Models\DailyMenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Usecases\SetMenuUsecase;
use App\Usecases\DailyMenuUsecase;
use Illuminate\Support\Facades\Auth;

/**
 * Admin\DailyMenuController class
 *
 * (Admin) 日替わりメニュー情報のコントローラです。
 *
 * @category Contoller
 * @package  Contoller
 * @author   shikibu9419 <shikibu9419@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class DailyMenuController extends Controller
{

    /**
     * 日替わりメニューを設定する。
     *
     * @return Renderable
     */
    public function edit(SetMenuUsecase $usecase)
    {
        list($menu_table, $options) = $usecase -> getMenuTable();

        return view(
            'admin.menus.set_menu', compact('menu_table', 'options')
        );
    }

    /**
     * 日替わりメニュー情報を更新します。
     *
     * @param Request $request APIリクエスト
     * @param int     $menu_id メニューID
     *
     * @return string json形式のステータス
     */
    public function update(Request $request, DailyMenuUsecase $usecase)
    {
        $datetime = DateTime::createFromFormat('n月j日*', $request -> date);
        $daily_menu = DailyMenu::firstOrNew(['date' => $datetime]);

        $daily_menu[$usecase -> categoryToColumn($request -> category)] = $request -> menu_id;
        $daily_menu -> save();

        $status = 200;
        return response() -> json(
            [
            'status' => $status,
            ],
            $status
        );
    }
}
