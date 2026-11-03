<?php

use Illuminate\Support\Facades\Route;

// ================================
// Admin Controllers
// ================================

use App\Http\Controllers\Admin\BuyerController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\StyleController;
use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\Admin\GarmentOrderController;
use App\Http\Controllers\Admin\PurchaseOrderController;
use App\Http\Controllers\Admin\StockMovementController;
use App\Http\Controllers\Admin\ProductionController;
use App\Http\Controllers\Admin\ShipmentController;
use App\Http\Controllers\Admin\UserController;


// ================================
// HOME
// ================================

Route::view('/', 'welcome')->name('home');


// ================================
// DASHBOARD
// ================================

Route::view('/index', 'admin.master')
    ->name('admin.dashboard');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');


// ======================================================
// MERCHANDISING
// ======================================================


// Buyers
Route::resource('/admin/buyers', BuyerController::class)
    ->names('buyers');


// Styles
Route::resource('/admin/styles', StyleController::class)
    ->names('styles');


// ======================================================
// ORDERS
// ======================================================

// PDF Preview
Route::get(
    '/admin/orders/{id}/pdf/preview',
    [GarmentOrderController::class, 'pdfPreview']
)->name('orders.pdf.preview');


// PDF Download
Route::get(
    '/admin/orders/{id}/pdf/download',
    [GarmentOrderController::class, 'pdfDownload']
)->name('orders.pdf.download');


// Orders CRUD
Route::resource('/admin/orders', GarmentOrderController::class);


// ======================================================
// PROCUREMENT
// ======================================================


// Suppliers
Route::resource('/admin/suppliers', SupplierController::class)
    ->names('suppliers');


// Purchase Orders
Route::resource('/admin/purchase-orders', PurchaseOrderController::class)
    ->names('purchase-orders');


// ======================================================
// INVENTORY
// ======================================================


// Materials
Route::resource('/admin/materials', MaterialController::class)
    ->names('materials');


// Stock Movements
Route::resource('/admin/stock-movements', StockMovementController::class)
    ->names('stock-movements');


// ======================================================
// PRODUCTION
// ======================================================


// Productions
Route::resource('/admin/productions', ProductionController::class)
    ->names('productions');


// ======================================================
// SHIPPING
// ======================================================


// Shipments
Route::resource('/admin/shipments', ShipmentController::class)
    ->names('shipments');


// ======================================================
// ADMINISTRATION
// ======================================================


// Users
Route::resource('/admin/users', UserController::class)
    ->names('users');