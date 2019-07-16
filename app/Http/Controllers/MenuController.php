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
use App\Models\Review;
use App\Http\Controllers\Controller;
use App\Usecases\MenuUsecase as Usecase;

/**
 * MenuController class
 *
 * メニュー情報のコントローラです。
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
     * メニューリストを表示する。
     *
     * @return Renderable
     */
    public function index(Usecase $usecase)
    {
        list($daily_schedule, $options) = $usecase -> getDaily();
        $permanent_list = $usecase -> getPermanent();

        return view(
            'menus.index',
            compact('daily_schedule', 'permanent_list', 'options')
        );
    }

    /**
     * メニュー詳細を表示する。
     *
     * @param int $menu_id メニューID
     *
     * @return Renderable
     */
    public function show($menu_id)
    {
        $menu = Menu::getWithStatuses() -> find($menu_id);

        $reviews_list = Review::where('menu_id', $menu_id)
            -> leftJoin('users', 'reviews.user_id', '=', 'users.id')
            -> get();

        return view('menus.show', compact('menu', 'reviews_list'));
    }
}
