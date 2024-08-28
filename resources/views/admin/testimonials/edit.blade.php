<div class="modal fade" id="editTestimonialModal" tabindex="-1" aria-labelledby="editTestimonialModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTestimonialModalLabel">Edit Testimonial</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editTestimonialForm" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="editTestimonialId" name="id">
                    <div class="mb-3">
                        <label for="editRegions" class="form-label">Wilayah</label>
                        <input type="text" class="form-control" id="editRegions" name="regions" required>
                    </div>
                    <div class="mb-3">
                        <label for="editDescription" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="editDescription" name="description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editRating" class="form-label">Rating</label>
                        <input type="number" class="form-control" id="editRating" name="rating" min="0"
                            max="5" required>
                    </div>
                    <div class="mb-3">
                        <label for="editUserId" class="form-label">User</label>
                        <select class="form-select" id="editUserId" name="user_id" required>
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
