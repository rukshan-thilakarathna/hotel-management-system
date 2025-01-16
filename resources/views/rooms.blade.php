<style>

    .hero-content{
        margin-bottom: 130px;
    }

    @media (max-width: 768px) {
    .hero-content {
        margin-bottom: -25px;
    
    }
}

</style>
<x-app-layout>
    <section class="hero-section position-relative text-white text-center d-flex font3" style="display: flex; height: 65vh; background: url('{{ asset('images/bg.jpg') }}') center/cover no-repeat;">
        <div class="container h-100 d-flex flex-column justify-content-center align-items-center">
             <!-- Hero Text -->
             <div class="hero-section d-flex justify-content-center align-items-center vh-100">
                 <div class="hero-content mt-auto">
                     <h1 class="display-4 fw-bold">Rooms</h1>
                     <p class="lead">Home/Rooms</p>
                 </div>
             </div>
 
             @include('layouts.booking-form')
        </div>
    </section>

    <!-- Rooms Section -->
    <section id="rooms" class="py-5">
        <div class="container">
            <div class="row">
                <!-- Left Side Filters -->
                <div class="col-lg-3 mb-5">
                    @include('components.room-filters')
                </div>

                <!-- Right Side Room List -->
                <div class="col-lg-9">
                    @foreach ($rooms as $room)
                        @include('components.room-card', ['SetAttributes' => true])
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    <script>
        function Onchangef() {
            document.getElementById("bookingFilter").submit();
        }
    </script>

    
</x-app-layout>
