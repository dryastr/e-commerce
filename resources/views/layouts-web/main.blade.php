<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700&family=Rubik:wght@400;500&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets-web/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-web/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-web/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets-web/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets-web/css/style.css') }}" rel="stylesheet">

    @stack('header-styles')
</head>

<body>

    <!-- Navbar & Hero Start -->
    <div class="container-fluid header position-relative overflow-hidden p-0">
        {{-- Navbar --}}
        @include('layouts-web.navbar')

        @yield('content')

        <!-- Footer Start -->
        @include('layouts-web.footer')
        <!-- Footer End -->


        <!-- Copyright Start -->
        <div class="container-fluid copyright py-4">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-md-6 text-center text-md-start mb-md-0">
                        <span class="text-white"><a href="#"><i class="fas fa-copyright text-light me-2"></i>Dazzleenfood</a>, All right reserved.</span>
                    </div>
                    <div class="col-md-6 text-center text-md-end text-white">
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a> Distributed By
                        <a class="border-bottom" href="https://themewagon.com">ThemeWagon</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>


        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('assets-web/lib/wow/wow.min.js') }}"></script>
        <script src="{{ asset('assets-web/lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('assets-web/lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('assets-web/lib/counterup/counterup.min.js') }}"></script>
        <script src="{{ asset('assets-web/lib/owlcarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets-web/lib/lightbox/js/lightbox.min.js') }}"></script>


        <!-- Template Javascript -->
        <script src="{{ asset('assets-web/js/main.js') }}"></script>

        @stack('scripts')
</body>

</html>
