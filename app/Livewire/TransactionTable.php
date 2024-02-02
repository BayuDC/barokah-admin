<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class TransactionTable extends Component {
    use WithPagination;

    #[Title('Daftar Transaksi')]
    public function render() {
        return view('livewire.transaction-table', [
            'transactions' => Transaction::query()
                ->orderBy('created_at', 'desc')
                ->with('customer')
                ->with(['products' => function ($query) {
                    $query->limit(1)->inRandomOrder();
                }])
                ->withCount('products')
                ->paginate()
        ]);
    }
}
