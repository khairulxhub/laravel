<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/', function () {
//     return view('layouts.single-page');
// });
// Route::get('/price', function () {
//     return view('pages.price');
// })->name('price');
Route::get('/price', [UserController::class, 'test'])->name('price');

Route::get('/plan', function () {
    return view('pages.compare-plan');
})->name('compare-plan');
Route::get('/login', function () {
    return view('pages.auth.login');
})->name('signin');

Route::get('/roles', [RoleController::class, 'index'])->name('role.index');
Route::get('/roles/create', [RoleController::class, 'create'])->name('roles-create');
Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles-edit');