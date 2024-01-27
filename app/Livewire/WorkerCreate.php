<?php

namespace App\Livewire;

use App\Livewire\Forms\UserForm;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class WorkerCreate extends Component {
    use WithFileUploads;

    public UserForm $form;

    public function save() {
        $this->form->create();

        return redirect()->to('/admin/workers')
            ->with('message', 'Karyawan berhasil ditambahkan dengan kata sandi: barokahku');
    }

    public function mount() {
        $this->authorize('manage-worker');
    }

    #[Title('Tambah Karyawan')]
    public function render() {
        return view('livewire.worker-create');
    }
}
