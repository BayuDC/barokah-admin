<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class Profile extends Component {

    #[Title('Profil')]
    public function render() {
        return view('livewire.profile', [
            'user' => Auth::user()
        ]);
    }
}
