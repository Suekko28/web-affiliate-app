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
                                                <input type="file" class="form-control" name="image" required>
                                            </div>
                                            <div class="col-sm-4 mb-3">
                                                <label for="nama">Nama Product <span class="mandatory">*</span></label>
                                                <input type="text" class="form-control" name="nama"
                                                    placeholder="Masukkan nama produk" value="{{ old('nama') }}" required>
                                            </div>
                                            <div class="col-sm-4 mb-3">
                                                <label for="link_shopee">Link Shopee <span
                                                        class="fst-italic">(Opsional)</span></label>
                                                <input type="text" class="form-control" name="link_shopee"
                                                    placeholder="Masukkan link shopee" value="{{ old('link_shopee') }}">
                                            </div>
                                            <div class="col-sm-4 mb-3">
                                                <label for="link_tokped">Link Tokopedia <span
                                                        class="fst-italic">(Opsional)</span></label>
                                                <input type="text" class="form-control" name="link_tokped"
                                                    placeholder="Masukkan link tokopedia" value="{{ old('link_tokped') }}">
                                            </div>
                                            <div class="col-sm-4 mb-3">
                                                <label for="link_tiktok">Link Tiktok <span
                                                        class="fst-italic">(Opsional)</span></label>
                                                <input type="text" class="form-control" name="link_tiktok"
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
                            <div class="d-flex">
                                <button type="button" class="btn btn-primary mb-3 ms-auto" id="btnProduct"
                                    data-bs-toggle="modal" data-bs-target="#modalProduct">
                                    Tambah Product
                            </div>
                            <div class="table-responsive mb-4 border rounded-1">
                                <table class="table text-nowrap mb-0 align-middle text-center">
                                    <thead>
                                        <tr class="text-nowrap">
                                            <th>No</th>
                                            <th>Foto</th>
                                            <th>Nama</th>
                                            <th>Link Shopee</th>
                                            <th>Link Tokopedia</th>
                                            <th>Link Tiktok</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = $product->firstItem(); ?>
                                        @foreach ($product as $item)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>
                                                    <img src="{{ asset(''.$item->image)}}" alt="Foto Product" width="125" height="125" class="img-fluid">
                                                </td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->link_shopee }}</td>
                                                <td>{{ $item->link_tokped }}</td>
                                                <td>{{ $item->link_tiktok }}</td>
                                                <td>
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-warning mb-2 rounded edit-btn-direct-transfer"
                                                        data-id="{{ $item->id }}" data-nama="{{ $item->nama }}"
                                                        data-link_shopee="{{ $item->link_shopee }}" data-link_tokped="{{ $item->link_tokped }}"
                                                        data-link_tiktok="{{ $item->link_tiktok }}"
                                                        data-image="{{$item->image}}">
                                                        <i class="fa fa-pen-to-square" style="color:white;"></i>
                                                    </a>
                                                    <button class="btn btn-danger delete-btn-direct-transfer rounded mb-2"
                                                        data-id="{{ $item->id }}">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>



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

    <!-- Modal Buat dan Edit Product -->
    <div class="modal fade" id="modalProduct" tabindex="-1" aria-labelledby="modalProductLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalProductLabel">Buat/Edit Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formProduct" action="{{ route('product-list.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" id="formMethod" value="POST">
                        <input type="hidden" name="ProductId" id="ProductId">
                        <input type="hidden" name="kategori_id" id="kategori_id">
                        {{-- <input type="hidden" name="wedding_design4_id" value="{{ $product->id }}">
                        <input type="hidden" name="nama_pasangan" value="{{ $product->nama_pasangan }}">
                        <input type="hidden" name="tgl_pernikahan" value="{{ $product->tgl_pernikahan }}"> --}}

                        <div class="form-group mb-2">
                            <label for="image">Gambar <span class="mandatory">*</span></label>
                            <input type="file" class="form-control" name="image" required>
                            <!-- Current Image Preview -->
                            <img id="currentimage" class="img-thumbnail mt-2" src="" alt="Current Image 1"
                                width="120" style="display: none;">
                        </div>

                        <div class="form-group mb-2">
                            <label for="nama">Nama Product <span class="mandatory">*</span></label>
                            <input type="text" class="form-control" name="nama" placeholder="Masukkan nama produk"
                                value="{{ old('nama') }}" required>
                        </div>

                        <div class="form-group mb-2">
                            <label for="link_shopee">Link Shopee <span class="fst-italic">(Opsional)</span></label>
                            <input type="text" class="form-control" name="link_shopee"
                                placeholder="Masukkan link shopee" value="{{ old('link_shopee') }}">
                        </div>

                        <div class="form-group mb-2">
                            <label for="link_tokped">Link Tokopedia <span class="fst-italic">(Opsional)</span></label>
                            <input type="text" class="form-control" name="link_tokped"
                                placeholder="Masukkan link tokopedia" value="{{ old('link_tokped') }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="link_tiktok">Link Tiktok <span class="fst-italic">(Opsional)</span></label>
                            <input type="text" class="form-control" name="link_tiktok"
                                placeholder="Masukkan link tiktok" value="{{ old('link_tiktok') }}">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" form="formProduct">Simpan</button>
                </div>
            </div>
        </div>
    </div>

@endsection

<!-- Modal JS Product -->
<script>
    document.getElementById('btnProduct').addEventListener('click', function() {
        // Reset the form for new entries
        document.getElementById('formProduct').reset();
        document.getElementById('ProductId').value = ''; // Reset hidden field for ID
        document.getElementById('formMethod').value = 'POST'; // Set method for creating

        // Set the action to the store route
        document.getElementById('formProduct').action =
            "{{ route('product-list.store') }}";
        document.getElementById('modalProductLabel').textContent = 'Tambah Product';
    });

    document.querySelectorAll('.edit-btn-perjalanan-cinta').forEach(function(button) {
        button.addEventListener('click', function() {
            var id = this.getAttribute('data-id');
            var tanggal = this.getAttribute('data-nama');
            var judul_Product = this.getAttribute('data-link_shopee');
            var link_tokped = this.getAttribute('data-link_tokped');
            var link_tiktok = this.getAttribute('data-link_tiktok');
            var image = this.getAttribute('data-image'); // Add this line

            // Populate form with existing data
            document.getElementById('productId').value = id; // Set ID
            document.getElementById('nama').value = nama;
            document.getElementById('link_shopee').value = link_shopee;
            document.getElementById('link_tokped').value = link_tokped;
            document.getElementById('link_tiktok').value = link_tiktok;
            document.getElementById('image').value = image;

            // Set the image previews
            var currentimage = document.getElementById('currentimage');

            currentimage.src = image; // Set current image src
            currentimage.style.display = image ? 'block' : 'none'; // Show if image exists

            // Set the form action to the update route
            document.getElementById('formProduct').action =
                `/product/${id}/update-product`;
            document.getElementById('formMethod').value = 'PUT'; // Set method for updating
            document.getElementById('modalProductLabel').textContent = 'Edit Product';

            // Show the modal
            var modal = new bootstrap.Modal(document.getElementById('modalProduct'));
            modal.show();
        });
    });
</script>

@section('scripts')
@endsection
