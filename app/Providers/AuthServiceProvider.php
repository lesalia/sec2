<?php

namespace App\Providers;

use App\Models\Doc;
use App\Policies\DocPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Doc::class => DocPolicy::class,
    ];
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('update-doc', function ($user, $doc) {
            return $user->nivel > 1;
        });

        Gate::define('criar-user', function ($user) {
            return $user->nivel > 1;
        });

        Gate::define('recepcionista', function ($user) {
            return $user->nivel == 0 || $user->nivel > 1;
        });

        Gate::define('seguranca', function ($user) {
            return $user->nivel >= 1;
        });

        Gate::define('meus-docs', function ($user) {
            return $user->id == Auth::user()->id;
        });
    }
}
