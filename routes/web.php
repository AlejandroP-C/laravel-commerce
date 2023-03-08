<?php

use App\Http\Controllers\CommerceController;
use App\Models\Commerce;
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

Route::get('/', function () {
    $commerces = Commerce::all();
    return view('welcome', ['commerces' => $commerces]);
});

Route::get('/category/{category}', [CommerceController::class, 'category'])->name('commerces.category');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
