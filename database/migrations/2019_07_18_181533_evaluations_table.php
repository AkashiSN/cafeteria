<?php

/**
 * Evaluations_table.php
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
 * EvaluationsTable class
 *
 * 平均評価のマイグレーションを行います。
 *
 * @category Migration
 * @package  Migration
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class EvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'evaluations',
            function (Blueprint $table) {
                $table->integer('menu_id')->primary()->unsigned()->default(0);
                $table->foreign('menu_id')->references('id')->on('menus');
                $table->float('evaluation');
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
        Schema::dropIfExists('evaluations');
    }
}
