<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductDelete extends Component {

    public function delete($id) {
        Product::query()->where('id', $id)->delete();

        return redirect()->to('/admin/products')->with('message', 'Produk berhasil dihapus');
    }

    public function render() {
        return view('livewire.product-delete');
    }
}
