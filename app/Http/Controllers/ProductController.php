<?php

namespace App\Http\Controllers;

use App\Http\Requests\KategoriFormRequest;
use App\Http\Requests\ProductFormRequest;
use App\Http\Requests\ProductListFormRequest;
use App\Models\Kategori;
use App\Models\Product;
use App\Models\TagProduct;
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

    public function create($tagProductId)
    {
        $tagProduct = TagProduct::findOrFail($tagProductId);

        $dataProduct = Product::where('tag_product_id', $tagProductId)
            ->latest()
            ->paginate(10);

        return view('admin-product.create', compact('tagProduct', 'dataProduct'));
    }

    public function store(KategoriFormRequest $request, $tagProductId)
    {
        $tagProduct = TagProduct::findOrFail($tagProductId);
        $data = $request->all();

        $data['tag_product_id'] = $tagProduct->id;
        Kategori::create($data); // Ensure the 'image' column can store JSON or TEXT data


        return redirect()->route('product.index')->with('success', 'Data berhasil ditambahkan');
    }


    public function show(string $id)
    {
        $data = Product::findOrFail($id);

        return view('admin-product.view', compact('data'));

    }

    public function edit(string $id, $tagProductId)
    {
        $tagProduct = TagProduct::findOrFail($tagProductId);

        $data = Product::findOrFail($id);

        return view('admin-product.edit', compact('data', 'tagProduct'));
    }

    public function update(KategoriFormRequest $request, string $id)
    {

        $product = Product::findOrFail($id);

        $data = $request->all();

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


    // Function Product List

    public function storeProduct(ProductListFormRequest $request, $tagProductId)
    {
        $tagProduct = TagProduct::findOrFail($tagProductId);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $nama_image = rand() . '_' . uniqid() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('product', $nama_image, 'public');
            $url = Storage::url($path);
            $data['image'] = $url;
        }

        // Menyimpan kategori_id dari input
        $data['tag_product_id'] = $tagProduct->id;

        Product::create($data);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function updateProduct(ProductListFormRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($product->image) {
                // Delete the old image
                $oldImagePath = 'product/' . basename($product->image);
                Storage::disk('public')->delete($oldImagePath);
            }
            $image = $request->file('image');
            $nama_image = rand() . '_' . uniqid() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('product', $nama_image, 'public');
            $url = Storage::url($path);
            $data['image'] = $url;
        }

        // Update product data
        $product->update($data);

        return back()->with('success', 'Product berhasil diubah.');
    }

}
