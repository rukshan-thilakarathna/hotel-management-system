<x-app-layout>
     <!-- Hero Section -->
     <section class="hero-section position-relative text-white text-center d-flex" style="display: flex; height: 50vh; background: url('{{ asset('images/bg.jpg') }}') center/cover no-repeat;">
        <div class="container h-100 d-flex flex-column justify-content-center align-items-center">
            <!-- Hero Text -->
            <div class="hero-section d-flex justify-content-center align-items-center vh-100">
                <div class="hero-content text-center">
                    <h1 class="display-4 fw-bold">About Us</h1>
                    <p class="lead">Home/About Us</p>
                </div>
            </div>
        </div>
    </section>





    <section id="about" class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left Column: Image -->
                <div class="col-lg-6">
                    <img src="{{ asset('images/ABOUT2.jpg') }}" alt="About Tranquil Trails" class="img-fluid rounded shadow-lg">
                </div>

                <!-- Right Column: Text Content -->
                <div class="col-lg-6">
                    <h2 class="fw-bold text-dark">About Tranquil Trails</h2>
                    <p class="text-muted">
                        Nestled in the serene beauty of Dambulla, Tranquil Trails offers a perfect harmony between luxury and nature. Our resort provides an escape from the chaos of everyday life, delivering unparalleled comfort and indulgence.
                    </p>
                    <p class="text-muted">
                        From breathtaking landscapes to elegantly designed rooms, our resort is crafted to create unforgettable experiences for every guest. Whether you seek relaxation or adventure, Tranquil Trails is the ideal destination.
                    </p>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> World-class dining experiences</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Luxurious accommodations</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Stunning natural surroundings</li>
                    </ul>
                    <a href="#rooms" class="btn btn-success mt-3">Discover More</a>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>