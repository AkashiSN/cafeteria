<?php

/**
 * EvaluationTableSeeder.php
 *
 * PHP Version = 7.0
 *
 * @category Seeder
 * @package  Seeder
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */

use App\Models\Evaluation;
use Illuminate\Database\Seeder;

/**
 * EvaluationTableSeeder class
 *
 * 評価データの初期挿入を行います。
 *
 * @category Seeder
 * @package  Seeder
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class EvaluationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Evaluation::create(
            array(
            'menu_id' => 1,
            'evaluation' => 1,
            )
        );
    }
}
