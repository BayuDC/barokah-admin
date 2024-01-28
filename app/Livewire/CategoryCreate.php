<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Livewire\Forms\CategoryForm;

class CategoryCreate extends Component {
    public CategoryForm $form;

    public function save() {
        $this->form->create();

        return redirect()->to('/admin/categories')
            ->with('message', 'Kategori berhasil ditambahkan');
    }

    public function mount() {
        $this->authorize('manage-category');
    }

    #[Title("Tambah Kategori")]
    public function render() {
        return view('livewire.category-create');
    }
}
