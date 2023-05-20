<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //* is ADMIN
        Gate::define('isAdmin', function ($user) {
            return $user->isAdmin == 1 || $user->isAdmin == 2;
        });
        //* is SUPER ADMIN
        Gate::define('isSuperAdmin', function ($user) {
            return $user->isAdmin == 2;
        });
        //
    }
}
