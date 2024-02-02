<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller {
    public function checkout(Request $request) {
        $body = $request->validate([
            'payment' => 'required|in:cash,debit'
        ]);

        $user = Auth::user();
        $transaction = $user->transactions()->firstOrCreate([
            'status' => null
        ]);

        if ($transaction->products->isEmpty()) {
            return response()->json([
                'message' => 'You cart is empty'
            ], 418);
        }

        $price = 0;
        foreach ($transaction->products as $product) {
            $price += $product->pivot->quantity * $product->price;
        }

        $transaction->status = 'created';
        $transaction->payment = $body['payment'];
        $transaction->final_price = $price;
        $transaction->save();

        return response()->noContent();
    }
}
