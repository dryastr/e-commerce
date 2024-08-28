<nav class="navbar navbar-expand-lg fixed-top navbar-light px-4 px-lg-5 py-3 py-lg-0">
    <a href="/" class="navbar-brand p-0">
        <img src="{{ asset('assets-web/img/logo/logo-landing.png') }}" alt="Logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="#jumbotron" class="nav-item nav-link active">Home</a>
            <a href="#about" class="nav-item nav-link">About</a>
            <a href="#product" class="nav-item nav-link">Menu</a>
            <a href="#service" class="nav-item nav-link">Services</a>
            <a href="#faq" class="nav-item nav-link">FaQ's</a>
            <a href="#testimoni" class="nav-item nav-link">Testimoni</a>
            <a href="#contact" class="nav-item nav-link">Contact Us</a>
        </div>
        <!-- Check if the user is not authenticated -->
        @guest
            <a href="{{ route('login') }}"
                class="btn btn-light border border-primary rounded-pill text-primary py-2 px-4 me-4">
                Log In
            </a>
            <a href="{{ route('register') }}" class="btn btn-primary rounded-pill text-white py-2 px-4">
                Sign Up
            </a>
        @endguest

        <!-- Check if the user is authenticated -->
        @auth
            <a class="btn btn-primary rounded-pill text-white py-2 px-4" href="{{ route('logout') }}"
                onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">
                Log Out
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        @endauth
    </div>
</nav>
