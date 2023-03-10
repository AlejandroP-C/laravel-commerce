<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommerceController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\Admin\UserController;

Route::get('', [HomeController::class, 'index'])->name('admin.home');
Route::resource('users', UserController::class)->names('admin.users');
Route::resource('categories', CategoryController::class)->names('admin.categories');
Route::resource('commerces', CommerceController::class)->names('admin.commerces');
Route::resource('products', ProductController::class)->names('admin.products');
Route::resource('roles', RoleController::class)->names('admin.roles');