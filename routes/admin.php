<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommerceController;
use App\Http\Controllers\Admin\ProductController;

Route::get('', [HomeController::class, 'index'])->name('admin.home');
Route::resource('categories', CategoryController::class)->names('admin.categories');
Route::resource('commerces', CommerceController::class)->names('admin.commerces');
Route::resource('products', ProductController::class)->names('admin.products');