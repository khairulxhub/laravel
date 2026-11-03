<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GarmentOrderController;

Route::view('/', 'welcome')->name('home');

Route::view('/index', 'admin.master')->name('admin.dashboard');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::resource('/admin/orders', GarmentOrderController::class);
