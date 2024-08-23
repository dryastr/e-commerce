<div class="container-fluid testimonial py-5" id="testimoni">
    <div class="container py-5">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px;">
            <h4 class="text-primary righteous-regular">Testimonials</h4>
            <h1 class="display-5 mb-4 righteous-regular">What Our Clients Are Saying</h1>
            <p class="mb-0">Discover why our clients love us. From outstanding quality to exceptional service, see how
                we’ve made a difference in their lives. Your satisfaction is our top priority, and we’re proud to share
                the experiences of those who trust us.</p>
            <a href="#" data-bs-toggle="modal" data-bs-target="#testimonialModal" style="text-decoration: none;"
                onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';">
                Write a Testimonial
            </a>
        </div>
        <div class="testimonial-carousel owl-carousel wow zoomInDown" data-wow-delay="0.2s">
            @foreach ($testimonials as $testimonial)
                <div class="testimonial-item"
                    data-dot="<img class='img-fluid' src='img/testimonial-img-{{ $loop->index + 1 }}.jpg' alt=''>">
                    <div class="testimonial-inner text-center p-5">
                        <div class="d-flex align-items-center justify-content-center mb-4">
                            <div>
                                <h5 class="mb-2">{{ $testimonial->user->name }}</h5>
                                <p class="mb-0">{{ $testimonial->regions }}</p>
                            </div>
                        </div>
                        <p class="fs-7">{{ $testimonial->description }}</p>
                        <div class="text-center">
                            <div class="d-flex justify-content-center">
                                @for ($i = 0; $i < $testimonial->rating; $i++)
                                    <i class="fas fa-star text-primary"></i>
                                @endfor
                                @for ($i = 0; $i < 5 - $testimonial->rating; $i++)
                                    <i class="far fa-star text-primary"></i>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


<!-- The Modal -->
<div class="modal fade" id="testimonialModal" tabindex="-1" aria-labelledby="testimonialModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('testimonial-user.store') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="testimonialModalLabel">New Testimonial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="regions" class="form-label">Region</label>
                        <input type="text" class="form-control" id="regions" name="regions" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating</label>
                        <select class="form-select" id="rating" name="rating" required>
                            <option value="1">1 Star</option>
                            <option value="2">2 Stars</option>
                            <option value="3">3 Stars</option>
                            <option value="4">4 Stars</option>
                            <option value="5">5 Stars</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    @if (Auth::check())
                        <button type="submit" class="btn btn-primary">Save Testimonial</button>
                    @else
                        <button type="button" class="btn btn-primary"
                            onclick="window.location.href='{{ route('login') }}'">
                            Save Testimonial
                        </button>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
