<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Kateogri;
use App\Models\Product;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kategori::latest()->paginate(10);
        return view('admin-product.index', compact('data'));
    }

    public function create()
    {

        // $dataProduct = Product::where('product_id', $productID)
        //     ->orderBy('id', 'desc')
        //     ->paginate(10);

        return view('admin-product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
