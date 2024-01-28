<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Category;

class CategoryForm extends Form {
    public Category $category;

    #[Validate('required', message: 'Nama kategori tidak boleh kosong')]
    public string $name;

    #[Validate('nullable')]
    #[Validate(
        'in:red,orange,amber,emerald,teal,lightBlue,indigo,purple,pink',
        message: 'Warna tersebut tidak tersedia'
    )]
    public ?string $color;

    public function load(Category $category) {
        $this->category = $category;
        $this->name = $category['name'];
        $this->color = $category['color'];
    }

    public function create() {
        $body = $this->validate();
        Category::create($body);
    }
    public function update() {
        $body = $this->validate();
        $this->category->update($body);
    }
}
