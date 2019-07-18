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

use App\Models\Menu;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminMenu;
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
        return view(
            'admin.menus.create',
            [
                'menu' => new Menu(),
                'descriptions' => Menu::$descriptions
            ]
        );
    }

    /**
     * メニューを作成する。
     *
     * @param StoreAdminMenu $request バリデータを通過したリクエスト
     *
     * @return Renderable
     */
    public function store(StoreAdminMenu $request)
    {
        Menu::create(
            [
            'id'        => Menu::max('id') + 1,
            'item_name' => $request -> input('item_name'),
            'category'  => $request -> input('category'),
            'price'     => $request -> input('price'),
            'energy'    => $request -> input('energy'),
            'protein'   => $request -> input('protein'),
            'lipid'     => $request -> input('lipid'),
            'salt'      => $request -> input('salt'),
            'alias'     => 0
            ]
        );

        return redirect() -> route('admin.menus.create');
    }

    /**
     * 日替わりメニューを設定する。
     *
     * @param Usecase $usecase ユースケース
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
