<?php

/**
 * OAuthLoginController.php
 *
 * PHP Version = 7.0
 *
 * @category Contoller
 * @package  Contoller
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */

namespace App\Http\Controllers;

use App\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

/**
 * OAuthLoginController class
 *
 * Googleログインを行うコントローラーです。
 *
 * @category Contoller
 * @package  Contoller
 * @author   AkashiSN <btorntireinvynriy@gmail.com>
 * @license  MIT https://opensource.org/licenses/mit-license.php
 * @link     https://github.com/AkashiSN/cafeteria
 */
class OAuthLoginController extends Controller
{
    /**
     * Get googleAuth driver
     *
     * @return void
     */
    public function getGoogleAuth()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * ユーザーが登録済みならログイン処理を行い、未登録なら登録処理ののちログインを行う。
     *
     * @return void
     */
    public function authGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();
        $user = User::firstOrNew(['email' => $googleUser->email]);
        if (!$user->exists) {
            $user['name'] = $googleUser->getNickname() ?? $googleUser->getName();
            $user['email'] = $googleUser->email;
            $user->save();
        }
        Auth::login($user);
        return redirect()->route('index');
    }
}
