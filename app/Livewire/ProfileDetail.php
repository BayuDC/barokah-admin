<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class ProfileDetail extends Component {
    public User $user;

    public function mount() {
        $this->user = Auth::user();
    }

    #[Title('Data Diri')]
    public function render() {
        return view('livewire.profile-detail');
    }
}
