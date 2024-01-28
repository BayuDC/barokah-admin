<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryTable extends Component {
    use WithPagination;

    public string $query = '';

    #[Title('Daftar Kategori')]
    public function render() {
        $query = Category::query();
        $query->where('name', 'like', '%' . $this->query . '%');

        return view('livewire.category-table', [
            'categories' => $query->paginate()
        ]);
    }
}
