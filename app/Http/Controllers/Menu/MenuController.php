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

namespace App\Http\Controllers\Menu;

use App\Models\Menu;
use App\Models\Favorite;
use App\Models\DailyMenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DateTime;
use DateInterval;

/**
 * MenuController class
 *
 * メニュー関連の継承用コントローラです。
 *
 * @category Contoller
 * @package  Contoller
 * @author   shikibu9419 <shikibu9419@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class MenuController extends Controller
{

    private $descriptions = array(
        'permanent_menu' => '常設メニュー',
        'ramen'          => '常設メニュー',
        'summer_menu'    => '夏限定メニュー',
        'a_set_menu'     => 'Aセット（ライス・味噌汁付）',
        'b_set_menu'     => 'Bセット（味噌汁付）'
    );

    /**
     * 今月の平日のリストを以下の形式で返す
     * [[1st Mon, ..., 1st Fri], [2nd Mon, ..., 2nd Fri], ...]
     *
     * @return Array
     */
    protected function this_weekdays()
    {
        $datetime = new DateTime();
        $year  = (int)$datetime -> format('Y');
        $month = (int)$datetime -> format('m');
        $datetime -> setDate($year, $month, 1);

        $target   = range(1, 5);  // Mon. to Fri.
        $interval = new DateInterval('P1D');  // interval: 1day

        $result  = array();
        $weekday = array();

        while((int)$datetime -> format('m') == $month) {
            $week = (int)$datetime -> format('w');
            if(in_array($week, $target)) {
                $weekday[] = clone $datetime;
                if($week == 5) {
                    $result[] = $weekday;
                    $weekday  = array();
                }
            }
            $datetime -> add($interval);
        }

        return $result;
    }
}
