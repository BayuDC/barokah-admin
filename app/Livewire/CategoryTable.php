<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\Component;

class CategoryTable extends Component {

    #[Title('Daftar Kategori')]
    public function render() {
        $categories = Category::all();

        return view('livewire.category-table', [
            'categories' => $categories
        ]);
    }
}
