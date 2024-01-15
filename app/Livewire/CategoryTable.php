<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class CategoryTable extends Component {

    #[Title('Daftar Kategori')]
    public function render() {
        return view('livewire.category-table');
    }
}
