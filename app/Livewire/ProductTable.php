<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Models\Product;

class ProductTable extends Component {
    use WithPagination;

    public $query = '';

    #[Title('Daftar Produk')]
    public function render() {
        $products = Product::query()
            ->where('name', 'like', '%' . $this->query . '%')
            ->orderBy('updated_at', 'desc')
            ->paginate(10);

        return view('livewire.product-table', [
            'products' => $products
        ]);
    }

    public function search() {
        $this->resetPage();
    }
}
