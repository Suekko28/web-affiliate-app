<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user-landing.index');
});

Route::get('/product-list', function () {
    return view('user-product.index');
});
Route::get('/mix&max-list', function () {
    return view('user-mixmax.index');
});

Route::get('/news-list', function () {
    return view('user-news.show');
});

Route::get('/news/judul', action: function () {
    return view('user-news.index');
});


Auth::routes();

Route::get('/dashboard', action: function () {
    return view('admin-dashboard.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/news', NewsController::class);
    Route::post('/upload', [NewsController::class, 'upload'])->name('ckeditor.upload');

    Route::resource('/product', controller: ProductController::class);

});