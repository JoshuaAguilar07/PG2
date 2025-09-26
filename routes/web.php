<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EstadoInsumoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UbicacionController;
use App\Http\Controllers\UnidadMedidaController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Redirección de raíz al dashboard
    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    // Rutas de perfil (usuario logueado)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas de administración
    Route::prefix('admin')->group(function () {
        Route::resource('usuarios', UsuarioController::class)->names('usuarios');
        Route::resource('roles', RolController::class)->middleware('auth');
    });

    Route::prefix('gestion')->group(function () {
        Route::resource('unidades', UnidadMedidaController::class)->names('unidades_medida');
        Route::resource('estados', EstadoInsumoController::class)->names('estados_insumo');
        Route::resource('categorias', CategoriaController::class)->names('categorias');
        Route::resource('proveedores', ProveedorController::class)->names('proveedores');
        Route::resource('ubicaciones', UbicacionController::class)->names('ubicaciones');
    });
});

require __DIR__.'/auth.php';
