<?php

/**
 * Menus_table.php
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
 * MenusTable class
 *
 * メニューテーブルのマイグレーションを行います。
 *
 * @category Migration
 * @package  Migration
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class MenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'menus',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('item_name');
                $table->string('category');
                $table->integer('alias');
                $table->integer('price');
                $table->double('energy');
                $table->double('protein');
                $table->double('lipid');
                $table->double('salt');
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
        Schema::dropIfExists('menus');
    }
}
