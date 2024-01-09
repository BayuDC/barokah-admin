<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller {

    public function index(Request $request) {
        $products = Product::paginate(10);

        return view('product.index', [
            'products' => $products
        ]);
    }
}
