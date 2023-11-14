<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LicorController;
use App\Http\Controllers\LicorUserController;

/*
Route::get('/licor', [LicorController::class, 'index'])->name('licor.index');
Route::get('/licor/create', [LicorController::class, 'create'])->name('licor.create');
Route::post('/licor/store', [LicorController::class, 'store'])->name('licor.store');
Route::get('/licor/edit{licor}', [LicorController::class, 'edit'])->name('licor.edit');
Route::put('/licor/update/{licor}', [LicorController::class, 'update'])->name('licor.update');
Route::get('/licor/show{licor}', [LicorController::class, 'show'])->name('licor.show');
Route::delete('/licor/destroy{licor}', [LicorController::class, 'destroy'])->name('licor.destroy');
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/licor', LicorController::class);

Route::get('/user', [LicorUserController::class, 'index'])->name('user.index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
