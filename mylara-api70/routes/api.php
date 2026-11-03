<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::get('/user', [UserController::class, 'index']);
Route::apiResource('departments', DepartmentController::class);


route::post('/test', function () {
    return 'Lara API is working';
});