<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Organization;
use App\Models\Team;
use App\Models\Tournament;
use App\Models\Player;
use App\Policies\OrganizationPolicy;
use App\Policies\TeamPolicy;
use App\Policies\TournamentPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Organization::class => OrganizationPolicy::class,
        Team::class => TeamPolicy::class,
        Tournament::class => TournamentPolicy::class,
    ];
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
