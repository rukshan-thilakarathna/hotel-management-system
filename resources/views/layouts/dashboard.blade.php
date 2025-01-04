 <!-- Hero Section -->
 <section class="hero-section position-relative text-white text-center d-flex" style="display: flex; height: 60vh; background: url('{{ asset('images/bg.jpg') }}') center/cover no-repeat;">
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


<nav class="navbar1 navbar-expand-lg navbar-light" style="background-color: #f5f5f5; border-bottom: 3px solid #0056b3;">
     <div class="container-fluid">
         <div class="navbar-collapse justify-content-center">
             <ul class="navbar-nav">
                 <li class="nav-item">
                     <a class="nav-link text-dark fw-semibold d-flex align-items-center py-2 px-3 rounded-3 border border-0 border-hover-primary transition-all duration-200 hover-shadow-lg" href="#" style="font-size: 1rem;">
                         <i class="fas fa-user text-primary me-2"></i>
                         <span class="d-none d-sm-inline text-black">Dashboard</span>
                     </a>
                 </li>
                 <li class="nav-item ms-4">
                     <a class="nav-link text-dark fw-semibold d-flex align-items-center py-2 px-3 rounded-3 border border-0 border-hover-primary transition-all duration-200 hover-shadow-lg" href="/checkout" style="font-size: 1rem;">
                         <i class="fas fa-ticket-alt text-primary me-2"></i>
                         <span class="d-none d-sm-inline text-black">My Bookings</span>
                     </a>
                 </li>
                 <li class="nav-item ms-4">
                     <a class="nav-link text-dark fw-semibold d-flex align-items-center py-2 px-3 rounded-3 border border-0 border-hover-primary transition-all duration-200 hover-shadow-lg" href="/profile" style="font-size: 1rem;">
                         <i class="fas fa-user text-primary me-2"></i>
                         <span class="d-none d-sm-inline text-black">Profile</span>
                     </a>
                 </li>
                 <li class="nav-item ms-4">
                     <a class="nav-link text-dark fw-semibold d-flex align-items-center py-2 px-3 rounded-3 border border-0 border-hover-primary transition-all duration-200 hover-shadow-lg" href="/logout" style="font-size: 1rem;">
                         <i class="fas fa-sign-out-alt text-primary me-2"></i>
                         <span class="d-none d-sm-inline text-black">Logout</span>
                     </a>
                 </li>
             </ul>
         </div>
         
     </div>
 </nav>