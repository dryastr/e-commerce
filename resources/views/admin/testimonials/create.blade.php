<div class="modal fade" id="createTestimonialModal" tabindex="-1" aria-labelledby="createTestimonialModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTestimonialModalLabel">Tambah Testimonial</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createTestimonialForm" method="POST" action="{{ route('testimonials.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="createRegions" class="form-label">Wilayah</label>
                        <input type="text" class="form-control" id="createRegions" name="regions" required>
                    </div>
                    <div class="mb-3">
                        <label for="createDescription" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="createDescription" name="description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="createRating" class="form-label">Rating</label>
                        <input type="number" class="form-control" id="createRating" name="rating" min="0"
                            max="5" required>
                    </div>
                    <div class="mb-3">
                        <label for="createUserId" class="form-label">User</label>
                        <select class="form-select" id="createUserId" name="user_id" required>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
