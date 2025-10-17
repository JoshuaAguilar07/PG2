<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EstadoInsumoController;
use App\Http\Controllers\InsumoController;
use App\Http\Controllers\LoteController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\TipoMovimientoController;
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
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas de administración
    Route::prefix('admin')->group(function () {
        Route::resource('usuarios', UsuarioController::class)->names('usuarios');
        Route::resource('roles', RolController::class)->middleware('auth');
    });

    Route::prefix('gestion')->group(function () {
        Route::resource('insumos', InsumoController::class)->names('insumos')->parameters(['insumos' => 'insumo']);
        Route::resource('tipos_movimiento', TipoMovimientoController::class)->names('tipos_movimiento')->parameters(['tipos_movimiento' => 'tipo_movimiento']);
        Route::resource('unidades', UnidadMedidaController::class)->names('unidades')->parameters(['unidades' => 'unidad']);
        Route::resource('estados', EstadoInsumoController::class)->names('estados')->parameters(['estados' => 'estado']);
        Route::resource('categorias', CategoriaController::class)->names('categorias')->parameters(['categorias' => 'categoria']);
        Route::resource('proveedores', ProveedorController::class)->names('proveedores')->parameters(['proveedores' => 'proveedor']);
        Route::resource('ubicaciones', UbicacionController::class)->names('ubicaciones')->parameters(['ubicaciones' => 'ubicacion']);
        Route::get('movimientos/historial', [MovimientoController::class, 'historial'])->name('movimientos.historial');
        Route::get('/movimientos/reporte/pdf', [MovimientoController::class, 'generarPDF'])->name('movimientos.pdf');
        Route::resource('movimientos', MovimientoController::class)->names('movimientos')->parameters(['movimientos' => 'movimiento']);
        Route::resource('lotes', LoteController::class)->names('lotes')->parameters(['lotes' => 'lote']);
    });
});

require __DIR__.'/auth.php';
