<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProductController;

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create')->middleware('auth');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store')->middleware('auth');
Route::get('/product/index', [ProductController::class, 'index'])->name('product.index');