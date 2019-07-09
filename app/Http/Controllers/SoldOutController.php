<?php

/**
 * SoldOutController.php
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

use App\Models\SoldOut;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * SoldOutController class
 *
 * 売り切れ情報のコントローラです。
 *
 * @category Contoller
 * @package  Contoller
 * @author   shikibu9419 <shikibu9419@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class SoldOutController extends Controller
{
    /**
     * 売り切れ情報をjson形式で返します。
     *
     * @param int     $menu_id メニューID
     *
     * @return string json形式のステータス
     */
    public function show($menu_id)
    {
        $sold_out = SoldOut::where('menu_id', $menu_id) -> first();
        if ($sold_out === null) {
            $status = 500;
            return response() -> json(
                [
                    'status' => $status,
                    'errors' => 'Menu does not exist'
                ],
                $status
            );
        }

        $status = 200;
        return response() -> json(
            [
            'sold_out' => $sold_out -> sold_out,
            ],
            $status
        );
    }

    /**
     * 売り切れ情報を更新します。
     *
     * @param Request $request APIリクエスト
     * @param int     $menu_id メニューID
     *
     * @return string json形式のステータス
     */
    public function update(Request $request, $menu_id)
    {
        $sold_out = SoldOut::where('menu_id', $menu_id) -> first();
        if ($sold_out === null) {
            $status = 500;
            return response() -> json(
                [
                    'status' => $status,
                    'errors' => 'Menu does not exist'
                ],
                $status
            );
        }

        $sold_out -> sold_out = $request -> sold_out;
        $sold_out -> save();

        $status = 200;
        return response() -> json(
            [
            'status' => $status,
            ],
            $status
        );
    }
}
