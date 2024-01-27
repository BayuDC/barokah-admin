<?php

namespace App\Livewire;

use App\Livewire\Forms\UserForm;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;

class Profile extends Component {
    use WithFileUploads;

    public UserForm $form;

    public function save() {
        $this->form->update();

        return redirect()->to('/admin/profile')
            ->with('message', 'Perubahan data diri berhasil disimpan');
    }

    public function mount() {
        $this->form->load(Auth::user());
    }

    #[Title('Data Diri')]
    public function render() {
        return view('livewire.profile');
    }
}
