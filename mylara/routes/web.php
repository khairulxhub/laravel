<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\site\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product-details/{id}', [HomeController::class, 'details'])->name('product.details');
Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
Route::resource('/orders', OrderController::class);

Route::get('/dashboard', function () {
    return view('admin.pages.dashboard');
})->middleware(['auth', 'verified', 'role_id:1,2,3,4'])->name('dashboard');

    Route::middleware('auth')->group(function () {
    Route::resources(['users' => UserController::class]);
   
  Route::get('/roles/search', [RoleController::class, 'search'])->name('roles.search');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware( 'auth', 'role_id:1,2,3')->group(function () {
 Route::resources(['products' => ProductController::class]);
  Route::resources(['roles' => RoleController::class]);




});
require __DIR__.'/auth.php';
require __DIR__.'/payment-web.php';
