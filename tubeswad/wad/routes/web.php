<?php

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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/' , [\App\Http\Controllers\HomesController::class , 'index'])->name('home.index');
Route::get('/index', [\App\Http\Controllers\HomesController::class, 'home'])->name('home.home');
Route::get('/shop' , function () {
   return redirect()->route('home.home');
})->name('shop');
Route::get('/shopSearch' , [\App\Http\Controllers\HomesController::class , 'search'])->name('shop.search');
Route::get('/cart' , [\App\Http\Controllers\CartController::class , 'index'])->name('cart.index');
Route::get('/cartHapus/{id}', [\App\Http\Controllers\CartController::class, 'destroy'])->name('cart.hapus');
Route::post('/cardUpdate/{id}' , [\App\Http\Controllers\CartController::class, 'update'])->name('cart.update');

Route::post('/orderBarang/{total}' , [\App\Http\Controllers\OrderController::class , 'create'])->name('order.store');
Route::prefix('homes')->group(function () {

});

Route::post('addCart/{id}' , [\App\Http\Controllers\CartController::class, 'store'])->name('add.cart');

Route::prefix('admin')->group(function () {
    Route::get('/indexBarang' , [\App\Http\Controllers\BarangController::class , 'indexBarang'])->name('admin.indexBarang');
    Route::get('/barangSearch', [\App\Http\Controllers\BarangController::class , 'indexBarangSearch'])->name('admin.barangSearch');
   Route::get('/addBarang' , [\App\Http\Controllers\BarangController::class , 'index'])->name('admin.barang.index');
   Route::post('/addBarang', [\App\Http\Controllers\BarangController::class , 'store'])->name('admin.barang.store');
   Route::get('/editBarang/{id}', [\App\Http\Controllers\BarangController::class, 'edit'])->name('admin.barang.edit');
    Route::post('/editBarang/{id}', [\App\Http\Controllers\BarangController::class, 'update'])->name('admin.barang.edit');
    Route::get('/deleteBarang/{id}', [\App\Http\Controllers\BarangController::class , 'destroy'])->name('admin.barang.delete');

    Route::get('/order' , [\App\Http\Controllers\OrderController::class , 'adminOrder'])->name('admin.order');
    Route::get('/selesai/{id}' , [ \App\Http\Controllers\OrderController::class , 'selesai'])->name('admin.selesai');
    Route::post('/{id}/resi' , [\App\Http\Controllers\OrderController::class , 'resi'])->name('admin.order.resi');
});

Route::get('/order' , [\App\Http\Controllers\OrderController::class , 'index'])->name('order.index');
Route::get('/diterima/{id}' , [ \App\Http\Controllers\OrderController::class , 'terima'])->name('order.terima');


