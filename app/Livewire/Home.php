<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\User;
use App\Models\Transaction;
use Livewire\Attributes\Title;
use Livewire\Component;
use Carbon\Carbon;

class Home extends Component {
    #[Title('Beranda')]
    public function render() {
        Carbon::setLocale('id');

        $today = Carbon::today();

        $days = [];
        $incomes = [];
        for ($i = 7; $i >= 0; $i--) {
            $day = Carbon::today()->subDays($i);
            array_push($days, "{$day->dayName}, {$day->toDateString()}");
            array_push($incomes, Transaction::whereDate('created_at', $day)->sum('final_price'));
        }


        return view('livewire.home', [
            'productsCount' => Product::query()->count(),
            'customersCount' => User::query()->where('role', 'user')->count(),
            'todayTransantionCount' => Transaction::whereDate('created_at', $today)->count(),
            'todayTransantionIncome' => Transaction::whereDate('created_at', $today)->sum('final_price'),
            'chart' => [
                'labels' => $days,
                'incomes' => $incomes,
            ]
        ]);
    }
}
