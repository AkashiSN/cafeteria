<?php

/**
 * UsersTableSeeder.php
 *
 * PHP Version = 7.0
 *
 * @category Seeder
 * @package  Seeder
 * @author   shikibu9419 <shikibu9419@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */

use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * UsersTableSeeder class
 *
 * ユーザデータの初期挿入を行います。
 *
 * @category Seeder
 * @package  Seeder
 * @author   shikibu9419 <shikibu9419@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            array(
            'id' => 1,
            'name' => '名無しのVIPさん',
            'email' => 'noname@noname.tv'
            )
        );
    }
}
