<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class UserTable extends Component {

    #[Title("Daftar Pengguna")]
    public function render() {
        return view('livewire.user-table');
    }
}
