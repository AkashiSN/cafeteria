<?php

namespace App\Http\Controllers;

use App\User;
use Socialite;
use Auth;

class OAuthLoginController extends Controller
{
    public function getGoogleAuth()
    {
        return Socialite::driver('google')->redirect();
    }

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
