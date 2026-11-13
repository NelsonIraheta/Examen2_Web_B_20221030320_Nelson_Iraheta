<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\InsumoController;
use App\Http\Controllers\ProveedorController;
use Illuminate\Support\Facades\Route;

/* Route::resource('insumos', InsumosController::class);
Route::get('/', function () {
    return redirect()->route('insumos.index');
}); */

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/', fn () => redirect()->route('dashboard'));
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('insumos', InsumoController::class)->except('show');

    // Importante: "proveedores" se singulariza mal ("proveedore"), por eso se fuerza el nombre del parámetro
    Route::resource('proveedores', ProveedorController::class)
        ->parameters(['proveedores' => 'proveedor'])
        ->except('show');

    Route::resource('empleados', EmpleadoController::class)->except('show');
});