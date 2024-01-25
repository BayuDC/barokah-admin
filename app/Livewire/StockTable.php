<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;
use NunoMaduro\Collision\Highlighter;

use function Laravel\Prompts\search;

class StockTable extends Component {
    use WithPagination;

    public $query = '';

    public $filter = [
        'category' => 0
    ];


    #[Title('Stok Produk')]
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

        return view('livewire.stock-table', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function restock(int $id, int $value) {
        $this->authorize('manage-stock');

        $product = Product::query()->find($id);
        if (!$product) return;

        $product->stock += $value;
        $product->timestamps = false;
        $product->saveQuietly();

        $this->resetPage();
    }

    public function search() {
        $this->resetPage();
    }
}
