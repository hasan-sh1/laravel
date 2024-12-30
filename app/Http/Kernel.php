<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array<string, class-string|string>
     */
    protected $routeMiddleware = [
        // ... other middleware
        'role' => \App\Http\Middleware\CheckRole::class,
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
    ];
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\AdminMiddleware::class . ':admin',
        ],
    ];
    protected $middlewareAliases = [
        // ... other middlewares ...
        'role' => \App\Http\Middleware\CheckRole::class,
    ];
} 