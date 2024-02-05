<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class TransactionController extends Controller {
    public function index(): JsonResponse {
        $user = Auth::user();
        return response()->json([
            'transactions' => $user->transactions()
                ->with('products')
                ->withCount('products')
                ->whereNot('status', null)
                ->get()
        ]);
    }

    public function show(Transaction $transaction): JsonResponse {
        $this->authorize('own-transaction', $transaction);

        return response()->json([
            'transaction' => $transaction->load('products')->loadCount('products')
        ]);
    }
    public function finish(Transaction $transaction) {
        $this->authorize('own-transaction', $transaction);
        if ($transaction->status != 'confirmed') abort(400);

        $transaction->status = 'finished';
        $transaction->save();

        return response()->noContent();
    }
    public function cancel(Transaction $transaction) {
        $this->authorize('own-transaction', $transaction);
        if ($transaction->status != 'created' && $transaction->status != 'confirmed') abort(400);

        $transaction->status = 'canceled';
        $transaction->save();

        return response()->noContent();
    }

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


        DB::beginTransaction();

        $price = 0;
        foreach ($transaction->products as $product) {
            $price += $product->pivot->quantity * $product->price;

            if ($product->stock < $product->pivot->quantity) {
                DB::rollBack();
                return response()->json([
                    'message' => 'Product out of stock',
                    'product' => $product
                ], 400);
            }

            $product->stock -= $product->pivot->quantity;
            $product->save();
        }

        $transaction->status = 'created';
        $transaction->payment = $body['payment'];
        $transaction->final_price = $price;
        $transaction->save();
        DB::commit();

        return response()->noContent();
    }
}
