<?php

/**
 * DateUsecase.php
 *
 * PHP Version = 7.0
 *
 * @category Usecase
 * @package  Usecase
 * @author   shikibu9419 <shikibu9419@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */

namespace App\Usecases;

use DateTime;
use DateInterval;

/**
 * DateUsecase class
 *
 * メニュー関連処理を行うユースケースです。
 *
 * @category Usecase
 * @package  Usecase
 * @author   shikibu9419 <shikibu9419@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class DateUsecase
{

    protected $japanese_weekday = array(
        '日', '月', '火', '水', '木', '金', '土'
    );

    /**
     * 今月の平日のリストを以下の形式で返す
     *
     * @return [[1st Mon, ..., 1st Fri], [2nd Mon, ..., 2nd Fri], ...]
     */
    public static function thisWeekdays()
    {
        $datetime = new DateTime();
        $year  = (int)$datetime -> format('Y');
        $month = (int)$datetime -> format('m');
        $datetime -> setDate($year, $month, 1);

        $target   = range(1, 5);  // Mon. to Fri.
        $interval = new DateInterval('P1D');  // interval: 1day

        $result  = array();
        $workdays = array();

        while ((int)$datetime -> format('m') == $month) {
            $week = (int)$datetime -> format('w');
            if (in_array($week, $target)) {
                $workdays[] = clone $datetime;
                if ($week == 5) {
                    $result[] = $workdays;
                    $workdays = array();
                }
            }
            $datetime -> add($interval);
        }

        return $result;
    }
}
