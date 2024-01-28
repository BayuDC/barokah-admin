<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class WorkerDetail extends Component {
    public User $user;

    public function resetPassword() {
        $this->user->password = Hash::make('barokahku');
        $this->user->save();

        return redirect()->to('/admin/workers/' . $this->user->id)
            ->with('message', 'Kata sandi telah dikembalikan ke pengaturan awal');
    }

    public function mount(User $user) {
        $this->authorize('manage-worker');
        $this->user = $user;
    }

    #[Title('Detail Karyawan')]
    public function render() {
        return view('livewire.worker-detail');
    }
}
