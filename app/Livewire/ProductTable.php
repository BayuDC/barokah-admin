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
        $productQuery = Product::query();
        $productQuery
            ->where('name', 'like', '%' . $this->query . '%')
            ->orderBy('updated_at', 'desc')
            ->with('category:id,name');

        if ($this->filter['category'] != 0) {
            $productQuery->where('category_id', $this->filter['category']);
        }

        $products = $productQuery->paginate(10);
        $categories = Category::all('id', 'name');

        return view('livewire.product-table', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function search() {
        $this->resetPage();
    }
}
