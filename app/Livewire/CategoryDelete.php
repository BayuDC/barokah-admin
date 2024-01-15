<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryDelete extends Component {
    public function delete($id) {
        Category::query()->where('id', $id)->delete();

        return redirect()->to('/admin/categories')->with('message', 'Kategori berhasil dihapus');
    }

    public function render() {
        return view('livewire.category-delete');
    }
}
