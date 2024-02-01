<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
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
            'products' => $cart->products
        ]);
    }
    public function update() {
        $user = Auth::user();
        $cart = $user->transactions()->firstOrCreate([
            'status' => null
        ]);

        $quantity = -100;
        $productId = 2;

        $product =  $cart->products()
            ->WherePivot('product_id', $productId)->first();

        if (!$product) {
            if ($quantity > 0) {
                $cart->products()->attach($productId, [
                    'quantity' => $quantity
                ]);
            }

            return response()->noContent();
        }

        $quantity += $product->pivot->quantity;

        if ($quantity <= 0) {
            $cart->products()->detach($productId);

            return response()->noContent();
        }

        $cart->products()->updateExistingPivot($productId, [
            'quantity' => $quantity
        ]);

        return response()->noContent();
    }
}
