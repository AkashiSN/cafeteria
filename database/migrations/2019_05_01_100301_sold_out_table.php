<?php

/**
 * Sold_out_table.php
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
 * SoldOutTable class
 *
 * 売り切れ情報のテーブルのマイグレーションを行います。
 *
 * @category Migration
 * @package  Migration
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class SoldOutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'sold_out',
            function (Blueprint $table) {
                $table->integer('menu_id')->primary();
                $table->boolean('sold_out');
                $table->timestamps();
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
        Schema::dropIfExists('sold_out');
    }
}
