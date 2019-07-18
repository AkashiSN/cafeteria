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
use Illuminate\Http\Request;

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
     * @param Usecase $usecase ユースケース
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

        if (count($reviews_list) > 0) {
            $evaluation = 0;
            foreach ($reviews_list as $review) {
                $evaluation += $review -> evaluation;
            }
            $average_evaluation = ($evaluation / count($reviews_list)) * 20;
        } else {
            $average_evaluation = 0;
        }

        return view(
            'menus.show',
            compact('menu', 'reviews_list', 'average_evaluation')
        );
    }

    public function search(Request $request) {
        $item_name = $request -> item_name;
        $category = $request -> category;

        $result = Menu::where('category', $category)
            -> when(!is_null($item_name), function ($query) use ($item_name) {
                return $query -> where('item_name', 'like', "%{$item_name}%");
            }) -> get();

        $status = 200;
        return response() -> json(
            [
                'status' => $status,
                'menus' => $result
            ],
            $status
        );
    }
}
