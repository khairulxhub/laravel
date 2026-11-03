<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.layouts.master');
});

Route::get('/dashboard', function () {
    return view('admin.pages.dashboard');
})->name('dashboard');

// Route::get('/users', [UserController::class, 'index'])->name('users.index');
// Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
// Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
// Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
// Route::post('/users', [UserController::class, 'store'])->name('users.store');
// Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
// Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

Route::resource('users', UserController::class);
Route::resource('products', ProductController::class);

// Auth
Route::get('/login', function () {
    return view('admin.pages.auth.login');
});

