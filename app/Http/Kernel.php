<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{

    protected $middleware = [
        // Verifica si el sistema está en modo de mantenimiento
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        // Valida el tamaño máximo de las solicitudes POST
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        // Convierte cadenas vacías en valores null
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        // Maneja proxies confiables
        \App\Http\Middleware\TrustProxies::class,
    ];

    /**
     * Grupos de middleware de rutas.
     * Define conjuntos de middleware para diferentes tipos de solicitudes.
     */
    protected $middlewareGroups = [
        'web' => [
            // Middleware para cookies y sesiones
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // Comparte errores de validación con las vistas
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            // Verifica la validez de los tokens CSRF
            \App\Http\Middleware\VerifyCsrfToken::class,
            // Sustituye los enlaces de modelos en las rutas
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            // Límite de solicitudes para proteger la API
            'throttle:60,1',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];


    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class, // Middleware para autenticación
        'role' => \App\Http\Middleware\CheckRole::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class, // Verifica emails
    ];
}
