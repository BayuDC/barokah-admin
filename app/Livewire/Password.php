<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Password extends Component {

    #[Validate('required', message: 'Kata sandi lama harus diisi')]
    #[Validate('current_password', message: 'Kata sandi lama tidak benar')]
    public $passwordOld;

    #[Validate('required', message: 'Kata sandi baru harus diisi')]
    #[Validate('min:8', message: 'Panjang kata sandi minimal 8 karakter')]
    public $passwordNew;

    public function save() {
        $body = $this->validate();

        $user = Auth::user();
        $user->password = Hash::make($body['passwordNew']);
        $user->save();

        return redirect()->to('/admin/password')->with('message', 'Kata sandi berhasil diganti');
    }

    #[Title('Kata Sandi')]
    public function render() {
        return view('livewire.password');
    }
}
