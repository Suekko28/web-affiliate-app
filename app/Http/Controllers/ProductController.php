<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::latest()->paginate(10);
        return view('admin-product.index', compact('data'));
    }

    public function create($productID)
    {

        $dataProduct = Product::where('product_id', $productID)
        ->orderBy('id', 'desc')
        ->paginate(10);

        return view('admin-product.create', compact('dataProduct'));
    }

    public function store(ProductFormRequest $request)
    {

    }

    public function show(string $id)
    {

    }

    public function edit(ProductFormRequest $request)
    {

    }

    public function update(string $id)
    {

    }

    public function destroy(string $id)
    {

    }
}
