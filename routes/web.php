<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;


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

Route::get('/', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/Admin/dashboard', [AdminController::class, 'index'])->name('index');

    Route::get('product/index', [AdminController::class,'indexProduct'])->name('indexProduct');
    Route::get('product/create', [AdminController::class,'createProduct'])->name('createProduct');
    Route::post('product/store', [AdminController::class,'storeProduct'])->name('storeProduct');
    Route::get('product/edit/{id}', [AdminController::class,'editProduct'])->name('editProduct');
    Route::put('product/update/{id}', [AdminController::class,'updateProduct'])->name('updateProduct');
    Route::delete('product/delete/{id}', [AdminController::class,'deleteProduct'])->name('deleteProduct');

    Route::get('sale/index', [AdminController::class,'indexSale'])->name('indexSale');
    Route::get('sale/create', [AdminController::class,'createSale'])->name('createSale');
    Route::post('sale/store', [AdminController::class,'storeSale'])->name('storeSale');
    Route::get('sale/detail/{id}', [AdminController::class,'detailSale'])->name('detailSale');
});
