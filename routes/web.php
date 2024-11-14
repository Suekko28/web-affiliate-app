<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagProductController;
use App\Http\Controllers\UserLandingController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('user-landing.index');
// });

// Route::get('/product-list', function () {
//     return view('user-product.index');
// });
// Route::get('/mix&max-list', function () {
//     return view('user-mixmax.index');
// });

// Route::get('/news-list', function () {
//     return view('user-news.show');
// });

// Route::get('/news/judul', action: function () {
//     return view('user-news.index');
// });


Route::resource('/', UserLandingController::class);

Auth::routes();

Route::get('/dashboard', action: function () {
    return view('admin-dashboard.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/news', NewsController::class);
    Route::post('/upload', [NewsController::class, 'upload'])->name('ckeditor.upload');

    // Route Tag Product
    Route::resource('/product', controller: TagProductController::class);
    Route::post('/product/{id}/update', [TagProductController::class, 'update']);

    // Route Product Kategori
    Route::get('/product/{id}/create', [ProductController::class, 'create'])->name('form-product.create');
    Route::get('/product/{tagProductId}/edit/{id}', [ProductController::class, 'edit'])->name('form-product.edit');
    Route::put('/product/{tagProductId}/edit/{id}', [ProductController::class, 'update'])->name('form-product.update');
    Route::post('/product/{id}/store', [ProductController::class, 'store'])->name('form-product.store');

    // Route Product List
    Route::post('/product/{id}/store-product-list', [ProductController::class, 'storeProduct'])->name('product-list.store');
    Route::put('/product/{id}/update-product-list', [ProductController::class, 'updateProduct'])->name('product-list.update');
    Route::delete('product/{id}/{type}/delete', [ProductController::class, 'destroy'])->name('product.delete');

});