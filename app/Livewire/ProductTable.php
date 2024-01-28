<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Models\Product;
use App\Models\Category;

class ProductTable extends Component {
    use WithPagination;

    public $query = '';

    public $filter = [
        'category' => 0
    ];

    #[Title('Daftar Produk')]
    public function render() {
        $query = Product::query();
        $query->where('name', 'like', '%' . $this->query . '%');
        $query->with('category:id,name,color');
        // ->orderBy('updated_at', 'desc')

        if ($this->filter['category'] != 0) {
            $query->where('category_id', $this->filter['category']);
        }

        $products = $query->paginate();
        $categories = Category::all('id', 'name');

        return view('livewire.product-table', [
            'products' => $products,
            'categories' => $categories
        ]);
    }
}
