<?php

/**
 * Handler.php
 *
 * PHP Version = 7.0
 *
 * @category Handler
 * @package  Handler
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

/**
 * Handler class
 *
 * 例外処理をするクラスです。
 *
 * @category Handler
 * @package  Handler
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param \Exception $exception exception
     *
     * @return void
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param Request   $request   request
     * @param Exception $exception exception
     *
     * @return Response
     */
    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);
    }

    /**
     * ミドルウェアauthで認証失敗した際の例外処理
     *
     * @param Request                 $request   request
     * @param AuthenticationException $exception exception
     *
     * @return Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        return $request->expectsJson()
                    ? response()->json(['message' => $exception->getMessage()], 401)
                    : redirect()->guest(route('home'));
    }
}
