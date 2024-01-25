<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;
use App\Models\Product;
use App\Models\Category;

class ProductUpdate extends Component {
    use WithFileUploads;

    public Product $product;

    #[Validate('required', message: 'Nama produk tidak boleh kosong')]
    public $name;

    #[Validate('required', message: 'Harga produk tidak boleh kosong')]
    #[Validate('numeric', message: 'Harga produk harus berupa angka')]
    public $price;

    #[Validate('required', message: 'Satuan produk tidak boleh kosong')]
    public $unit;

    #[Validate('nullable')]
    #[Validate('image', message: 'File harus berupa file gambar')]
    #[Validate('max:1024', message: 'Ukuran file maksimal 1 MB')]
    public $picture;

    public $pictureUrl;

    #[Validate('required', message: 'Kategori produk tidak boleh kosong')]
    #[Validate('exists:categories,id', message: 'Kategori tidak ditemukan')]
    public $category_id;

    public function save() {
        $this->authorize('manage-product');

        $body = $this->validate();
        if ($this->picture) {
            $body['picture_url'] = $this->picture->store(options: ['disk' => 'uploads']);
        }

        $this->product->update($body);

        return redirect()->to('/admin/products')->with('message', 'Produk berhasil diedit');
    }

    public function mount(Product $product) {
        $this->authorize('manage-product');

        $this->product = $product;
        $this->name = $product['name'];
        $this->price = $product['price'];
        $this->unit = $product['unit'];
        $this->category_id = $product['category_id'];
        $this->pictureUrl = $product['picture_url'];
    }

    #[Title('Edit Produk')]
    public function render() {
        $categories = Category::all(['id', 'name']);
        return view('livewire.product-update', [
            'categories' => $categories
        ]);
    }
}
