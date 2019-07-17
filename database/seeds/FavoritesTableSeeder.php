<?php

/**
 * FavoritesTableSeeder.php
 *
 * PHP Version = 7.0
 *
 * @category Seeder
 * @package  Seeder
 * @author   shikibu9419 <shikibu9419@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */

use App\Models\Favorite;
use Illuminate\Database\Seeder;

/**
 * FavoritesTableSeeder class
 *
 * お気に入り情報データの初期挿入を行います。
 *
 * @category Seeder
 * @package  Seeder
 * @author   shikibu9419 <shikibu9419@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class FavoritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Favorite::create(
            array(
            'user_id' => 1,
            'menu_id' => 1
            )
        );
        Favorite::create(
            array(
            'user_id' => 1,
            'menu_id' => 2
            )
        );
    }
}
