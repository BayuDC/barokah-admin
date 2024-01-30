<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller {

    public function index() {
        return [
            'user' => Auth::user()
        ];
    }

    public function googleRedirect() {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback() {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = User::firstOrCreate(
            ['email' => $googleUser->email, 'role' => 'user'],
            [
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'picture_url' => $googleUser->avatar,
                'role' => 'user',
            ]
        );


        $token = Auth::guard('api')->login($user);

        return [
            'token' => $token
        ];
    }
    public function discordRedirect() {
        return Socialite::driver('discord')->redirect();
    }
    public function discordCallback() {
        $discordUser = Socialite::driver('discord')->stateless()->user();

        $user = User::firstOrCreate(
            ['email' => $discordUser->email, 'role' => 'user'],
            [
                'name' => $discordUser->name,
                'email' => $discordUser->email,
                'picture_url' => $discordUser->avatar,
                'role' => 'user',
            ]
        );

        $token = Auth::guard('api')->login($user);

        return [
            'token' => $token
        ];
    }
}
