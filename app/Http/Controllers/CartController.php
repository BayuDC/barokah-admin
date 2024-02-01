<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller {
    public function index(): JsonResponse {
        $user = Auth::user();
        $cart = $user->transactions()->firstOrCreate([
            'status' => null
        ]);

        return response()->json([
            'products' => $cart->products()
        ]);
    }
    public function update() {
        $user = Auth::user();
        $cart = $user->transactions()->firstOrCreate([
            'status' => null
        ]);

        return response()->noContent();
    }
}
