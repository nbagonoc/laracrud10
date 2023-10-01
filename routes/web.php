<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::get('/product/read/{product}', [ProductController::class, 'read'])->name('product.read');
Route::post('/product', [ProductController::class, 'save'])->name('product.save');
Route::get('/product/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/update/{product}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/delete/{product}', [ProductController::class, 'delete'])->name('product.delete');