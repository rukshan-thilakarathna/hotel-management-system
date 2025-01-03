 <!-- Hero Section -->
 <section class="hero-section position-relative text-white text-center d-flex">
    <div class="container h-100 d-flex flex-column justify-content-center align-items-center">
        <!-- Navigation Bar -->
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <!-- Toggle button for small screens -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon bg-white"></span>
                </button>

                <!-- Navbar items -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" href="/"><i class="bi bi-list fs-1"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about">ABOUT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/rooms">ROOMS</a>
                        </li>
                        <li class="nav-item text-center">
                            <a class="navbar-brand" href="#">
                                <img src="{{ asset('images/LOGO.jpg') }}" alt="Logo" width="60" height="60">
                            </a>
                            <div class="brand-text">TRANQUIL TRAILS</div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/dining">DINING</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/contact">CONTACT</a>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="btn btn-success">BOOK NOW</button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</section>