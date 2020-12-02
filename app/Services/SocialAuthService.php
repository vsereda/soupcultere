<?php


namespace App\Services;

use App\User;
use App\SocialLogin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAuthService
{
    public function createOrGetUserFacebook(ProviderUser $providerUser, string $provider)
    {
        $account = SocialLogin::whereProvider($provider)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialLogin([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $provider
            ]);

            $email = $providerUser->getEmail() ?? preg_replace('/[^a-zа-я]/ui', '', ($providerUser->getName() ?? 'name')) . '@' . $provider . '.com';
            $user = User::whereEmail($email)->first();

            if (!$user) {

                $user = User::create([
                    'email' => $email,
                    'name' => $providerUser->getName(),
                    'password' => Hash::make(Str::random(40)),
                    'email_verified_at' => Carbon::now()->format('Y-m-d h:i:s'),
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
}
