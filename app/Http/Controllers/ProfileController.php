<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller {
    public function update(Request $request) {
        $body = $request->validate([
            'name' => 'nullable',
            'gender' => 'nullable|in:M,F',
            'phone' => 'nullable',
            'address' => 'nullable',
        ]);
        $user = Auth::user();

        $user->update($body);

        return response()->noContent();
    }
}
