<?php

namespace App\Livewire;

use App\Models\User;
use App\Livewire\Forms\UserForm;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class WorkerUpdate extends Component {
    use WithFileUploads;

    public UserForm $form;

    public function save() {
        $this->form->update();

        return redirect()->to('/admin/workers')
            ->with('message', 'Data karyawan berhasil diedit');
    }

    public function mount(User $user) {
        $this->authorize('manage-worker');
        $this->form->load($user);
    }

    #[Title('Edit Karyawan')]
    public function render() {
        return view('livewire.worker-update');
    }
}
