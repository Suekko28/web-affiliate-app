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
                    <form action="{{ route('product.update', $data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body container bg-white">
                            <div class="mempelai text-center fw-bold fs-5 mb-4">Product</div>
                            <div class="form-group fs-3">
                                <div class="row">
                                    <div class="col-sm-4 mb-3">
                                        <label for="image">Gambar <span class="mandatory">*</span></label>
                                        <input type="file" class="form-control" id="image" name="image"
                                            placeholder="" value="{{ old('image') }}">
                                        <div class="d-flex flex-column">
                                            <span>Gambar saat ini:</span>
                                            <img src="{{ $data->image }}" alt="Foto Product" width="150" height="150"
                                                class="mt-2 img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="nama">Nama Product <span class="mandatory">*</span></label>
                                        <input type="text" class="form-control" id="nama" name="nama"
                                            placeholder="Masukkan nama prodcut" value="{{ $data->nama }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="link_shopee">Link Shopee <span class="fst-italic">
                                                (Opsional)</span></label>
                                        <input type="text" class="form-control" id="link_shopee" name="link_shopee"
                                            placeholder="Masukkan link shopee" value="{{ $data->link_shopee }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="link_tokped">Link Tokopedia <span class="fst-italic">
                                                (Opsional)</span></label>
                                        <input type="text" class="form-control" id="link_tokped" name="link_tokped"
                                            placeholder="Masukkan link tokopedia" value="{{ $data->link_tokped }}">
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <label for="link_tiktok">Link Tiktok <span class="fst-italic">
                                                (Opsional)</span></label>
                                        <input type="text" class="form-control" id="link_tiktok" name="link_tiktok"
                                            placeholder="Masukkan link tiktok" value="{{ $data->link_tiktok }}">
                                    </div>
                                    <div class="d-flex">
                                        <button type="button" class="btn btn-primary mb-3 ms-auto" id="btnProduct"
                                            data-bs-toggle="modal" data-bs-target="#modalProduct">
                                            Tambah Product
                                    </div>
                                    <hr>

                                    {{-- <div class="form-product">
                                        <div class="d-flex">
                                            <button type="button" class="btn btn-primary mb-3 ms-auto" id="btnProduct"
                                                data-bs-toggle="modal" data-bs-target="#modalProduct">
                                                Tambah Product
                                        </div>
                                        <div class="table-responsive mb-4 border rounded-1">
                                            <table class="table text-center fs-3">
                                                <thead>
                                                    <th>No</th>
                                                    <th>Foto</th>
                                                    <th>Tanggal</th>
                                                    <th>nama Product</th>
                                                    <th>Detail</th>
                                                    <th>Aksi</th>
                                                </thead>
                                                <tbody>
                                                    <?php $i = $dataProduct->firstItem(); ?>
                                                    @foreach ($dataProduct as $item)
                                                        <tr>
                                                            <td>{{ $i }}</td>
                                                            <td><img class="img-thumbnail" src="{{ Storage::url($item->image1) }}"
                                                                    alt="Image 1" width="120"></td>
                                                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                                                            <td>{{ $item->nama_cerita }}</td>
                                                            <td>{{ $item->deskripsi }}</td>
                                                            <td>
                                                                <a href="javascript:void(0)"
                                                                    class="btn btn-warning mb-2 rounded edit-btn-perjalanan-cinta"
                                                                    data-id="{{ $item->id }}"
                                                                    data-tanggal="{{ $item->tanggal }}"
                                                                    data-nama="{{ $item->nama_cerita }}"
                                                                    data-deskripsi="{{ $item->deskripsi }}"
                                                                    data-image1="{{ Storage::url($item->image1) }}">
                                                                    <i class="fa fa-pen-to-square" style="color:white;"></i>
                                                                </a>
            
                                                                <button class="btn btn-danger delete-btn-perjalanan-cinta rounded mb-2"
                                                                    data-id="{{ $item->id }}">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
            
                                                                <!-- Add delete button if needed -->
                                                            </td>
                                                        </tr>
                                                        <?php $i++; ?>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div> --}}

                                    <div class="col-sm-4 mb-3">
                                        <label for="nama">Kategori <span class="mandatory">*</span></label>
                                        <select name="kategori" id="kagegori" class="form-select">
                                            <option value="0" @if ($data->kategori == '0') selected @endif>
                                                ---Pilih
                                                Kategori---</option>
                                            <option value="1" @if ($data->kategori == '1') selected @endif>Product
                                            </option>
                                            <option value="2" @if ($data->kategori == '2') selected @endif>Mix &
                                                Max
                                            </option>
                                        </select>
                                    </div>

                                </div>
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
                    <form id="formProduct" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" id="formMethod" value="POST">

                        <div class="form-group mb-2">
                            <label for="image">Gambar <span class="mandatory">*</span></label>
                            <input type="file" class="form-control" id="image" name="image" placeholder=""
                                value="{{ old('image') }}">
                        </div>

                        <div class="form-group mb-2">
                            <label for="nama">Nama Product <span class="mandatory">*</span></label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                placeholder="Masukkan nama" value="{{ old('nama') }}">
                        </div>

                        <div class="form-group mb-2">
                            <label for="link_shopee">Link Shopee <span class="fst-italic">(Opsional)</span></label>
                            <input type="text" class="form-control" id="link_shopee" name="link_shopee"
                                placeholder="Masukkan link Shopee" value="{{ old('link_shopee') }}">
                        </div>

                        <div class="form-group mb-2">
                            <label for="link_tokopedia">Link Tokopedia <span class="fst-italic">(Opsional)</span></label>
                            <input type="text" class="form-control" id="link_tokopedia" name="link_tokopedia"
                                placeholder="Masukkan link Tokopedia" value="{{ old('link_tokopedia') }}">
                        </div>

                        <div class="form-group mb-2">
                            <label for="link_tiktok">Link Tiktok <span class="fst-italic">(Opsional)</span></label>
                            <input type="text" class="form-control" id="link_tiktok" name="link_tiktok"
                                placeholder="Masukkan link Tiktok" value="{{ old('link_tiktok') }}">
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
        document.getElementById('formMethod').value = 'POST'; // Set method for creating
        document.getElementById('formProduct').action =
            "{{ route('product.store') }}"; // Set action to store route
        document.getElementById('modalProductLabel').textContent = 'Tambah Product';
    });

    document.querySelectorAll('.edit-btn-product').forEach(function(button) {
        button.addEventListener('click', function() {
            // Fetch data from data attributes
            var id = this.getAttribute('data-id');
            var tanggal = this.getAttribute('data-tanggal');
            var nama = this.getAttribute('data-nama');
            var deskripsi = this.getAttribute('data-deskripsi');
            var image1 = this.getAttribute('data-image1');

            // Populate form with existing data
            document.getElementById('formProduct').action =
                `/product/${id}`; // Set update route with ID
            document.getElementById('formMethod').value = 'PUT'; // Set method for updating

            document.getElementById('tanggal').value = tanggal;
            document.getElementById('nama').value = nama;
            document.getElementById('deskripsi').value = deskripsi;

            // Display current image if available
            if (image1) {
                var currentImagePreview = document.getElementById('currentImagePreview');
                currentImagePreview.src = image1;
                currentImagePreview.style.display = 'block';
            }

            document.getElementById('modalProductLabel').textContent = 'Edit Product';

            // Show modal
            var modal = new bootstrap.Modal(document.getElementById('modalProduct'));
            modal.show();
        });
    });

    // Add delete functionality
    document.querySelectorAll('.delete-btn-product').forEach(function(button) {
        button.addEventListener('click', function() {
            var id = this.getAttribute('data-id');
            if (confirm('Are you sure you want to delete this product?')) {
                // Perform delete request
                fetch(`/product/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => {
                        if (response.ok) {
                            location.reload(); // Reload page after deletion
                        } else {
                            alert('Failed to delete product.');
                        }
                    });
            }
        });
    });
</script>


@section('scripts')
@endsection
