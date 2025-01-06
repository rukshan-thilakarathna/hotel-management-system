<!-- Hero Section -->
<section class="hero-section position-relative text-white text-center d-flex">
    <div class="container h-100 d-flex flex-column justify-content-center align-items-center">
        <!-- Navigation Bar -->
        <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand" href="/">
            <img src="{{ asset('images/LOGO.jpg') }}" alt="Logo" width="80" height="80">
        </a>
      
        <!-- Toggle button for small screens -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon bg-white"></span>
        </button>

        <!-- Navbar items -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('rooms') }}">ROOMS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/dining">DINING</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">CONTACT</a>
                </li>
            </ul>

            <!-- Buttons -->
            <div class="d-flex">
                <a href="{{route('rooms')}}" type="button" class="btn btn-success me-2">BOOK NOW</a>
                <a href="{{route('login')}}" type="button" class="btn btn-success">LOGIN</a>
            </div>
        </div>
    </div>
</nav>

    </div>
</section>
