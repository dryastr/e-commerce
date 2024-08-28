<div class="container-fluid blog py-5" id="product">
    <div class="container py-5">
        <div class="text-center mx-auto mb-5" style="max-width: 900px;">
            <h4 class="text-primary righteous-regular">Our Menu</h4>
            <h1 class="display-5 mb-4 righteous-regular">Deliciously Crafted for You</h1>
            <p class="mb-0">Nikmati kelezatan dari produk makanan buatan tangan kami. Di Dazzleen Food, kami bangga
                menggunakan hanya bahan-bahan terbaik untuk menciptakan hidangan yang memanjakan lidah Anda. Apapun yang
                Anda inginkan, baik itu yang gurih maupun manis, pilihan kami yang beragam menjanjikan kehangatan dan
                kebahagiaan di setiap gigitan. Rasakan perbedaan dalam kualitas dan rasa—karena Anda layak mendapatkan
                yang terbaik.</p>
        </div>

        <!-- Tabs -->
        <ul class="nav nav-tabs justify-content-start mb-4" id="blogTab" role="tablist">
            @foreach ($categories as $index => $category)
                <li class="nav-item" role="presentation">
                    <a class="nav-link {{ $index === 0 ? 'active' : '' }} righteous-regular"
                        id="tab{{ $category->id }}-tab" data-bs-toggle="tab" href="#tab{{ $category->id }}"
                        role="tab" aria-controls="tab{{ $category->id }}"
                        aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach
        </ul>

        <!-- Tab Content -->
        <div class="tab-content" id="blogTabContent">
            @foreach ($categories as $index => $category)
                <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}" id="tab{{ $category->id }}"
                    role="tabpanel" aria-labelledby="tab{{ $category->id }}-tab">
                    <div class="blog-slider">
                        @foreach ($productsByCategory[$category->id] as $product)
                            <div class="blog-item" style="margin-right: 15px;">
                                <div class="blog-img">
                                    <img src="{{ asset('storage/' . $product->image_url) }}" class="img-fluid w-100"
                                        alt="">
                                    @if ($product->is_best_seller)
                                        <img src="{{ asset('assets-web/img/konten/best_seller.png') }}"
                                            style="position: absolute; top: 0; transform: none; z-index: 1; left: 15px;"
                                            alt="Best Seller">
                                    @endif
                                    <div class="blog-info">
                                        <span><i class="fa fa-clock"></i>
                                            {{ $product->created_at->format('M d, Y') }}</span>
                                    </div>
                                </div>
                                <div class="blog-content text-dark border p-4">
                                    <h5 class="mb-4">{{ $product->name }}</h5>
                                    <p class="mb-4">{{ $product->description }}</p>
                                    <div class="rating mt-2">
                                        @for ($i = 1; $i <= $product->rating; $i++)
                                            <i class="bi bi-star-fill"></i>
                                        @endfor
                                        @for ($i = $product->rating + 1; $i <= 5; $i++)
                                            <i class="bi bi-star"></i>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
