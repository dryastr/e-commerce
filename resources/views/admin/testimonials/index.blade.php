@extends('layouts.main')

@section('title', 'Daftar Testimonial')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title">Daftar Testimonial</h4>
                        <button type="button" class="btn btn-success d-none" data-bs-toggle="modal"
                            data-bs-target="#createTestimonialModal">
                            Tambah Testimonial
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
                                        <th>Wilayah</th>
                                        <th>Deskripsi</th>
                                        <th>Rating</th>
                                        <th>User</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($testimonials as $testimonial)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $testimonial->regions }}</td>
                                            <td>{{ $testimonial->description }}</td>
                                            <td>{{ $testimonial->rating }}</td>
                                            <td>{{ $testimonial->user->name }}</td>
                                            <td class="text-nowrap">
                                                <div class="dropdown dropup">
                                                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                                        id="dropdownMenuButton-{{ $testimonial->id }}"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-three-dots-vertical"></i>
                                                    </button>
                                                    <ul class="dropdown-menu"
                                                        aria-labelledby="dropdownMenuButton-{{ $testimonial->id }}">
                                                        <li>
                                                            <a class="dropdown-item" href="javascript:void(0)"
                                                                onclick="openEditModal({{ $testimonial->id }}, '{{ $testimonial->regions }}', '{{ $testimonial->description }}', {{ $testimonial->rating }}, {{ $testimonial->user_id }})">Ubah</a>
                                                        </li>
                                                        <li>
                                                            <form
                                                                action="{{ route('testimonials.destroy', $testimonial->id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus testimonial ini?')">
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
    {{-- @include('admin.testimonials.create') --}}

    <!-- Edit Modal -->
    @include('admin.testimonials.edit')
@endsection

@push('header-styles')
    <script>
        function openEditModal(id, regions, description, rating, userId) {
            document.getElementById('editTestimonialId').value = id;
            document.getElementById('editRegions').value = regions;
            document.getElementById('editDescription').value = description;
            document.getElementById('editRating').value = rating;
            document.getElementById('editUserId').value = userId;
            document.getElementById('editTestimonialForm').action = 'testimonials/' + id;
            var myModal = new bootstrap.Modal(document.getElementById('editTestimonialModal'));
            myModal.show();
        }
    </script>
@endpush
