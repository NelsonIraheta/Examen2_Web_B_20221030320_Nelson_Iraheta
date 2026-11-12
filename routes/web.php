<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\InsumosController;
Route::resource('insumos', InsumosController::class);
Route::get('/', function () {
    return redirect()->route('insumos.index');
});