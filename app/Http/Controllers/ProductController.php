<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller {
    public function index(Request $request) {
        $productQuery = Product::query()->inRandomOrder();

        $categoryId = $request->query('category_id');
        if ($categoryId) {
            $productQuery->where('category_id', $categoryId);
        }

        return [
            'products' => $productQuery->get()
        ];
    }
}
