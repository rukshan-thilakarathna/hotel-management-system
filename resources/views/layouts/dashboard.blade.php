 <!-- Hero Section -->
 <section class="hero-section position-relative text-white text-center d-flex font3" style="display: flex; height: 70vh; background: url('{{ asset('images/bg.jpg') }}') center/cover no-repeat;">
    <div class="container h-100 d-flex flex-column justify-content-center align-items-center">
         <!-- Hero Text -->
         <div class="hero-section d-flex justify-content-center align-items-center vh-100">
             <div class="hero-content mt-auto">
                 <h1 class="display-4 fw-bold">WELCOME TO YOUR DASHBOARD</h1>
                 <p class="lead">Book Your Stay Today</p>
             </div>
         </div>

         @include('layouts.booking-form')
    </div>
</section>

<nav class="navbar1 navbar-expand-lg navbar-light bg-light shadow-sm font3">
    <div class="container-fluid">
        <div class="navbar-collapse justify-content-center">
            <ul class="navbar-nav flex-column flex-lg-row">
                <li class="nav-item">
                    <a class="nav-link text-black fw-semibold d-flex align-items-center py-3 px-4 rounded border border-0 transition-all duration-200 hover-shadow-lg" href="{{ route('dashboard') }}" style="font-size: 1.2rem;">
                        <i class="fas fa-home text-primary me-3" style="font-size: 1.5rem;"></i>
                        <span style="color:black;">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item ms-3">
                    <a class="nav-link text-black fw-semibold d-flex align-items-center py-3 px-4 rounded border border-0 transition-all duration-200 hover-shadow-lg" href="{{ route('my-bookings') }}" style="font-size: 1.2rem;">
                        <i class="fas fa-ticket-alt text-success me-3" style="font-size: 1.5rem;"></i>
                        <span style="color:black;">My Bookings</span>
                    </a>
                </li>
                <li class="nav-item ms-3">
                    <a class="nav-link text-black fw-semibold d-flex align-items-center py-3 px-4 rounded border border-0 transition-all duration-200 hover-shadow-lg" href="/profile" style="font-size: 1.2rem;">
                        <i class="fas fa-user-circle text-warning me-3" style="font-size: 1.5rem;"></i>
                        <span style="color:black;">Profile</span>
                    </a>
                </li>
                <li class="nav-item ms-3">
                    <a class="nav-link text-black fw-semibold d-flex align-items-center py-3 px-4 rounded border border-0 transition-all duration-200 hover-shadow-lg" href="/logout" style="font-size: 1.2rem;">
                        <i class="fas fa-sign-out-alt text-danger me-3" style="font-size: 1.5rem;"></i>
                        <span style="color:black;">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>



 