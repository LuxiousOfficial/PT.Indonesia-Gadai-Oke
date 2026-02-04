<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        Gate::define('checking', function(User $user) {
            return $user->admin;
            return $user->project_manager;
        });
        
        Gate::define('access', function(User $user) {
            return $user->member;
            return $user->project_manager;
        });

        Gate::define('member', function(User $user) {
            return $user->member;
        });

        Gate::define('admin', function(User $user) {
            return $user->admin;
        });
        
        Gate::define('manager', function(User $user) {
            return $user->project_manager;
        });
    }
}
