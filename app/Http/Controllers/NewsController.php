<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsFormRequest;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = News::orderBy('id', 'desc')->paginate(10);
        return view('admin-news.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsFormRequest $request)
    {
        // Mengambil data dari permintaan
        $data = $request->only(['judul', 'deskripsi']);

        // Menghasilkan slug dari judul
        $slug = Str::slug($data['judul']);

        // Pastikan slug unik
        $slugCount = News::where('slug', $slug)->count();
        if ($slugCount > 0) {
            $slug = "{$slug}-" . ($slugCount + 1); // Tambahkan angka untuk membedakan slug yang sama
        }

        $data['slug'] = $slug; // Tambahkan slug ke data
        
        // Menangani gambar
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $nama_image = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('news', $nama_image, 'public');

            $url = Storage::url($path);
            $data['image'] = $url;
        }

        // Membuat record baru di tabel news
        News::create($data);

        return redirect()->route('news.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'upload' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $path = $request->file('upload')->store('images', 'public');
        $url = Storage::url($path);
        return response()->json(['url' => $url]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = News::findOrFail($id);
        return view('admin-news.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = News::findOrFail($id);
        return view('admin-news.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewsFormRequest $request, string $id)
    {
        $news = News::findOrFail($id);
        $data = $request->only(['judul', 'deskripsi']); // Mengambil judul dan deskripsi

        // Generate a unique slug if the title is updated
        if ($request->has('judul') && $data['judul'] !== $news->judul) {
            $slug = Str::slug($data['judul']);
            $originalSlug = $slug;
            $count = 1;

            // Check for uniqueness and modify slug if necessary
            while (News::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }

            $data['slug'] = $slug; // Update the slug in the data array
        } else {
            // Keep the existing slug if the title hasn't changed
            $data['slug'] = $news->slug;
        }

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($news->image) {
                // Extract the filename from the URL
                $oldImagePath = 'news/' . basename($news->image);
                Storage::disk('public')->delete($oldImagePath);
            }

            // Store the new image
            $image = $request->file('image');
            $nama_image = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('news', $nama_image, 'public');

            // Update the image URL in the data array
            $data['image'] = Storage::url($path);
        }

        // Update the record in the news table
        $news->update($data);

        return redirect()->route('news.index')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = News::findOrFail($id);

        if ($data->image) {
            $imagePath = 'news/' . basename($data->image);
            Storage::disk('public')->delete($imagePath);
        }

        $data->delete();

        return redirect()->route('news.index')->with('success', 'Berhasil Menghapus Data');
    }
}
