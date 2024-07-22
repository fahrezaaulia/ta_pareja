<?php

namespace App\Providers;

use App\Models\Role;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define("pemilik", function ($user) {
            if (empty($user->getAkses)) {
                return redirect("/logout");
            } else {
                return $user->getAkses->id == Role::PEMILIK;
            }
        });
        Gate::define("tamu", function ($user) {
            if (empty($user->getAkses)) {
                return redirect("/logout");
            } else {
                return $user->getAkses->id == Role::TAMU;
            }
        });
    }
}
