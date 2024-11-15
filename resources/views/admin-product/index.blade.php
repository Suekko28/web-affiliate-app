@extends('layouts.master')

@section('title', 'Admin')

@section('pageContent')

    @include('layouts.breadcrumb', ['title' => 'Product', 'subtitle' => 'Dashboard'])
    <div class="card w-100 position-relative overflow-hidden">
        {{-- <div class="px-4 py-3 border-bottom">
            <h4 class="card-title mb-0">Basic Table</h4>
        </div> --}}
        <div class="card-body">
            <button type="button" class="btn btn-primary mb-3" id="btnProduct" data-bs-toggle="modal"
                data-bs-target="#modalProduct">
                + Create Product
            </button> @include('layouts.message')
            <div class="search">
                <div class="mb-3">
                    <input type="text" id="searchInput" class="form-control" placeholder="Cari...">
                </div>
                <div id="noDataMessage" class="alert alert-warning" style="display: none;">
                    Data tidak ditemukan.
                </div>
            </div>
            <div class="table-responsive mb-4 border rounded-1">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead>
                        <tr class="text-nowrap text-center">
                            {{-- <th><input type="checkbox" id="selectAll"></th> --}}
                            <th>No</th>
                            {{-- <th>Nama Undangan</th> --}}
                            <th>Tag Product</th>
                            {{-- <th>Foto</th>
                            <th>Name Product</th> --}}
                            <th>Category</th>
                            <th>List Product</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $data->firstItem(); ?>
                        @foreach ($data as $item)
                            <tr class="text-center">
                                <td scope="row">{{ $i }}</td>
                                <td scope="row">{{ $item->tag_product }}</td>
                                <td>
                                    @if ($item->Kategori->isEmpty())
                                        None
                                    @else
                                        @foreach ($item->Kategori as $kategori)
                                            @if ($kategori->kategori == 1)
                                                Product
                                            @else
                                                Mix&Max
                                            @endif
                                        @endforeach
                                    @endif
                                </td>

                                <td>
                                    @if ($item->Kategori->isEmpty())
                                        <a class="btn btn-primary"
                                            href="{{ route('form-product.create', ['id' => $item->id]) }}">Create List
                                            Product</a>
                                    @else
                                        <a class="btn btn-secondary"
                                            href="{{ route('form-product.edit', ['tagProductId' => $item->Kategori->first()->tag_product_id, 'id' => $item->Kategori->first()->id]) }}">
                                            Edit Konten
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y h:i A') }}
                                </td>
                                <td>
                                    <div class="btn-group-horizontal">
                                        <a href="javascript:void(0)" class="btn btn-warning mb-2 rounded edit-btn"
                                            data-id="{{ $item->id }}" data-tag_product="{{ $item->tag_product }}">
                                            <i class="fa fa-pen-to-square" style="color:white;"></i>
                                        </a>
                                        <button class="btn btn-danger delete-btn rounded mb-2"
                                            data-id="{{ $item->id }}"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="p-2">{{ $data->links() }}</div>

        </div>
    </div>

    <!-- Modal Create dan Edit Undangan -->
    <div class="modal fade" id="modalProduct" tabindex="-1" aria-labelledby="modalProductLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalProductLabel">Create/Edit Undangan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formProduct" action="{{ route('product.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="tagProductId">
                        <div class="form-group">
                            <label for="tag_product">Tag Product<span class="mandatory">*</span></label>
                            <input type="text" name="tag_product" id="tag_product" class="form-control" required
                                placeholder="Input Tag Product (#112)">
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


    <script>
        // Event listener untuk tombol "Create Undangan"
        document.getElementById('btnProduct').addEventListener('click', function() {
            // Reset form action ke route store dan kosongkan field input
            document.getElementById('formProduct').reset();
            document.getElementById('formProduct').action = "{{ route('product.store') }}";

            // Ubah title modal jadi "Create Undangan Baru"
            document.getElementById('modalProductLabel').textContent = 'Create Product';
        });

        // Event listener untuk tombol edit
        document.querySelectorAll('.edit-btn').forEach(function(button) {
            button.addEventListener('click', function(event) {
                var id = this.getAttribute('data-id');
                var tag_product = this.getAttribute('data-tag_product');

                // Set form action untuk update
                document.getElementById('formProduct').action = '/product/' + id + '/update';

                // Isi form dengan data dari tombol edit
                document.getElementById('tagProductId').value = id;
                document.getElementById('tag_product').value = tag_product;

                // Ubah title modal jadi "Edit Undangan"
                document.getElementById('modalProductLabel').textContent = 'Edit Product';

                // Buka modal
                var modal = new bootstrap.Modal(document.getElementById('modalProduct'));
                modal.show();
            });
        });
    </script>

    <script>
        document.querySelectorAll('.delete-btn').forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                var itemId = this.getAttribute('data-id');
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
                        // Set the action URL for the delete form
                        document.getElementById('deleteForm').action =
                            "{{ url('product') }}/" + itemId;
                        // Submit the form
                        document.getElementById('deleteForm').submit();
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        );
                    }
                });
            });
        });

        // Search functionality
        const searchInput = document.getElementById('searchInput');
        const tableRows = document.querySelectorAll('.table tbody tr');
        const noDataMessage = document.getElementById('noDataMessage');

        searchInput.addEventListener('input', function() {
            const searchText = this.value.toLowerCase();
            let found = false;

            tableRows.forEach(function(row) {
                const rowData = row.innerText.toLowerCase();
                if (rowData.includes(searchText)) {
                    row.style.display = '';
                    found = true;
                } else {
                    row.style.display = 'none';
                }
            });

            noDataMessage.style.display = found ? 'none' : 'block';
        });
    </script>
@endsection

@section('scripts')
@endsection
