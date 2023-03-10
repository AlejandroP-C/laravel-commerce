<?php

use App\Http\Controllers\CommerceController;
use App\Http\Controllers\ProductController;
use App\Models\Commerce;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     $commerces = Commerce::all();
//     return view('welcome', ['commerces' => $commerces]);
// });

Route::get('/', [CommerceController::class, 'index'])->name('commerces.index');
Route::get('/category/{category}', [CommerceController::class, 'category'])->name('commerces.category');
Route::get('/commerce/{commerce}', [CommerceController::class, 'show'])->name('commerces.show');
Route::get('/product/{product}', [ProductController::class, 'detail'])->name('products.detail');
Route::post('/product/update/{product}', [ProductController::class, 'update'])->name('product.update');

Route::get('/register', function () {
    return view('auth.register');
});

Route::post('/',[RegisterController::class, 'register'])->name('register');;




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('welcome');
    })->name('dashboard');
});


