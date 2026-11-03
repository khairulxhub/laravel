<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.layouts.master');
});
Route::get('/', function () {
    return view('admin.layouts.single-master');
});
Route::get('/dashboard', function () {
    return view('admin.pages.dashboard');
});
Route::get('/login', function () {
    return view('admin.pages.auth.login');
});
