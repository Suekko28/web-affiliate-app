<?php

namespace App\Http\Controllers;

use App\Models\TagProduct;
use Illuminate\Http\Request;

class UserMixMaxContorller extends Controller
{
    public function index()
    {
        $dataKategori = TagProduct::with([
            'Kategori' => function ($query) {
                $query->where('kategori', 2);
            }
        ])
            ->with('Product')
            ->latest()
            ->paginate(10);

        return view('user-mixmax.index', compact('dataKategori'));
    }
}
