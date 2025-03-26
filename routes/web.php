<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\InsumoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas de Autenticación
require __DIR__.'/auth.php';

// Rutas de autenticación
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Rutas de registro y recuperación de contraseña
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::middleware('guest')->group(function () {
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});



// Rutas de Perfil de Usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas de Tareas
Route::middleware(['auth'])->group(function () {
    Route::get('/tareas', [TareaController::class, 'index'])->name('tareas.index');
    Route::get('/tareas/{id}', [TareaController::class, 'show'])->name('tareas.show');

    // Rutas exclusivas para Administradores
    Route::middleware(['can:admin-access'])->group(function () {
        Route::get('/tareas/create', [TareaController::class, 'create'])->name('tareas.create');
        Route::post('/tareas', [TareaController::class, 'store'])->name('tareas.store');
        Route::get('/tareas/{id}/edit', [TareaController::class, 'edit'])->name('tareas.edit');
        Route::put('/tareas/{id}', [TareaController::class, 'update'])->name('tareas.update');
        Route::delete('/tareas/{id}', [TareaController::class, 'destroy'])->name('tareas.destroy');
    });
});

// Rutas de Insumos
Route::middleware(['auth'])->group(function () {
    Route::get('/insumos', [InsumoController::class, 'index'])->name('insumos.index');
    Route::get('/insumos/{id}', [InsumoController::class, 'show'])->name('insumos.show');

    // Rutas exclusivas para el Administrador de Stock
    Route::middleware(['can:admin-stock-access'])->group(function () {
        Route::get('/insumos/create', [InsumoController::class, 'create'])->name('insumos.create');
        Route::post('/insumos', [InsumoController::class, 'store'])->name('insumos.store');
        Route::get('/insumos/{id}/edit', [InsumoController::class, 'edit'])->name('insumos.edit');
        Route::put('/insumos/{id}', [InsumoController::class, 'update'])->name('insumos.update');
        Route::delete('/insumos/{id}', [InsumoController::class, 'destroy'])->name('insumos.destroy');
        Route::post('/insumos/{insumoId}/evento/{eventoId}/asignar', [InsumoController::class, 'asignarInsumoAEvento'])->name('insumos.asignar');
    });
});

// Rutas de Empleados
Route::middleware(['auth'])->group(function () {
    Route::middleware(['can:admin-access'])->group(function () {
        Route::get('/empleados', [EmpleadoController::class, 'index'])->name('empleados.index');
        Route::get('/empleados/{id}', [EmpleadoController::class, 'show'])->name('empleados.show');
        Route::get('/empleados/create', [EmpleadoController::class, 'create'])->name('empleados.create');
        Route::post('/empleados', [EmpleadoController::class, 'store'])->name('empleados.store');
        Route::get('/empleados/{id}/edit', [EmpleadoController::class, 'edit'])->name('empleados.edit');
        Route::put('/empleados/{id}', [EmpleadoController::class, 'update'])->name('empleados.update');
        Route::delete('/empleados/{id}', [EmpleadoController::class, 'destroy'])->name('empleados.destroy');
        Route::post('/empleados/{id}/asignar-subrol', [EmpleadoController::class, 'asignarSubrol'])->name('empleados.asignarSubrol');
    });
});

// Rutas de Eventos
Route::middleware(['auth'])->group(function () {
    Route::get('/eventos', [EventoController::class, 'index'])->name('eventos.index');
    Route::get('/eventos/{id}', [EventoController::class, 'show'])->name('eventos.show');

    // Rutas exclusivas para Administradores y Administradores de Stock
    Route::middleware(['can:admin-or-stock-access'])->group(function () {
        Route::get('/eventos/create', [EventoController::class, 'create'])->name('eventos.create');
        Route::post('/eventos', [EventoController::class, 'store'])->name('eventos.store');
        Route::get('/eventos/{id}/edit', [EventoController::class, 'edit'])->name('eventos.edit');
        Route::put('/eventos/{id}', [EventoController::class, 'update'])->name('eventos.update');
        Route::delete('/eventos/{id}', [EventoController::class, 'destroy'])->name('eventos.destroy');
    });
});
use App\Http\Controllers\DashboardController;

Route::middleware(['auth'])->group(function () {
    // Dashboard para empleados
    Route::get('/dashboard/empleado', [DashboardController::class, 'empleado'])->name('dashboard.empleado');

    // Dashboard para administrador de stock
    Route::get('/dashboard/stock', [DashboardController::class, 'stock'])->name('dashboard.stock');

    // Dashboard para administrador general
    Route::get('/dashboard/admin', [DashboardController::class, 'admin'])->name('dashboard.admin');
});

