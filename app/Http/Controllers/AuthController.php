<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller {

    public function googleRedirect() {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback(Request $request) {
        $googleUser = Socialite::driver('google')->stateless()->user();

        return [
            'id' => $googleUser->id,
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'avatar' => $googleUser->avatar,
        ];
    }
}
