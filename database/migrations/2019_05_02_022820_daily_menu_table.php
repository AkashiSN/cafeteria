<?php

/**
 * Daily_menu_table.php
 *
 * PHP Version = 7.0
 *
 * @category Migration
 * @package  Migration
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * DailyMenuTable class
 *
 * 日替わりメニューのテーブルをマイグレーションを行います。
 *
 * @category Migration
 * @package  Migration
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class DailyMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'daily_menu',
            function (Blueprint $table) {
                $table->date('date')->primary()->unique();
                $table->integer('week');
                $table->integer('menu_id_A');
                $table->integer('menu_id_B');
                $table->integer('ramen');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_menu');
    }
}
