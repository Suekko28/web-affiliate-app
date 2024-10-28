<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user-landing.index');
});

Route::get('/product', function () {
    return view('user-product.index');
});
Route::get('/mix&max', function () {
    return view('user-mixmax.index');
});

Route::get('/news', function () {
    return view('user-news.show');
});

Route::get('/news-list', action: function () {
    return view('user-news.index');
});


Auth::routes();

Route::get('/dashboard', action: function () {
    return view('admin-dashboard.index');
});

