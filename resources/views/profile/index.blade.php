<x-app-layout>

    @include('layouts.dashboard')
   
    <section class="container my-5">
        <div class="row">
            <!-- Image Section -->
            <div class="col-lg-6">
                <img src="{{ asset('images/room1.jpg') }}" alt="Room Image" class="img-fluid rounded shadow">
            </div>

            <!-- Details and Facilities Section -->
            <div class="col-lg-6">
                <h2 class="fw-bold">Room 01</h2>
                <p>Lorem ipsum dolor sit amet consectetur. Eget risus dignissim vel in ultricies eu faucibus. Velit vitae suspendisse cum facilisis mauris leo orci tortor.</p>

                <!-- Room Details -->
                <div class="mb-4">
                    <div class="d-flex align-items-center mb-2">
                        <i class="bi bi-person-fill me-2"></i>
                        <span>UP to 02 Guests</span>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <i class="bi bi-rulers me-2"></i>
                        <span>20 m²</span>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <i class="bi bi-cash me-2"></i>
                        <span>
                            <strong>$20.00</strong> / Night (02 Guests)
                        </span>
                    </div>
                </div>

                <!-- Facilities Section -->
                <h5 class="fw-bold">Facilities</h5>
                <ul class="list-unstyled">
                    <li class="d-flex align-items-center mb-2">
                        <i class="bi bi-bed me-2"></i>
                        King Size Bed
                    </li>
                    <li class="d-flex align-items-center mb-2">
                        <i class="bi bi-wifi me-2"></i>
                        Wi-Fi
                    </li>
                    <li class="d-flex align-items-center mb-2">
                        <i class="bi bi-thermometer-half me-2"></i>
                        Air Condition
                    </li>
                    <li><a href="#" class="text-decoration-none">More Facilities</a></li>
                </ul>
            </div>
        </div>
    </section>

</x-app-layout>