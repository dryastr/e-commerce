<div class="container-fluid blog py-5" id="product">
    <div class="container py-5">
        <div class="text-center mx-auto mb-5" style="max-width: 900px;">
            <h4 class="text-primary righteous-regular">Our Product</h4>
            <h1 class="display-5 mb-4 righteous-regular">Lorem ipsum dolor sit.</h1>
            <p class="mb-0">Dolor sit amet consectetur, adipisicing elit. Ipsam, beatae maxime. Vel animi eveniet
                doloremque reiciendis soluta iste provident non rerum illum perferendis earum est architecto dolores
                vitae quia vero quod incidunt culpa corporis, porro doloribus. Voluptates nemo doloremque cum.
            </p>
        </div>

        <!-- Tabs -->
        <ul class="nav nav-tabs justify-content-start mb-4" id="blogTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active righteous-regular" id="tab1-tab" data-bs-toggle="tab" href="#tab1" role="tab"
                    aria-controls="tab1" aria-selected="true">Tab 1</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="tab2-tab righteous-regular" data-bs-toggle="tab" href="#tab2" role="tab"
                    aria-controls="tab2" aria-selected="false">Tab 2</a>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content" id="blogTabContent">
            <!-- Tab 1 Content -->
            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                <div class="blog-slider">
                    <div class="blog-item" style="margin-right: 15px;">
                        <div class="blog-img">
                            <img src="https://assets-a1.kompasiana.com/items/album/2023/06/12/nasi-goreng-indonesian-fried-rice-sugar-spice-more-6486e9184d498a53171a2c62.jpeg"
                                class="img-fluid w-100" alt="">
                            <img src="{{ asset('assets-web/img/konten/best_seller.png') }}"
                                style="position: absolute; top: 0; transform: none; z-index: 1; left: 15px;"
                                alt="">
                            <div class="blog-info">
                                <span><i class="fa fa-clock"></i> Dec 01.2024</span>
                                <div class="d-flex">
                                    <span class="me-3"> 3 <i class="fa fa-heart"></i></span>
                                    <a href="#" class="text-white">0 <i class="fa fa-comment"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="blog-content text-dark border p-4">
                            <h5 class="mb-4">Dolor, sit amet consectetur adipisicing</h5>
                            <p class="mb-4">Lorem ipsum dolor sit amet consectur adip sed eiusmod amet consectur adip.
                            </p>
                            <a class="btn btn-light rounded-pill py-2 px-4" href="#">Read More</a>
                        </div>
                    </div>
                    <!-- Repeat for other cards in Tab 1 -->
                </div>
            </div>

            <!-- Tab 2 Content -->
            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                <div class="blog-slider">
                    <div class="blog-item" style="margin-right: 15px;">
                        <div class="blog-img">
                            <img src="https://assets-a1.kompasiana.com/items/album/2023/06/12/nasi-goreng-indonesian-fried-rice-sugar-spice-more-6486e9184d498a53171a2c62.jpeg"
                                class="img-fluid w-100" alt="">
                            <img src="{{ asset('assets-web/img/konten/best_seller.png') }}"
                                style="position: absolute; top: 0; transform: none; z-index: 1; left: 15px;"
                                alt="">
                            <div class="blog-info">
                                <span><i class="fa fa-clock"></i> Dec 01.2024</span>
                                <div class="d-flex">
                                    <span class="me-3"> 3 <i class="fa fa-heart"></i></span>
                                    <a href="#" class="text-white">0 <i class="fa fa-comment"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="blog-content text-dark border p-4">
                            <h5 class="mb-4">Dolor, sit amet consectetur adipisicing</h5>
                            <p class="mb-4">Lorem ipsum dolor sit amet consectur adip sed eiusmod amet consectur adip.
                            </p>
                            <a class="btn btn-light rounded-pill py-2 px-4" href="#">Read More</a>
                        </div>
                    </div>
                    <!-- Repeat for other cards in Tab 1 -->
                </div>
            </div>
        </div>
    </div>
</div>
