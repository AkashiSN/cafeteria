<?php

/**
 * CheckAdmin.php
 *
 * PHP Version = 7.0
 *
 * @category Middleware
 * @package  Middleware
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

/**
 * CheckAdmin class
 *
 * 管理者かどうかを判定するミドルウェアです。
 *
 * @category Middleware
 * @package  Middleware
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request リクエスト
     * @param Closure $next    次に実行されるもの
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect() -> route('home');
        }

        if (!(Auth::user() -> is_admin)) {
            return redirect() -> route('home');
        }

        return $next($request);
    }
}
