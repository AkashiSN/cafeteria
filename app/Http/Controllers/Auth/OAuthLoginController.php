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

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        $googleUser = Socialite::driver('google') -> stateless() -> user();
        $user = User::firstOrNew(['email' => $googleUser -> getEmail()]);
        if (!$user -> exists) {
            $user['name'] = $googleUser -> getNickname() ?? $googleUser -> getName();
            $user['email'] = $googleUser -> getEmail();
            $user['avatar'] = $googleUser -> getAvatar();
            $user -> save();
        }
        $user['api_token'] = str_random(60);
        $user -> save();

        Auth::login($user);

        return redirect()->route('home');
    }

    /**
     * Logout user
     *
     * @param Request $request userinfo
     *
     * @return void
     */
    public function getLogout(Request $request)
    {
        $user = $request->user();
        $user['api_token'] = null;
        $user -> save();

        Auth::logout($user);

        return redirect()->route('home');
    }
}
