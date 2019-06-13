<?php

/**
 * MenuTableSeeder.php
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
use Illuminate\Database\Seeder;

/**
 * MenuTableSeeder class
 *
 * メニューデータの初期挿入を行います。
 *
 * @category Seeder
 * @package  Seeder
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/menu.json");
        $data = json_decode($json);
        $count = 0;
        foreach ($data as $obj) {
            Menu::create(
                array(
                'menu_id' => $obj->id,
                'item_name' => $obj->item_name,
                'category' => $obj->category,
                'price' => $obj->price,
                'energy' => $obj->energy,
                'protein' => $obj->protein,
                'lipid' => $obj->lipid,
                'salt' => $obj->salt,
                'alias' => $obj->alias,
                )
            );
        }
    }
}
