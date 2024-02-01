<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller {
    public function index(Request $request) {
        $categoryId = $request->query('category_id');
        $search = $request->query('search');

        $query = Product::query()->inRandomOrder();
        $query->where('name', 'like', '%' . $search . '%');

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        return [
            'products' => $query->get()
        ];
    }
}
