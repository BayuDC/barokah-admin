<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Validate;

class CategoryCreate extends Component {

    #[Validate('required', message: 'Nama kategori harus diisi')]
    public string $name;

    public function save() {
        $body = $this->validate();

        Category::query()->create($body);

        return redirect()->to('/admin/categories')
            ->with('message', 'Kategori berhasil ditambahkan');
    }

    #[Title("Tambah Kategori")]
    public function render() {
        return view('livewire.category-create');
    }
}
