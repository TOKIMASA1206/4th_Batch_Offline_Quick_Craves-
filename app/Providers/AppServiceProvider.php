<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
        //

        Gate::define('admin', function ($user) {
            return $user->role === "admin";
        });

         // Bootstrapのデザインを使う
         Paginator::useBootstrap();
         
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

    }
}
