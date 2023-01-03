<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ElaborationController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SupplyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('documents', DocumentController::class)->names('documents');
    Route::resource('tables', TableController::class)->names('tables');
    Route::resource('products', ProductController::class)->names('products');
    Route::resource('categories', CategoryController::class)->names('categories');
    Route::resource('tags', TagController::class)->names('tags');
    Route::resource('elaborations', ElaborationController::class)->names('elaborations');
    Route::resource('clients', ClientController::class)->names('clients');
    Route::resource('orders', OrderController::class)->names('orders');
    Route::resource('suppliers', SupplierController::class)->names('suppliers');
    Route::resource('employees', EmployeeController::class)->names('employees');
    Route::resource('reservations', ReservationController::class)->names('reservations');
    Route::resource('supplies', SupplyController::class)->names('supplies');
    Route::get('orders/create/table/{id}', [OrderController::class, 'createT'])->name('orders.create.table');
    Route::get('reservations/buscarXDNI/{dni}', [ReservationController::class, 'buscarXDNI'])->name('reservations.buscarXDNI');
    Route::get('orders/create/products/{product}', [OrderController::class, 'buscarProduct'])->name('order.buscarProduct');
    Route::get('/supplies/{id}/elaboration', [SupplyController::class, 'getSupply'])->name('supplies.getSupply.elaboration');
    Route::get('/supplies/{id}/edit', [SupplyController::class, 'editSupply'])->name('supplies.editSupply');

});
//reservation.buscarXDNI
