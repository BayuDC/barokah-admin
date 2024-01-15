<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CategoryUpdate extends Component {
    public Category $category;

    #[Validate('required', message: 'Nama kategori tidak boleh kosong')]
    public string $name;

    public function mount(Category $category) {
        $this->category = $category;
        $this->name = $category['name'];
    }

    public function save() {
        $body = $this->validate();
        $this->category->update($body);

        return redirect()->to('/admin/categories')->with('message', 'Kategori berhasil diedit');
    }

    #[Title('Edit Kategori')]
    public function render() {
        return view('livewire.category-update');
    }
}