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
use DateTime;
use App\Models\Menu;
use App\Models\Setting;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminMenu;
use App\Usecases\SetMenuUsecase;
use App\Usecases\DailyMenuUsecase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    public function setMenu(SetMenuUsecase $usecase)
    {
        list($menu_tables, $options) = $usecase -> getMenuTable();

        return view(
            'admin.menus.set_menu', compact('menu_tables', 'options')
        );
    }

    /**
     * ラーメン情報を返す
     *
     * @return string json形式のラーメン情報
     */
    public function settings() {
        $settings = Setting::pluck('value', 'key');
        $settings['ramens'] = Menu::where('category', 'ramen') -> get();
        $settings['status'] = 200;

        return response() -> json($settings, $settings['status']);
    }

    /**
     * ラーメン情報を更新する
     *
     * Request $request リクエスト
     *
     * @return int status
     */
    public function update_setting(Request $request) {
        $ramen = Menu::find($request -> ramen);
        if ($ramen === null || $ramen -> category !== 'ramen') {
            $status = 500;
            return response() -> json(
                [
                    'status' => $status,
                    'errors' => 'This ramen does not exist'
                ],
                $status
            );
        }

        foreach ($request -> all() as $key => $value) {
            $setting = Setting::where('key', $key) -> first();
            $setting -> value = $value;
            $setting -> save();
        }

        $status = 200;
        return response() -> json(
            [
                'status' => $status,
            ],
            $status
        );
    }
}
