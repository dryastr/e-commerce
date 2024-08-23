@extends('layouts.main')

@section('title', 'Daftar Produk')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title">Daftar Produk</h4>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#createProductModal">
                            Tambah Produk
                        </button>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-xl">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Deskripsi</th>
                                        <th>Harga</th>
                                        <th>Best Seller</th>
                                        <th>Rating</th>
                                        <th>Kategori</th>
                                        <th>Gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->description }}</td>
                                            <td>{{ number_format($product->price, 2) }}</td>
                                            <td>{{ $product->is_best_seller ? 'Yes' : 'No' }}</td>
                                            <td>{{ $product->rating }}</td>
                                            <td>{{ $product->category->name }}</td>
                                            <td>
                                                @if ($product->image_url)
                                                    <img src="{{ asset('storage/' . $product->image_url) }}"
                                                        alt="{{ $product->name }}" width="100">
                                                @else
                                                    No Image
                                                @endif
                                            </td>
                                            <td class="text-nowrap">
                                                <div class="dropdown dropup">
                                                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                                        id="dropdownMenuButton-{{ $product->id }}"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-three-dots-vertical"></i>
                                                    </button>
                                                    <ul class="dropdown-menu"
                                                        aria-labelledby="dropdownMenuButton-{{ $product->id }}">
                                                        <li>
                                                            <a class="dropdown-item" href="javascript:void(0)"
                                                                onclick="openEditModal({{ $product->id }}, '{{ $product->name }}', '{{ $product->description }}', '{{ $product->price }}', {{ $product->is_best_seller ? 'true' : 'false' }}, {{ $product->rating }}, '{{ $product->category_id }}', '{{ asset('storage/' . $product->image_url) }}')">Ubah</a>
                                                        </li>
                                                        <li>
                                                            <form action="{{ route('products.destroy', $product->id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item">Hapus</button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" id="createProductModal" tabindex="-1" aria-labelledby="createProductModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createProductModalLabel">Tambah Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="createProductForm" method="POST" action="{{ route('products.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="createName" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="createName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="createDescription" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="createDescription" name="description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="createPrice" class="form-label">Harga</label>
                            <input type="number" step="0.01" class="form-control" id="createPrice" name="price"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="is_best_seller" class="form-check-label">Best Seller</label>
                            <input type="checkbox" class="form-check-input" id="is_best_seller" name="is_best_seller"
                                value="1">
                        </div>
                        <div class="mb-3">
                            <label for="createRating" class="form-label">Rating</label>
                            <input type="number" class="form-control" id="createRating" name="rating" min="0"
                                max="5">
                        </div>
                        <div class="mb-3">
                            <label for="createImage" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="createImage" name="image">
                        </div>
                        <div class="mb-3">
                            <label for="createCategoryId" class="form-label">Kategori</label>
                            <select class="form-select" id="createCategoryId" name="category_id" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProductModalLabel">Edit Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editProductForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="editProductId" name="id">
                        <div class="mb-3">
                            <label for="editName" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="editName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="editDescription" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="editDescription" name="description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editPrice" class="form-label">Harga</label>
                            <input type="number" step="0.01" class="form-control" id="editPrice" name="price"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="editIsBestSeller" class="form-check-label">Best Seller</label>
                            <input type="checkbox" class="form-check-input" id="editIsBestSeller" name="is_best_seller"
                                value="1">
                        </div>
                        <div class="mb-3">
                            <label for="editRating" class="form-label">Rating</label>
                            <input type="number" class="form-control" id="editRating" name="rating" min="0"
                                max="5">
                        </div>
                        <div class="mb-3">
                            <label for="editImage" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="editImage" name="image">
                            <img id="currentImage" src="" alt="Current Image" width="100"
                                class="mt-2 d-none">
                        </div>
                        <div class="mb-3">
                            <label for="editCategoryId" class="form-label">Kategori</label>
                            <select class="form-select" id="editCategoryId" name="category_id" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection


@push('header-styles')
    <script>
        function openEditModal(id, name, description, price, isBestSeller, rating, categoryId, imageUrl) {
            document.getElementById('editProductId').value = id;
            document.getElementById('editName').value = name;
            document.getElementById('editDescription').value = description;
            document.getElementById('editPrice').value = price;
            document.getElementById('editIsBestSeller').checked = isBestSeller;
            document.getElementById('editRating').value = rating;
            document.getElementById('editCategoryId').value = categoryId;
            const fixedImageUrl = imageUrl.replace('/storage/', '/storage/');
            document.getElementById('currentImage').src = fixedImageUrl;
            document.getElementById('currentImage').classList.remove('d-none');
            document.getElementById('editProductForm').action = 'products/' + id;
            var myModal = new bootstrap.Modal(document.getElementById('editProductModal'));
            myModal.show();
        }
    </script>
@endpush
