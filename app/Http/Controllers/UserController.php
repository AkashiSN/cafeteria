<?php

/**
 * UserController.php
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
use App\Models\Favorite;
use App\Models\DailyMenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Usecases\MenuUsecase as Usecase;
use DateTime;
use DateInterval;

/**
 * UserController class
 *
 * ユーザ情報のコントローラです。
 *
 * @category Contoller
 * @package  Contoller
 * @author   shikibu9419 <shikibu9419@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class UserController extends Controller
{
    /**
     * マイページを表示する。
     *
     * @return Renderable
     */
    public function show()
    {

        return view('users.show');
    }

    /**
     * ユーザのお気に入り一覧を表示する。
     *
     * @return Renderable
     */
    public function favorites()
    {

        return view('users.favorites');
    }

    /**
     * ユーザのレビュー一覧を表示する。
     *
     * @return Renderable
     */
    public function reviews()
    {

        return view('users.reviews');
    }
}
