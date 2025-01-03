<x-app-layout>
     <!-- Hero Section -->
     <section class="hero-section position-relative text-white text-center d-flex" style="display: flex; height: 80vh; background: url('{{ asset('images/bg.jpg') }}') center/cover no-repeat;">
        <div class="container h-100 d-flex flex-column justify-content-center align-items-center">
            <!-- Hero Text -->
            <div class="hero-section d-flex justify-content-center align-items-center vh-100">
                <div class="hero-content text-center">
                    <h1 class="display-4 fw-bold">Rooms</h1>
                    <p class="lead">Home/Rooms</p>
                </div>
            </div>
        </div>
    </section>





    <section id="rooms" class="py-5">
        <div class="container">
            <div class="row">
                <!-- Left Side Filters -->
                <div class="col-lg-3 mb-5">
                    <div class="card p-3 border rounded shadow-sm">
                        <h5 class="fw-bold mb-3">Search</h5>
                        <!-- Check-in and Check-out -->
                        <div class="mb-3">
                            <label for="checkin" class="form-label">Check-In</label>
                            <input type="date" id="checkin" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="checkout" class="form-label">Check-Out</label>
                            <input type="date" id="checkout" class="form-control">
                        </div>
                        <!-- Filter Options -->
                        <h6 class="fw-bold mt-4">Filters</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="ac">
                            <label class="form-check-label" for="ac">AC</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="nonac">
                            <label class="form-check-label" for="nonac">Non-AC</label>
                        </div>
                        <!-- Beds -->
                        <div class="mt-3">
                            <label for="beds" class="form-label">Beds</label>
                            <select class="form-select" id="beds">
                                <option value="1">1 Bed</option>
                                <option value="2">2 Beds</option>
                                <option value="3">3 Beds</option>
                                <option value="4">4 Beds</option>
                            </select>
                        </div>
                        <!-- Price Range -->
                        <div class="mt-3">
                            <label for="minprice" class="form-label">Min Price ($)</label>
                            <input type="number" id="minprice" class="form-control" placeholder="0">
                        </div>
                        <div class="mt-3">
                            <label for="maxprice" class="form-label">Max Price ($)</label>
                            <input type="number" id="maxprice" class="form-control" placeholder="0">
                        </div>
                        <!-- Search Button -->
                        <div class="text-center mt-4">
                            <button class="btn btn-success w-100">Search</button>
                        </div>
                    </div>
                </div>

                <!-- Right Side Room List -->
                <div class="col-lg-9">
                    <!-- Room 1 -->
                    <div class="row mb-5 align-items-center">
                        <div class="col-lg-6">
                            <!-- Carousel for Room 1 -->
                            <div id="room1Carousel" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ asset('images/room1.jpg') }}" class="d-block w-100 rounded shadow-sm" alt="Room 1 - Image 1">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('images/room2.jpg') }}" class="d-block w-100 rounded shadow-sm" alt="Room 1 - Image 2">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('images/room3.jpg') }}" class="d-block w-100 rounded shadow-sm" alt="Room 1 - Image 3">
                                    </div>
                                </div>
                                <!-- Controls -->
                                <button class="carousel-control-prev" type="button" data-bs-target="#room1Carousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#room1Carousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex flex-column justify-content-center">
                            <h3 class="fw-bold">Room 01</h3>
                            <p class="text-muted">Lorem ipsum dolor sit amet consectetur. Eget risus dignissim vel in ultrices eu faucibus. Velit vitae suspendisse cum facilisis mauris leo orci tortor.</p>
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="bi bi-people-fill text-success me-2"></i> Up to 2 Guests</li>
                                <li class="mb-2"><i class="bi bi-arrows-fullscreen text-success me-2"></i> 20 m²</li>
                                <li class="mb-2"><i class="bi bi-currency-dollar text-success me-2"></i> $20.00 / Night</li>
                            </ul>
                            <button class="btn btn-success px-4 py-2 align-self-start">BOOK NOW</button>
                        </div>
                    </div>

                    <!-- Room 2 -->
                    <div class="row mb-5 align-items-center">
                        <div class="col-lg-6">
                            <!-- Carousel for Room 2 -->
                            <div id="room2Carousel" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ asset('images/room2.jpg') }}" class="d-block w-100 rounded shadow-sm" alt="Room 2 - Image 1">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('images/room1.jpg') }}" class="d-block w-100 rounded shadow-sm" alt="Room 2 - Image 2">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('images/room3.jpg') }}" class="d-block w-100 rounded shadow-sm" alt="Room 2 - Image 3">
                                    </div>
                                </div>
                                <!-- Controls -->
                                <button class="carousel-control-prev" type="button" data-bs-target="#room2Carousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#room2Carousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex flex-column justify-content-center">
                            <h3 class="fw-bold">Room 02</h3>
                            <p class="text-muted">Lorem ipsum dolor sit amet consectetur. Eget risus dignissim vel in ultrices eu faucibus. Velit vitae suspendisse cum facilisis mauris leo orci tortor.</p>
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="bi bi-people-fill text-success me-2"></i> Up to 2 Guests</li>
                                <li class="mb-2"><i class="bi bi-arrows-fullscreen text-success me-2"></i> 20 m²</li>
                                <li class="mb-2"><i class="bi bi-currency-dollar text-success me-2"></i> $20.00 / Night</li>
                            </ul>
                            <button class="btn btn-success px-4 py-2 align-self-start">BOOK NOW</button>
                        </div>
                    </div>

                    <!-- Room 3 -->
                    <div class="row mb-5 align-items-center">
                        <div class="col-lg-6">
                            <!-- Carousel for Room 3 -->
                            <div id="room3Carousel" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ asset('images/room3.jpg') }}" class="d-block w-100 rounded shadow-sm" alt="Room 3 - Image 1">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('images/room2.jpg') }}" class="d-block w-100 rounded shadow-sm" alt="Room 3 - Image 2">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('images/room1.jpg') }}" class="d-block w-100 rounded shadow-sm" alt="Room 3 - Image 3">
                                    </div>
                                </div>
                                <!-- Controls -->
                                <button class="carousel-control-prev" type="button" data-bs-target="#room3Carousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#room3Carousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex flex-column justify-content-center">
                            <h3 class="fw-bold">Room 03</h3>
                            <p class="text-muted">Lorem ipsum dolor sit amet consectetur. Eget risus dignissim vel in ultrices eu faucibus. Velit vitae suspendisse cum facilisis mauris leo orci tortor.</p>
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="bi bi-people-fill text-success me-2"></i> Up to 2 Guests</li>
                                <li class="mb-2"><i class="bi bi-arrows-fullscreen text-success me-2"></i> 20 m²</li>
                                <li class="mb-2"><i class="bi bi-currency-dollar text-success me-2"></i> $20.00 / Night</li>
                            </ul>
                            <button class="btn btn-success px-4 py-2 align-self-start">BOOK NOW</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>