<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class ProductCreate extends Component {
    #[Title('Tambah Produk')]
    public function render() {
        return view('livewire.product-create');
    }
}
