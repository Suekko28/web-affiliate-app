<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class UserNewsController extends Controller
{
    public function index()
    {
        $data = News::latest()
            ->paginate(10);

        return view('user-news.index', compact('data'));

    }

    public function show(string $slug)
    {
        $data = News::where('slug', $slug)->firstOrFail();

        return view('user-news.show', compact('data'));

    }

}
