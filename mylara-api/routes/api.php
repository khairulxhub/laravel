<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
 Route::apiResources(['users' => UserController::class]);
 Route::apiResources(['roles' => RoleController::class]);
 Route::apiResources(['categories' => CategoryController::class]);
 Route::apiResources(['brands' => BrandController::class]);

 Route::post('/login', [AuthController::class, 'login']);
 Route::post('/register', [AuthController::class, 'register']);
 Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
 Route::post('/check-token', [AuthController::class, 'checkToken']);

 // Products API
 Route::get('/products/filters', [ProductController::class, 'filters']);

 Route::apiResource('products', ProductController::class)
     ->names('api.products');
    //  ->middlewareFor(['store', 'update', 'destroy'], 'auth:sanctum');