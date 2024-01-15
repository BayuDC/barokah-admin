<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use App\Models\Product;

class ProductCreate extends Component {
    use WithFileUploads;

    #[Validate('required', message: 'Nama produk tidak boleh kosong')]
    public $name;

    #[Validate('required', message: 'Harga produk tidak boleh kosong')]
    #[Validate('numeric', message: 'Harga produk harus berupa angka')]
    public $price;

    #[Validate('required', message: 'Satuan produk tidak boleh kosong')]
    public  $unit;

    #[Validate('required', message: 'Gambar produk tidak boleh kosong')]
    #[Validate('image', message: 'File harus berupa file gambar')]
    #[Validate('max:1024', message: 'Ukuran file maksimal 1 MB')]
    public $picture;

    public function save() {
        $body = $this->validate();
        $body['picture_url'] = $this->picture->store(options: ['disk' => 'uploads']);

        Product::create($body);

        return redirect()->to('/admin/products')->with('message', 'Produk berhasil ditambahkan');
    }

    #[Title('Tambah Produk')]
    public function render() {
        return view('livewire.product-create');
    }
}
