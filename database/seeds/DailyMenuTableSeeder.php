<?php

/**
 * DailyMenuTableSeeder.php
 *
 * PHP Version = 7.0
 *
 * @category Seeder
 * @package  Seeder
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */

use App\Models\Menu;
use App\Models\DailyMenu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * DailyMenuTableSeeder class
 *
 * メニューデータの初期挿入を行います。
 *
 * @category Seeder
 * @package  Seeder
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */

class DailyMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/daily_menu.json");
        $data = json_decode($json);
        $count = DB::table('menus')->count();
        foreach ($data as $date => $value) {
            $week = 0;
            $ramen = 0;
            foreach ($value as $obj) {
                Menu::create(
                    array(
                    'item_name' => $obj->item_name,
                    'category' => $obj->category,
                    'price' => $obj->price,
                    'energy' => $obj->energy,
                    'protein' => $obj->protein,
                    'lipid' => $obj->lipid,
                    'salt' => $obj->salt,
                    'alias' => 0,
                    )
                );
                $week = $obj->week;
                $ramen = $obj->ramen;
                $count++;
            }
            DailyMenu::create(
                array(
                    'date' => date($date),
                    'week' => $week,
                    'menu_id_A' => $count-1,
                    'menu_id_B' => $count,
                    'ramen' => $ramen,
                )
            );
        }
    }
}
