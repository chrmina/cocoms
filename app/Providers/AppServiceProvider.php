<?php

namespace App\Providers;

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
        $this->registerPolicies();

        Gate::define('admin', function (\App\Models\User $user) {
            return $user->active && $user->role === 'admin';
        });

        Gate::define('editor', function (\App\Models\User $user) {
            return $user->active && in_array($user->role, ['editor', 'admin']);
        });

        Gate::define('user', function (\App\Models\User $user) {
            return $user->active;
        });
    }

    private function registerPolicies(): void
    {
        \Illuminate\Support\Facades\Gate::policy(
            \App\Models\Letter::class,
            \App\Policies\LetterPolicy::class
        );
    }
}
