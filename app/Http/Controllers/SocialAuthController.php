<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Services\SocialAuthService;

class SocialAuthController extends Controller
{
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookCallback(SocialAuthService $service)
    {
        $driverName = 'facebook';
        $user = $service->createOrGetUserFacebook(Socialite::driver($driverName)->user(), $driverName);
        auth()->login($user);

        return redirect()->to('/home');
    }

    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback(SocialAuthService $service)
    {
        $driverName = 'google';
        $user = $service->createOrGetUserFacebook(Socialite::driver($driverName)->user(), $driverName);
        auth()->login($user);

        return redirect()->to('/home');
    }
}
