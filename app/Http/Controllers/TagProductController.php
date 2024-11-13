<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagProductFormRequest;
use App\Models\TagProduct;
use Illuminate\Http\Request;

class TagProductController extends Controller
{

    public function index()
    {
        $data = TagProduct::latest()
            ->with('Kategori')
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
    public function store(TagProductFormRequest $request)
    {
        $data = $request->all();

        TagProduct::create($data);

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
    public function update(TagProductFormRequest $request, string $id)
    {
        $data = TagProduct::findOrFail($id); // Use findOrFail to handle non-existent records gracefully
        $data->update($request->validated()); // Ensure only validated data is used

        return redirect()->route('product.index')->with('success', 'Data berhasil diperbaharui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = TagProduct::find($id);

        $data->delete();

        return redirect()->route('product.index')->with('success', 'Data berhasil dihapus');
    }
}
