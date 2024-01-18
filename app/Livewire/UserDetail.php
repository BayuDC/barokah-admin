<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\User;

class UserDetail extends Component {
    public User $user;

    public $name;
    public $email;
    public $gender;
    public $phone;
    public $address;

    public function mount(User $user) {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->gender = $user->gender;
        $this->phone = $user->phone;
        $this->address = $user->address;
    }

    #[Title('Detail Pengguna')]
    public function render() {
        return view('livewire.user-detail');
    }
}
