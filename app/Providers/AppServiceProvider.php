<?php

namespace App\Providers;

use App\Contracts\EmpleadoServiceInterface;
use App\Contracts\EventoServiceInterface;
use App\Contracts\TareaServiceInterface;
use App\Contracts\InsumoServiceInterface;
use App\Models\Insumo;
use App\Services\EventoService;
use App\Services\TareaService;
use App\Services\EmpleadoService;
use App\Services\InsumoService;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(EventoServiceInterface::class, EventoService::class);
        $this->app->bind(TareaServiceInterface::class, TareaService::class);
        $this->app->bind(EmpleadoServiceInterface::class, EmpleadoService::class);
        $this->app->bind(InsumoServiceInterface::class, InsumoService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
