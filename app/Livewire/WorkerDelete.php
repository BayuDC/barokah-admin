<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class WorkerDelete extends Component {

    public function attempt($id) {
        $this->authorize('manage-worker');

        User::query()->where('id', $id)->whereNot('role', 'admin')->delete();

        return redirect()->to('/admin/workers')
            ->with('message', 'Karyawan berhasil dihapus');
    }

    public function render() {
        $this->authorize('manage-worker');
        return view('livewire.worker-delete');
    }
}
