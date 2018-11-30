<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Entities\User;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin-action', function ($user) {
            //return $user->isAdmin();
            return true;
        });

        Passport::routes();
        //Passport::tokensExpireIn(Carbon::now()->addMinutes(30));
        //Passport::refreshTokensExpireIn(Carbon::now()->addDays(30));
        Passport::enableImplicitGrant();

        Passport::tokensCan([
            'manage-account' => 'Read your account data, if verified, and if admin, modify your account data. Cannot delete your account',
            'read-general' => 'Read general information',
        ]);
    }
}
