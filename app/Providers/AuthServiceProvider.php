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

        /* define a super admin user role */
       Gate::define('isSuperAdmin', function($user) {
        return $user->role == 'superadmin';
     });

     /* define a admin role */
     Gate::define('isAdmin', function($user) {
         return $user->role == 'admin';
     });

     /* define a user role */
     Gate::define('isMahasiswa', function($user) {
         return $user->role == 'mahasiswa';
     });
    }
}
