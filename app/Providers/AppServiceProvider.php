<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('dosen', function(User $user) {
            return $user->role->nama_role == 'Dosen';
        });
        Gate::define('mahasiswa', function(User $user) {
            return $user->role->nama_role == 'Mahasiswa';
        });
        Gate::define('paa', function(User $user) {
            return $user->role->nama_role == 'PAA';
        });
    }
}
