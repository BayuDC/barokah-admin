<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

class Password extends Component {

    #[Title('Ganti Kata Sandi')]
    public function render() {
        return view('livewire.password');
    }
}
