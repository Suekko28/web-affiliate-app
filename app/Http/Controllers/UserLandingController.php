<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\TagProduct;
use Illuminate\Http\Request;

class UserLandingController extends Controller
{
    public function index()
    {
        $data = TagProduct::latest()
        ->with('Kategori')
        ->with('Product')
        ->paginate(10);

        $dataNews = News::latest()
        ->paginate(10);


        return view('user-landing.index', compact('data', 'dataNews'));
    }
}
