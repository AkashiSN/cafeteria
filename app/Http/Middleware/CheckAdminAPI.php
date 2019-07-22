<?php

/**
 * CheckAdminAPI.php
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

/**
 * CheckAdminAPI class
 *
 * APIで管理者かどうかを判定するミドルウェアです。
 *
 * @category Middleware
 * @package  Middleware
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class CheckAdminAPI
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
        $user = $request -> user('api');

        if (!$user) {
            return response() -> json(
                [
                    'status' => 500,
                    'message' => 'Please login.'
                ],
                200
            );
        }

        if (!($user -> is_admin)) {
            return response() -> json(
                [
                    'status' => 500,
                    'message' => 'Admin access required.'
                ],
                200
            );
        }

        return $next($request);
    }
}
