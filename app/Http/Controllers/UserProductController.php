<?php

namespace App\Http\Controllers;

use App\Models\TagProduct;
use Illuminate\Http\Request;

class UserProductController extends Controller
{
    public function index()
    {
        $data = TagProduct::latest()
        ->with('Product')
        ->with('Kategori')
        ->paginate(10);

        return view('user-product.index', compact('data'));
    }
}
