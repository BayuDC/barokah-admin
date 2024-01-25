<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component {

    #[Validate('required')]
    public string $email;
    #[Validate('required')]
    public string $password;

    public bool $error = false;

    #[Title('Masuk')]
    #[Layout('components.layouts.auth')]
    public function render() {
        return view('livewire.login');
    }

    public function submit() {
        $body = $this->validate();
        $auth = Auth::attempt($body);

        if ($auth) {
            return $this->redirect('/admin');
        }

        $this->error = true;
    }
}
