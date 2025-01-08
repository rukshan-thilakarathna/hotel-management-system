<!-- Hero Section -->
<section class="hero-section position-relative text-white text-center d-flex font3" id="booking-form-ss">
    <div class="container h-100 d-flex flex-column justify-content-center align-items-center">
        <!-- Navigation Bar -->
        <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand" href="/">
            <img src="{{ asset('images/Logo.png') }}" alt="Logo" width="80" height="80">
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
                <a href="{{route('rooms')}}" type="button" class="btn btn-success me-2 new-btn-color">BOOK NOW</a>
                @if (Route::has('login'))
                    
                    @auth
                         <a href="{{ url('/dashboard') }}" type="button" class="btn btn-success new-btn-color">DASHBOARD</a>
                    @else
                        <a href="{{ route('login') }}" type="button" class="btn btn-success new-btn-color">LOGIN / REGISTER</a>
                    @endauth
                @endif
            </div>
        </div>
    </div>
</nav>

    </div>
</section>
