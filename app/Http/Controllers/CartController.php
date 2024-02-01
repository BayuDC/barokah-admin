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
    public function update(Request $request) {
        $body = $request->validate([
            'quantity' => 'required|numeric',
            'product_id' => 'required|exists:products,id'
        ]);

        $user = Auth::user();
        $cart = $user->transactions()->firstOrCreate([
            'status' => null
        ]);

        $product =  $cart->products()
            ->WherePivot('product_id', $body['product_id'])->first();
        $quantity = $body['quantity'];

        if (!$product) {
            if ($quantity > 0) {
                $cart->products()->attach($body['product_id'], [
                    'quantity' => $quantity
                ]);
            }

            return response()->noContent();
        }

        $quantity += $product->pivot->quantity;

        if ($quantity <= 0) {
            $cart->products()->detach($product->id);

            return response()->noContent();
        }

        if ($quantity > $product->stock) {
            $quantity = $product->stock;
        }

        $cart->products()->updateExistingPivot($product->id, [
            'quantity' => $quantity
        ]);

        return response()->noContent();
    }
}
