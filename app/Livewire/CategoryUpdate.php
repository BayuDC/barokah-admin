<?php

namespace App\Livewire;

use App\Livewire\Forms\CategoryForm;
use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CategoryUpdate extends Component {
    public CategoryForm $form;

    public function save() {
        $this->authorize('manage-category');
        $this->form->update();

        return redirect()->to('/admin/categories')
            ->with('message', 'Kategori berhasil diedit');
    }

    public function mount(Category $category) {
        $this->authorize('manage-category');
        $this->form->load($category);
    }

    #[Title('Edit Kategori')]
    public function render() {
        return view('livewire.category-update');
    }
}
