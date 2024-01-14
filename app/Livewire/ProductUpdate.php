<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Product;

class ProductUpdate extends Component {

    public Product $product;

    #[Validate('required', message: 'Nama produk tidak boleh kosong')]
    public $name;

    #[Validate('required', message: 'Harga produk tidak boleh kosong')]
    #[Validate('numeric', message: 'Harga produk harus berupa angka')]
    public $price;

    #[Validate('required', message: 'Satuan produk tidak boleh kosong')]
    public $unit;

    public function mount(Product $product) {
        $this->product = $product;
        $this->name = $product['name'];
        $this->price = $product['price'];
        $this->unit = $product['unit'];
    }

    public function save() {
        $body = $this->validate();

        $this->product->update($body);

        return redirect()->to('/admin/products')->with('message', 'Produk berhasil diedit');
    }


    #[Title('Edit Produk')]
    public function render() {
        return view('livewire.product-update');
    }
}