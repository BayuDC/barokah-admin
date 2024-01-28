<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryDelete extends Component {
    public function attempt($id) {
        $this->authorize('manage-category');

        Category::query()->where('id', $id)->delete();

        return redirect()->to('/admin/categories')
            ->with('message', 'Kategori berhasil dihapus');
    }

    public function mount() {
        $this->authorize('manage-category');
    }

    public function render() {
        return view('livewire.category-delete');
    }
}
