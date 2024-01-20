<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\User;

class UserDetail extends Component {
    public User $user;

    public function mount(User $user) {
        $this->user = $user;
    }

    #[Title('Detail Pengguna')]
    public function render() {
        return view('livewire.user-detail');
    }
}
