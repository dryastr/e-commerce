@extends('layouts-web.main')

@section('title', 'E-Commerce')

@push('header-styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Righteous&display=swap');

        .righteous-regular {
            font-family: "Righteous", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        .title-jumbotron {
            font-size: 100px;
            line-height: 127px;
        }

        @media (max-width: 992px) {
            .title-jumbotron {
                font-size: 80px;
                line-height: 100px;
            }

            .hero-header {
                padding-top: 200px !important;
            }
        }

        @media (max-width: 768px) {
            .title-jumbotron {
                font-size: 60px;
                line-height: 80px;
            }
        }

        @media (max-width: 576px) {
            .title-jumbotron {
                font-size: 40px;
                line-height: 50px;
            }

            .hero-header img {
                display: none;
            }
        }
    </style>
@endpush

@section('content')
    <div class="hero-header overflow-hidden px-5" id="jumbotron">
        <div class="row gy-5 align-items-center justify-content-between">
            <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                <h4 class="mb-1 text-dark righteous-regular">Email Marketing</h4>
                <h1 class="title-jumbotron text-dark mb-4 wow fadeInUp righteous-regular" data-wow-delay="0.3s"
                    style="">HomeMade</h1>
                <p class="fs-5 mb-4 wow fadeInUp" style="text-align: justify" data-wow-delay="0.5s">Selamat datang di Dazzleen Food! Kami bangga menjadi
                    pilihan utama Anda untuk memesan makanan dengan sistem pre-order. Di sini, Anda dapat dengan mudah
                    mengelola pesanan, melihat menu terbaru, dan memanfaatkan berbagai fitur untuk pengalaman berbelanja
                    yang lebih baik. Terima kasih telah memilih Dazzleen Food, dan selamat menikmati layanan kami yang
                    cepat, mudah, dan terpercaya!</p>
                <a href="https://wa.me/6281298781633" target="_blank"
                    class="btn btn-primary rounded-pill py-3 px-5 wow fadeInUp" data-wow-delay="0.7s">
                    <i class="bi bi-whatsapp"></i>
                    Hubungi Kami
                </a>
            </div>
            <div class="col-lg-6 wow fadeInRight d-flex text-center align-items-center justify-content-center m-auto"
                data-wow-delay="0.2s" style="width: 20rem;">
                <img src="{{ asset('assets-web/img/konten/hero.png') }}" class="img-fluid w-100 h-100" alt="">
            </div>
        </div>
    </div>

    <!-- About Start -->
    @include('user.group-section.about')
    <!-- About End -->

    <!-- Product Start -->
    @include('user.group-section.product')
    <!-- Product End -->

    <!-- Service Start -->
    @include('user.group-section.service')
    <!-- Service End -->

    <!-- Feature Start -->
    @include('user.group-section.feature')
    <!-- Feature End -->

    <!-- FAQ Start -->
    @include('user.group-section.faq')
    <!-- FAQ End -->

    <!-- Testimonial Start -->
    @include('user.group-section.testimoni')
    <!-- Testimonial End -->
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.blog-slider').slick({
                infinite: false,
                slidesToShow: 4,
                slidesToScroll: 4,
                autoplay: false,
                autoplaySpeed: 2000,
                arrows: false,
                dots: false,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 4,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });
        });

        $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
            $('.blog-slider').slick('setPosition');
        });
    </script>
@endpush
