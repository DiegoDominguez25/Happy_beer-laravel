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



Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/user', [LicorUserController::class, 'index'])->name('user.index');
    Route::resource('/licor', LicorController::class);

    Route::get('/dashboard', function () {
        if (auth()->user()->hasRole('Admin')) {
            return redirect('/licor');
        } else {
            return redirect('/user');
        }
    })->name('dashboard');


});

Route::get('/', function () {
    return view('welcome');
});




