<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\News;
use App\Models\Product;
use App\Models\TagProduct;
use Illuminate\Http\Request;

class UserLandingController extends Controller
{
    public function index()
    {
        $data = TagProduct::latest()
            ->with('Kategori')
            ->with('Product')
            ->paginate(1);

        $dataNews = News::latest()
            ->paginate(10);

        $dataKategori = TagProduct::with([
            'Kategori' => function ($query) {
                $query->where('kategori', 2); 
            }
        ])
            ->with('Product') 
            ->latest() 
            ->paginate(1); 

        return view('user-landing.index', compact('data', 'dataNews', 'dataKategori'));
    }
}
