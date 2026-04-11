<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate; // <-- Wajib ditambahkan
use App\Models\User; // <-- Wajib ditambahkan

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Mendefinisikan Gate 'export-product'
        Gate::define('export-product', function (User $user) {
            return $user->role === 'admin';
        });
    }
}