<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductDelete extends Component {

    public function attempt($id) {
        $this->authorize('manage-product');

        Product::query()->where('id', $id)->delete();

        return redirect()->to('/admin/products')->with('message', 'Produk berhasil dihapus');
    }
    public function mount() {
        $this->authorize('manage-product');
    }
    public function render() {
        return view('livewire.product-delete');
    }
}
