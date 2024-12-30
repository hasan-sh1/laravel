<?php

namespace App\Providers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Access\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\ItemExchange;
use App\Policies\ItemExchangePolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<string, class-string|string>
     */
    protected $policies = [
        ItemExchange::class => ItemExchangePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(Gate $gate)
    {
        //
    }
} 