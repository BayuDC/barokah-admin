<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Product;
use Livewire\Attributes\Validate;

class ProductCreate extends Component {

    #[Validate('required', message: 'Nama produk tidak boleh kosong')]
    public $name;

    #[Validate('required', message: 'Harga produk tidak boleh kosong')]
    #[Validate('numeric', message: 'Harga produk harus berupa angka')]
    public $price;

    #[Validate('required', message: 'Satuan produk tidak boleh kosong')]
    public $unit;

    public function save() {
        $body = $this->validate();

        Product::create($body);

        return redirect()->to('/admin/products?last');
    }

    #[Title('Tambah Produk')]
    public function render() {
        return view('livewire.product-create');
    }
}
