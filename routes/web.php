<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\InsumoController;
use Illuminate\Support\Facades\Route;

// Rutas de empleados (solo para administradores)
Route::middleware(['auth:sanctum', 'role:administrador'])->group(function () {
    Route::get('/empleados', [EmpleadoController::class, 'index']);
    Route::get('/empleados/{id}', [EmpleadoController::class, 'show']);
    Route::post('/empleados', [EmpleadoController::class, 'store']);
    Route::put('/empleados/{id}', [EmpleadoController::class, 'update']);
    Route::delete('/empleados/{id}', [EmpleadoController::class, 'destroy']);
    Route::post('/empleados/{id}/subrol', [EmpleadoController::class, 'asignarSubrol']);
});

// Rutas de insumos
Route::prefix('insumos')->middleware('auth:sanctum')->group(function () {
    // CRUD completo solo para el administrador de stock
    Route::middleware('role:administrador stock')->group(function () {
        Route::post('/', [InsumoController::class, 'store']);
        Route::put('/{id}', [InsumoController::class, 'update']);
        Route::delete('/{id}', [InsumoController::class, 'destroy']);
    });

    // Visualización solo para administradores
    Route::middleware('role:administrador')->group(function () {
        Route::get('/', [InsumoController::class, 'index']);
        Route::get('/{id}', [InsumoController::class, 'show']);
    });
});

// Rutas de tareas
Route::prefix('tareas')->middleware('auth:sanctum')->group(function () {
    // CRUD completo solo para el administrador
    Route::middleware('role:administrador')->group(function () {
        Route::post('/', [TareaController::class, 'store']);
        Route::put('/{id}', [TareaController::class, 'update']);
        Route::delete('/{id}', [TareaController::class, 'destroy']);
    });

    // Visualización solo para empleados
    Route::middleware('role:empleado')->group(function () {
        Route::get('/', [TareaController::class, 'index']);
        Route::get('/{id}', [TareaController::class, 'show']);
    });
});

// Rutas de eventos
Route::prefix('eventos')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        // Lista de eventos disponible para administrador de stock y administrador
        Route::middleware('role:administrador stock|administrador')->group(function () {
            Route::get('/', [EventoController::class, 'index'])->name('eventos.index'); // Listar eventos
        });

        // Visualización solo para empleados
        Route::middleware('role:empleado')->group(function () {
            Route::get('/{id}', [EventoController::class, 'show'])->name('eventos.show'); // Ver evento específico
        });

        // CRUD completo solo para el administrador
        Route::middleware('role:administrador')->group(function () {
            Route::post('/', [EventoController::class, 'store'])->name('eventos.store'); // Crear evento
            Route::put('/{id}', [EventoController::class, 'update'])->name('eventos.update'); // Actualizar evento
            Route::delete('/{id}', [EventoController::class, 'destroy'])->name('eventos.destroy'); // Eliminar evento
        });
    });
});

// Página principal y dashboard
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas de perfil de usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Autenticación
require __DIR__.'/auth.php';
