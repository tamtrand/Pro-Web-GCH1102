<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
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
//     return view('homepage');
// });

Route::get('/', [HomeController::class,'index']);

// Route::get('/homepage', [HomeController::class, 'index']);
Route::get('/products', [ProductController::class, 'index']);

Route::get('/admin', function () {
    return view('admin.index');
});
Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('admin', [AdminController::class, 'store'])->name('admin.store');
Route::get('admin/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
Route::put('admin/{id}', [AdminController::class, 'update'])->name('admin.update');
Route::delete('admin/{id}', [AdminController::class, 'destroy'])->name('admin.delete');





Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/shirts', 'App\Http\Controllers\ProductController@showShirts');
Route::get('/pants', 'App\Http\Controllers\ProductController@showPants');
Route::get('/accessories', 'App\Http\Controllers\ProductController@showAccessories');
Route::get('/shoes', 'App\Http\Controllers\ProductController@showShoes');




Route::get('cart',[CartController::class, 'index']);
Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::post('cart', [CartController::class, 'store'])->name('cart.store');
Route::delete('cart/{id}', [CartController::class, 'destroy'])->name('cart.delete');
Route::post('cart/{id}', [CartController::class, 'edit'])->name('cart.edit');
Route::post('clear', [CartController::class, 'clear'])->name('cart.clear');