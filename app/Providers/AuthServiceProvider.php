<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Transaction;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider {
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void {
        Gate::define('manage-product', function (User $user) {
            return $user->role == 'admin';
        });
        Gate::define('manage-category', function (User $user) {
            return $user->role == 'admin';
        });
        Gate::define('manage-worker', function (User $user) {
            return $user->role == 'admin';
        });
        Gate::define('manage-stock', function (User $user) {
            return $user->role == 'worker';
        });
        Gate::define('manage-transaction', function (User $user) {
            return $user->role == 'worker';
        });
        Gate::define('own-transaction', function (User $user, Transaction $transaction) {
            return $user->id == $transaction->user_id && $transaction->status != null;
        });
    }
}
