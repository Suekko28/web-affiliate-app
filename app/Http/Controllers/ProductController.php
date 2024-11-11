<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Process;
use Storage;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::latest()->paginate(10);
        return view('admin-product.index', compact('data'));
    }

    public function create($productId)
    {
        $product = Product::where('kategori_id', $productId);

        return view('admin-product.create', $product);
    }

    public function store(ProductFormRequest $request)
    {
        $data = $request->all();

        // Process images if any were uploaded
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $nama_image = rand() . '_' . uniqid() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('product', $nama_image, 'public');
            $url = Storage::url($path);
            $data['image'] = $url;

        }

        Product::create($data); // Ensure the 'image' column can store JSON or TEXT data

        return redirect()->route('product.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $data = Product::findOrFail($id);

        return view('admin-product.view', compact('data'));

    }

    public function edit(string $id)
    {
        $data = Product::findOrFail($id);

        return view('admin-product.edit', compact('data'));
    }

    public function update(ProductFormRequest $request, string $id)
    {

        $product = Product::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($product->image) {
                $oldImagePath = 'product/' . basename($product->image);
                Storage::disk('public')->delete($oldImagePath);

            }
            $image = $request->file('image');
            $nama_image = rand() . '_' . uniqid() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('product', $nama_image, 'public');

            $url = Storage::url($path);
            $data['image'] = $url;
        }

        $product->update($data);

        return redirect()->route('product.index')->with('success', 'Data berhasil diperbaharui');



    }

    public function destroy(string $id)
    {
        $data = Product::findOrFail($id);

        if ($data->image) {
            $imagePath = 'product/' . basename($data->image);
            Storage::disk('public')->delete($imagePath);
        }

        $data->delete();

        return redirect()->route('product.index')->with('success', 'Berhasil Menghapus Data');

    }
}
