<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class TransactionTable extends Component {
    use WithPagination;

    public $filter = [
        'status' => ''
    ];

    #[Title('Daftar Transaksi')]
    public function render() {
        $query = Transaction::query()
            ->whereNot('status', null)
            ->orderBy('created_at', 'desc')
            ->with('customer')
            ->with(['products' => function ($query) {
                $query->limit(1)->inRandomOrder();
            }])
            ->withCount('products');

        if ($this->filter['status']) {
            $query->where('status', $this->filter['status']);
        };

        return view('livewire.transaction-table', [
            'transactions' => $query->paginate()
        ]);
    }
}
