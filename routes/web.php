<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user-landing.index');
});

Route::get('/news', function () {
    return view('user-news.show');
});

Route::get('/news-list', action: function () {
    return view('user-news.index');
});
