<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class UserTable extends Component {
    use WithPagination;

    public $query = '';

    #[Title("Daftar Pengguna")]
    public function render() {
        $userQuery = User::query();
        $userQuery->where('name', 'like', '%' . $this->query . '%');

        return view('livewire.user-table', [
            'users' => $userQuery->paginate()
        ]);
    }

    public function search() {
        $this->resetPage();
    }
}
