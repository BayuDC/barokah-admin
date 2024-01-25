<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class WorkerTable extends Component {
    use WithPagination;

    public $query = '';

    public function mount() {
        $this->authorize('manage-worker');
    }

    #[Title('Daftar Pekerja')]
    public function render() {
        $userQuery = User::query();
        $userQuery->where('name', 'like', '%' . $this->query . '%');
        $userQuery->whereNot('role', 'user');

        return view('livewire.worker-table', [
            'users' => $userQuery->paginate()
        ]);
    }

    public function search() {
        $this->resetPage();
    }
}
