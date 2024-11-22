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
            ->with([
                'Kategori',
                'Product' => function ($query) {
                    $query->take(3);
                }
            ])
            ->paginate(1);

        $dataKategori = TagProduct::with([
            'Product' => function ($query) {
                $query->take(3);
            },
            'Kategori' => function ($query) {
                $query->where('kategori', 2);
            }
        ])
            ->latest()
            ->paginate(1);


        $dataNews = News::latest()
            ->paginate(3);

        return view('user-landing.index', compact('data', 'dataNews', 'dataKategori'));
    }
}
