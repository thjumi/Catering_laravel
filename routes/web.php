<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;


// Rutas de eventos
Route::prefix('eventos')->group(function () {

    // Rutas accesibles para todos los roles
    Route::get('/', [EventoController::class, 'index'])->name('eventos.index'); // Listar eventos
    Route::get('/{id}', [EventoController::class, 'show'])->name('eventos.show'); // Mostrar evento específico

    // Rutas exclusivamente para el administrador
    Route::middleware('role:administrador')->group(function () {
        Route::post('/', [EventoController::class, 'store'])->name('eventos.store'); // Crear evento
        Route::put('/{id}', [EventoController::class, 'update'])->name('eventos.update'); // Actualizar evento
        Route::delete('/{id}', [EventoController::class, 'destroy'])->name('eventos.destroy'); // Eliminar evento
    });
});



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
