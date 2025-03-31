<?php

use App\Http\Controllers\{
    ProfileController,
    EventoController,
    EmpleadoController,
    TareaController,
    InsumoController,
    Auth\AuthenticatedSessionController,
    Auth\PasswordResetLinkController,
    Auth\NewPasswordController,
    Auth\RegisteredUserController,
    DashboardController,
    AdminController
};
use App\Http\Middleware\Role;
use Illuminate\Support\Facades\Route;

// Página de bienvenida
Route::get('/', fn() => view('welcome'));

// Rutas de autenticación
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::middleware('guest')->group(function () {
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});

// Ruta para obtener tareas por fecha (ejemplo para empleados)
Route::get('/empleado/{fecha}', [DashboardController::class, 'obtenerTareasFecha']);

Route::middleware('auth')->group(function () {
    // Rutas de perfil
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Rutas de dashboards
    Route::prefix('dashboard')->group(function () {
        Route::get('/empleado', [DashboardController::class, 'empleado'])->name('dashboard.empleado');
        Route::get('/stock', [DashboardController::class, 'stock'])->name('dashboard.stock');
        Route::get('/admin', [DashboardController::class, 'admin'])->name('dashboard.admin');
    });

    // Rutas de tareas
    Route::prefix('tareas')->group(function () {
        Route::get('/', [TareaController::class, 'index'])->name('tareas.index');
        
        // Rutas específicas primero para evitar conflictos con dinámicas
        Route::middleware([Role::class . ':administrador'])->group(function () {
            Route::get('/create', [TareaController::class, 'create'])->name('tareas.create');
            Route::post('/', [TareaController::class, 'store'])->name('tareas.store');
            Route::get('/{id}/edit', [TareaController::class, 'edit'])->name('tareas.edit');
            Route::put('/{id}', [TareaController::class, 'update'])->name('tareas.update');
            Route::delete('/{id}', [TareaController::class, 'destroy'])->name('tareas.destroy');
        });

        // Ruta dinámica al final
        Route::get('/{id}', [TareaController::class, 'show'])->name('tareas.show');
    });

    // Rutas de empleados (solo administradores)
    Route::prefix('empleados')->group(function () {
        Route::middleware([Role::class . ':administrador'])->group(function () {
            Route::get('/create', [EmpleadoController::class, 'create'])->name('empleados.create');
            Route::post('/', [EmpleadoController::class, 'store'])->name('empleados.store');
            Route::get('/{id}/edit', [EmpleadoController::class, 'edit'])->name('empleados.edit');
            Route::put('/{id}', [EmpleadoController::class, 'update'])->name('empleados.update');
            Route::delete('/{id}', [EmpleadoController::class, 'destroy'])->name('empleados.destroy');
        });

        // Rutas públicas: listado y detalle
        Route::get('/', [EmpleadoController::class, 'index'])->name('empleados.index');
        Route::get('/{id}', [EmpleadoController::class, 'show'])->name('empleados.show');
    });

    // Rutas de eventos
    Route::prefix('eventos')->group(function () {
        Route::middleware([Role::class . ':administrador, administrador Stock'])->group(function () {
            Route::get('/create', [EventoController::class, 'create'])->name('eventos.create');
            Route::post('/', [EventoController::class, 'store'])->name('eventos.store');
            Route::get('/{id}/edit', [EventoController::class, 'edit'])->name('eventos.edit');
            Route::put('/{id}', [EventoController::class, 'update'])->name('eventos.update');
            Route::delete('/{id}', [EventoController::class, 'destroy'])->name('eventos.destroy');
        });

        // Rutas públicas: listado y detalle
        Route::get('/', [EventoController::class, 'index'])->name('eventos.index');
        Route::get('/{id}', [EventoController::class, 'show'])->name('eventos.show');
    });

    // Rutas de insumos
    Route::prefix('insumos')->group(function () {
        Route::middleware([Role::class . ':administrador'])->group(function () {
            Route::get('/', [InsumoController::class, 'index'])->name('insumos.index');
        });

        Route::middleware([Role::class . ':administrador Stock'])->group(function () {
            Route::get('/create', [InsumoController::class, 'create'])->name('insumos.create');
            Route::post('/', [InsumoController::class, 'store'])->name('insumos.store');
            Route::get('/{id}/edit', [InsumoController::class, 'edit'])->name('insumos.edit');
            Route::put('/{id}', [InsumoController::class, 'update'])->name('insumos.update');
            Route::delete('/{id}', [InsumoController::class, 'destroy'])->name('insumos.destroy');
        });
    });
});
