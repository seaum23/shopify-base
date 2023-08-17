<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DbController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('insert', [DbController::class, 'insert']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/home', [HomeController::class, 'index'])->name('home.index')->middleware('shopify.merchant');
Route::get('/product', [ProductController::class, 'index'])->name('product.index')->middleware('shopify.merchant');
Route::post('/product', [ProductController::class, 'store'])->name('product.store')->middleware('shopify.merchant');
Route::get('/product/{product_id}', [ProductController::class, 'show'])->name('product.show')->middleware('shopify.merchant');