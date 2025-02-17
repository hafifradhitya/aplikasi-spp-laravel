<?php

use App\Http\Controllers\KompetensiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/beranda', [ProfileController::class, 'index'])->name('beranda');
 
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/kompetensi', [KompetensiController::class, 'index'])->name('kompetensi');
    Route::get('/kompetensi/create', [KompetensiController::class, 'create'])->name('kompetensi.create');
    Route::post('kompetensi', [KompetensiController::class, 'store'])->name('kompetensi.store');
    Route::put('/kompetensi/{id}', [KompetensiController::class, 'update'])->name('kompetensi.update');
    Route::delete('/kompetensi/{id}', [KompetensiController::class, 'destroy'])->name('kompetensi.destroy');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
