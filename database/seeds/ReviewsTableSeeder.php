<?php

/**
 * ReviewsTableSeeder.php
 *
 * PHP Version = 7.0
 *
 * @category Seeder
 * @package  Seeder
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */

use App\Models\Review;
use Illuminate\Database\Seeder;

/**
 * ReviewsTableSeeder class
 *
 * レビューデータの初期挿入を行います。
 *
 * @category Seeder
 * @package  Seeder
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Review::create(
            array(
            'menu_id' => 1,
            'user_id' => 1,
            'evaluation' => 1,
            'comment' => "あまり美味しくない"
            )
        );
    }
}
