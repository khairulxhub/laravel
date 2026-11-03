<?php

use App\Http\Controllers\Admin\BuyerController;
use App\Http\Controllers\Admin\GarmentOrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource('admin/orders', GarmentOrderController::class);
Route::apiResource('buyers', BuyerController::class);