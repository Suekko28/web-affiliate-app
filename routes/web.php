<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagProductController;
use App\Http\Controllers\UserLandingController;
use App\Http\Controllers\UserMixMaxContorller;
use App\Http\Controllers\UserNewsController;
use App\Http\Controllers\UserProductController;
use Illuminate\Support\Facades\Route;


Route::resource('/', UserLandingController::class);
Route::resource('/product-list', UserProductController::class);
Route::resource('/mix&max-list', UserMixMaxContorller::class);
Route::resource('/news-list', UserNewsController::class);
Route::get('/news-show/{slug}', [UserNewsController::class, 'show'])->name('news-show.show');



Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/news', NewsController::class);
    Route::post('/upload', [NewsController::class, 'upload'])->name('ckeditor.upload');

    // Route Tag Product
    Route::resource('/product', controller: TagProductController::class);
    Route::post('/product/{id}/update', [TagProductController::class, 'update']);

    // Route Product Kategori
    Route::get('/product/{id}/create', [ProductController::class, 'create'])->name('form-product.create');
    Route::get('/product/{id}/edit/{tagProductId}', [ProductController::class, 'edit'])->name('form-product.edit');
    Route::put('/product/{id}/edit/{tagProductId}', [ProductController::class, 'update'])->name('form-product.update');
    Route::post('/product/{id}/store', [ProductController::class, 'store'])->name('form-product.store');

    // Route Product List
    Route::post('/product/{id}/store-product-list', [ProductController::class, 'storeProduct'])->name('product-list.store');
    Route::put('/product/{id}/update-product-list', [ProductController::class, 'updateProduct'])->name('product-list.update');
    Route::delete('product/{id}/{type}/delete', [ProductController::class, 'destroy'])->name('product.delete');

});
