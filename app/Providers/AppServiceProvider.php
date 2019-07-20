<?php

/**
 * AppServiceProvider.php
 *
 * PHP Version = 7.0
 *
 * @category ServiceProvider
 * @package  ServiceProvider
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */

namespace App\Providers;

use App\Models\Setting;
use App\Models\DailyMenu;
use Illuminate\Support\ServiceProvider;

/**
 * AppServiceProvider class
 *
 * アプリケーションの初期化時の動作を定義します。
 *
 * @category ServiceProvider
 * @package  ServiceProvider
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $setting = Setting::pluck('value', 'key');
        config(['setting' => $setting]);
    }
}
