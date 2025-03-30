<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\InsumoController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// Página de bienvenida
Route::get('/', fn() => view('welcome'));

// Rutas de autenticación (puedes mantenerlas en auth.php si ya las tienes definidas)
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

Route::get('/empleado/{fecha}', [DashboardController::class, 'obtenerTareasFecha']);

// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {

    // Rutas de perfil
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Dashboard
    Route::prefix('dashboard')->group(function () {
        Route::get('/empleado', [DashboardController::class, 'empleado'])->name('dashboard.empleado');
        Route::get('/stock', [DashboardController::class, 'stock'])->name('dashboard.stock');
        Route::get('/admin', [DashboardController::class, 'admin'])->name('dashboard.admin');
    });

    // Rutas de tareas
    Route::prefix('tareas')->group(function () {
        Route::get('/', [TareaController::class, 'index'])->name('tareas.index');
        Route::get('/{id}', [TareaController::class, 'show'])->name('tareas.show');

        Route::middleware('can:admin-access')->group(function () {
            Route::get('/create', [TareaController::class, 'create'])->name('tareas.create');
            Route::post('/', [TareaController::class, 'store'])->name('tareas.store');
            Route::get('/{id}/edit', [TareaController::class, 'edit'])->name('tareas.edit');
            Route::put('/{id}', [TareaController::class, 'update'])->name('tareas.update');
            Route::delete('/{id}', [TareaController::class, 'destroy'])->name('tareas.destroy');
        });
    });

    // Rutas de insumos
    Route::prefix('insumos')->group(function () {
        Route::get('/', [InsumoController::class, 'index'])->name('insumos.index');
        Route::get('/{id}', [InsumoController::class, 'show'])->name('insumos.show');

        Route::middleware('can:admin-stock-access')->group(function () {
            Route::get('/create', [InsumoController::class, 'create'])->name('insumos.create');
            Route::post('/', [InsumoController::class, 'store'])->name('insumos.store');
            Route::get('/{id}/edit', [InsumoController::class, 'edit'])->name('insumos.edit');
            Route::put('/{id}', [InsumoController::class, 'update'])->name('insumos.update');
            Route::delete('/{id}', [InsumoController::class, 'destroy'])->name('insumos.destroy');
            Route::post('/{insumoId}/evento/{eventoId}/asignar', [InsumoController::class, 'asignarInsumoAEvento'])->name('insumos.asignar');
        });
    });

    // Rutas de empleados (gestionados a través de User)
    Route::prefix('empleados')->middleware('can:admin-access')->group(function () {
        Route::get('/', [EmpleadoController::class, 'index'])->name('empleados.index');
        Route::get('/{id}', [EmpleadoController::class, 'show'])->name('empleados.show');
        Route::get('/create', [EmpleadoController::class, 'create'])->name('empleados.create');
        Route::post('/', [EmpleadoController::class, 'store'])->name('empleados.store');
        Route::get('/{id}/edit', [EmpleadoController::class, 'edit'])->name('empleados.edit');
        Route::put('/{id}', [EmpleadoController::class, 'update'])->name('empleados.update');
        Route::delete('/{id}', [EmpleadoController::class, 'destroy'])->name('empleados.destroy');
        Route::post('/{id}/asignar-subrol', [EmpleadoController::class, 'asignarSubrol'])->name('empleados.asignarSubrol');
    });

    // Rutas de eventos
    Route::prefix('eventos')->group(function () {
        Route::get('/', [EventoController::class, 'index'])->name('eventos.index');
        Route::get('/{id}', [EventoController::class, 'show'])->name('eventos.show');

        Route::middleware('can:admin-or-stock-access')->group(function () {
            Route::get('/create', [EventoController::class, 'create'])->name('eventos.create');
            Route::post('/', [EventoController::class, 'store'])->name('eventos.store');
            Route::get('/{id}/edit', [EventoController::class, 'edit'])->name('eventos.edit');
            Route::put('/{id}', [EventoController::class, 'update'])->name('eventos.update');
            Route::delete('/{id}', [EventoController::class, 'destroy'])->name('eventos.destroy');
        });
    });

    // Ruta de AdminController (acceso protegido, según convenga)
    Route::middleware('can:admin-access')->group(function () {
        Route::get('/admin/eventos', [AdminController::class, 'eventos'])->name('admin.eventos.index');
    });
});

