@extends('layouts.master')

@section('title', 'Admin')

@section('pageContent')

    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.1.0/ckeditor5.css" />
    @include('layouts.breadcrumb', ['title' => 'Create', 'subtitle' => 'Blog'])

    <div class="card w-100 position-relative overflow-hidden">
        <div class="card-body">
            <section class="content">
                <div class="container-fluid">
                    @include('layouts.message')
                    <!-- Small boxes (Stat box) -->
                    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body container bg-white">
                            {{-- <div id="product-forms">
                                <div class="text-center fw-bold fs-5 mb-4">Product</div>

                                <!-- Form Produk Template -->
                                <div class="product-form-fields">
                                    <div class="form-group fs-3">
                                        <div class="row">
                                            <div class="col-sm-4 mb-3">
                                                <label for="image">Gambar <span class="mandatory">*</span></label>
                                                <input type="file" class="form-control" name="image[]" required>
                                            </div>
                                            <div class="col-sm-4 mb-3">
                                                <label for="nama">Nama Product <span class="mandatory">*</span></label>
                                                <input type="text" class="form-control" name="nama[]"
                                                    placeholder="Masukkan nama produk" value="{{ old('nama') }}" required>
                                            </div>
                                            <div class="col-sm-4 mb-3">
                                                <label for="link_shopee">Link Shopee <span
                                                        class="fst-italic">(Opsional)</span></label>
                                                <input type="text" class="form-control" name="link_shopee[]"
                                                    placeholder="Masukkan link shopee" value="{{ old('link_shopee') }}">
                                            </div>
                                            <div class="col-sm-4 mb-3">
                                                <label for="link_tokped">Link Tokopedia <span
                                                        class="fst-italic">(Opsional)</span></label>
                                                <input type="text" class="form-control" name="link_tokped[]"
                                                    placeholder="Masukkan link tokopedia" value="{{ old('link_tokped') }}">
                                            </div>
                                            <div class="col-sm-4 mb-3">
                                                <label for="link_tiktok">Link Tiktok <span
                                                        class="fst-italic">(Opsional)</span></label>
                                                <input type="text" class="form-control" name="link_tiktok[]"
                                                    placeholder="Masukkan link tiktok" value="{{ old('link_tiktok') }}">
                                            </div>
                                            <div class="container">

                                                <button type="button" class="btn btn-danger ms-2 delete-product"
                                                    style="display: none;">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>

                            <div class="d-flex">
                                <button type="button" class="btn btn-primary mb-3 ms-auto" id="add-product">Tambah
                                    Product</button>
                            </div> --}}

                            <div class="col-sm-4 mb-3">
                                <label for="kategori">Kategori <span class="mandatory">*</span></label>
                                <select name="kategori" class="form-select" required>
                                    <option value="0" {{ old('kategori') == '0' ? 'selected' : '' }}>---Pilih
                                        Kategori---
                                    </option>
                                    <option value="1" {{ old('kategori') == '1' ? 'selected' : '' }}>Product</option>
                                    <option value="2" {{ old('kategori') == '2' ? 'selected' : '' }}>Mix & Max
                                    </option>
                                </select>
                            </div>

                            <div class="d-flex flex-row-reverse mt-5">
                                <button type="submit" class="btn btn-primary ml-3 ms-3">Simpan</button>
                                <a href="{{ route('product.index') }}" class="btn btn-secondary">Batal</a>
                            </div>

                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>

@endsection

@section('scripts')
    <!-- JavaScript untuk menggandakan bagian gambar hingga link Tiktok dan menghapus produk -->
    <script>
        document.getElementById('add-product').addEventListener('click', function() {
            // Ambil elemen pertama dari fields produk yang ada
            const productFields = document.querySelector('.product-form-fields');

            // Gandakan elemen tersebut
            const newProductFields = productFields.cloneNode(true);

            // Reset nilai dari input di dalam fields yang digandakan
            newProductFields.querySelectorAll('input').forEach(input => input.value = '');

            // Tampilkan tombol hapus pada form baru
            const deleteButton = newProductFields.querySelector('.delete-product');
            deleteButton.style.display = 'inline-block'; // Tampilkan tombol hapus

            // Tambahkan fields yang digandakan ke dalam container
            document.getElementById('product-forms').appendChild(newProductFields);
        });

        // Event listener untuk tombol hapus
        document.getElementById('product-forms').addEventListener('click', function(e) {
            if (e.target.classList.contains('delete-product')) {
                const productForm = e.target.closest('.product-form-fields');
                if (productForm) {
                    productForm.remove(); // Remove the product form
                }
            }
        });
    </script>
@endsection
