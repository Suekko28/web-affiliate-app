<?php

namespace App\Http\Controllers;

use App\Http\Requests\KategoriFormRequest;
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
        $data = Kategori::latest()
            ->with('Product')
            ->paginate(10);
        return view('admin-product.index', compact('data'));
    }

    public function create()
    {

        return view('admin-product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KategoriFormRequest $request)
    {
        $data = $request->all();

        Kategori::create($data);

        return redirect()->route('product.index')->with('success', 'Data berhasil ditambahkan');
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
    public function update(KategoriFormRequest $request, string $id)
    {
        $data = Kategori::findOrFail($id); // Use findOrFail to handle non-existent records gracefully
        $data->update($request->validated()); // Ensure only validated data is used

        return redirect()->route('product.index')->with('success', 'Data berhasil diperbaharui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Kategori::find($id);

        $data->delete();

        return redirect()->route('product.index')->with('success', 'Data berhasil dihapus');
    }
}
