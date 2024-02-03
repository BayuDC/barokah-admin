<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class TransactionDetail extends Component {
    public ?Transaction $transaction;

    public $customer = '';
    public $address = '';
    public $price = '';

    public function load($id) {
        $transaction = Transaction::query()->with('customer')->with('products')->find($id);
        $this->transaction = $transaction;
        $this->customer = $transaction?->customer->name ?? '';
        $this->address = $transaction?->customer->address ?? '';
        $this->price = 'Rp' . $transaction?->final_price ?? '';
    }

    public function send() {
        $this->authorize('manage-transaction');
        $this->transaction->status = 'confirmed';
        $this->transaction->save();
    }

    public function render() {
        return view('livewire.transaction-detail');
    }
}
