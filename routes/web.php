<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LicorController;

Route::get('/licor', [LicorController::class, 'index'])->name('licor.index');
Route::get('/licor/create', [LicorController::class, 'create'])->name('licor.create');
Route::post('/licor/store', [LicorController::class, 'store'])->name('licor.store');
Route::get('/licor/edit{licor}', [LicorController::class, 'edit'])->name('licor.edit');