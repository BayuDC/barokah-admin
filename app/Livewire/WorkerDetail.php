<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\User;

class WorkerDetail extends Component {
    public User $user;

    public function mount(User $user) {
        $this->user = $user;
    }


    #[Title('Detail Pekerja')]
    public function render() {
        return view('livewire.worker-detail');
    }
}
