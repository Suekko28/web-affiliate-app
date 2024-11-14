@extends('layouts.master')

@section('title', 'Admin')

@section('pageContent')
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.1.0/ckeditor5.css" />
    @include('layouts.breadcrumb', ['title' => 'Edit', 'subtitle' => 'Blog'])

    <div class="card w-100 position-relative overflow-hidden">
        <div class="card-body">
            <section class="content">
                <div class="container-fluid">
                    @include('layouts.message')
                    <form action="{{ route('form-product.update', ['tagProductId' => $tagProduct->id, 'id' => $data->id]) }}"
                        method="post" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                        <input type="hidden" name="tag_product_id" value="{{ $tagProduct->id }}">
                        <div class="card-body container bg-white">
                            <!-- Existing content omitted for brevity -->

                            <div class="d-flex">
                                <button type="button" class="btn btn-primary mb-3 ms-auto" id="btnProduct"
                                    data-bs-toggle="modal" data-bs-target="#modalProduct">
                                    Add Product
                                </button>
                            </div>

                            <div class="table-responsive mb-4 border rounded-1">
                                <table class="table text-nowrap mb-0 align-middle text-center">
                                    <thead>
                                        <tr class="text-nowrap">
                                            <th>No</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Link Shopee</th>
                                            <th>Link Tokopedia</th>
                                            <th>Link Tiktok</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = $dataProduct->firstItem(); ?>
                                        @foreach ($dataProduct as $item)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>
                                                    <img src="{{ asset('' . $item->image) }}" alt="Image Product"
                                                        width="125" height="125" class="img-fluid">
                                                </td>
                                                <td>{{ $item->nama }}</td>
                                                <td>
                                                    <a href="{{ $item->link_shopee }}"
                                                        target="_blank" class="text-primary">{{ Str::limit($item->link_shopee, 200) }}</a>
                                                </td>
                                                <td>
                                                    <a href="{{ $item->link_tokped }}"
                                                        target="_blank" class="text-primary">{{ Str::limit($item->link_tokped, 200) }}</a>
                                                </td>
                                                <td>
                                                    <a href="{{ $item->link_tiktok }}"
                                                        target="_blank" class="text-primary">{{ Str::limit($item->link_tiktok, 200) }}</a>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-warning mb-2 rounded edit-btn-product"
                                                        data-id="{{ $item->id }}" data-nama="{{ $item->nama }}"
                                                        data-link_shopee="{{ $item->link_shopee }}"
                                                        data-link_tokped="{{ $item->link_tokped }}"
                                                        data-link_tiktok="{{ $item->link_tiktok }}"
                                                        data-image="{{ asset($item->image) }}">
                                                        <i class="fa fa-pen-to-square" style="color:white;"></i>
                                                    </a>
                                                    <button class="btn btn-danger delete-btn-product rounded mb-2"
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
                                <label for="kategori">Category <span class="mandatory">*</span></label>
                                <select name="kategori" class="form-select" required>
                                    <option value="0" @if ($data->kategori == '0') selected @endif>---Select
                                        Category---
                                    </option>
                                    <option value="1" @if ($data->kategori == '1') selected @endif>Product
                                    </option>
                                    <option value="2" @if ($data->kategori == '2') selected @endif>Mix & Max
                                    </option>
                                </select>
                            </div>


                            <div class="d-flex flex-row-reverse mt-5">
                                <button type="submit" class="btn btn-primary ml-3 ms-3">Save</button>
                                <a href="{{ route('product.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>

                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>

    <!-- Modal for Creating and Editing Product -->
    <div class="modal fade" id="modalProduct" tabindex="-1" aria-labelledby="modalProductLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalProductLabel">Create/Edit Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formProduct" action="{{ route('product.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" id="formMethod" value="POST">
                        <input type="hidden" name="ProductId" id="ProductId">

                        <div class="form-group mb-2">
                            <label for="modalImage">Image <span class="mandatory">*</span></label>
                            <input type="file" class="form-control" name="image" id="modalImage">
                            <img id="currentimage" class="img-thumbnail mt-2" src="" alt="Current Image"
                                width="120" style="display: none;">
                        </div>

                        <div class="form-group mb-2">
                            <label for="modalNama">Product Name <span class="mandatory">*</span></label>
                            <input type="text" class="form-control" name="nama" id="modalNama" required
                                placeholder="Input Name Product">
                        </div>

                        <div class="form-group mb-2">
                            <label for="modalLinkShopee">Shopee Link <span class="fst-italic">(Optional)</span></label>
                            <input type="text" class="form-control" name="link_shopee" id="modalLinkShopee"
                                placeholder="Input Shopee Link">
                        </div>

                        <div class="form-group mb-2">
                            <label for="modalLinkTokped">Tokopedia Link <span class="fst-italic">(Optional)</span></label>
                            <input type="text" class="form-control" name="link_tokped" id="modalLinkTokped"
                                placeholder="Input Tokopedia Link">
                        </div>

                        <div class="form-group mb-2">
                            <label for="modalLinkTiktok">Tiktok Link <span class="fst-italic">(Optional)</span></label>
                            <input type="text" class="form-control" name="link_tiktok" id="modalLinkTiktok"
                                placeholder="Input Tiktok Link">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" form="formProduct">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Hidden form for delete -->
    <form id="deleteForm" method="POST" style="display:none;">
        @csrf
        @method('DELETE')
    </form>
@endsection

@section('scripts')
    <script>
        document.getElementById('btnProduct').addEventListener('click', function() {
            // Reset the form for new entries
            document.getElementById('formProduct').reset();
            document.getElementById('ProductId').value = ''; // Reset hidden field for ID
            document.getElementById('formMethod').value = 'POST'; // Set method for creating

            // Set the action to the store route
            document.getElementById('formProduct').action =
                "{{ route('product-list.store', ['id' => $tagProduct->id]) }}";
            document.getElementById('modalProductLabel').textContent = 'Tambah Cerita';
        });
        document.querySelectorAll('.edit-btn-product').forEach(function(button) {
            button.addEventListener('click', function() {
                var id = this.getAttribute('data-id');
                var nama = this.getAttribute('data-nama');
                var link_shopee = this.getAttribute('data-link_shopee');
                var link_tokped = this.getAttribute('data-link_tokped');
                var link_tiktok = this.getAttribute('data-link_tiktok');
                var image = this.getAttribute('data-image');

                // Populate form fields with existing data
                document.getElementById('ProductId').value = id;
                document.getElementById('modalNama').value = nama;
                document.getElementById('modalLinkShopee').value = link_shopee;
                document.getElementById('modalLinkTokped').value = link_tokped;
                document.getElementById('modalLinkTiktok').value = link_tiktok;

                // Show current image preview if it exists
                var currentImage = document.getElementById('currentimage');
                currentImage.src = image;
                currentImage.style.display = image ? 'block' : 'none';

                // Set the form action to the update route
                document.getElementById('formProduct').action = `/product/${id}/update-product-list`;
                document.getElementById('formMethod').value = 'PUT';
                document.getElementById('modalProductLabel').textContent = 'Edit Product';

                // Show the modal
                var modal = new bootstrap.Modal(document.getElementById('modalProduct'));
                modal.show();
            });
        });
    </script>

    <script>
        document.querySelectorAll('.delete-btn-product').forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                var itemId = this.getAttribute('data-id');
                var type = "product"; // Set the type based on your context or logic

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Set the form action to the delete URL
                        var deleteForm = document.getElementById('deleteForm');
                        deleteForm.action = `/product/${itemId}/${type}/delete`;

                        // Submit the form
                        deleteForm.submit();
                    }
                });
            });
        });
    </script>
@endsection
