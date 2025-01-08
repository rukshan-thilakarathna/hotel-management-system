<x-app-layout>

    @include('layouts.dashboard')

    <style>
        
    </style>

 <section class="container py-5 font3">
    <h1 class="text-muted py-5 text-center text-black fw-bold" style="font-size:40px;">Thank You For Choosing Us</h1>
        <div class="row align-items-center">
            <!-- Text Content -->
            <div class="col-md-6 col-12 mb-4 mb-md-0">
            <h5 class="text-uppercase text-muted fw-bold mb-3">Tranquil Trails</h5>

                <h2 class="text-muted fw-bold mb-4" style="font-size: 40px;">Relax in our Resort</h2>
                <p class="mb-4 ms-2"style="font-size: 20px;">
                    Lorem ipsum dolor sit amet consectetur. A est ultrices magna at ultrices dictumst netus elit leo.
                    Lectus facilisi mattis eu feugiat etiam faucibus lectus ut tincidunt. Sit commodo pharetra elementum
                    turpis. Aliquam amet at semper turpis id nunc facilisis. Gravida sit nam sed faucibus ut molestie
                    molestie at. Commodo quam facilisis eget morbi tristique dictum. Facilisi dignissim lacus scelerisque
                    velit amet et hendrerit. Adipiscing vitae mi varius eGlit facilisis sed vel. Id nam varius non et libero
                    amet libero. Fermentum commodo nulla amet venenatis phasellus nibh. Auctor magnis consectetur porta
                    convallis in auctor etiam. Quam tortor sit erat purus et.
                </p>
                <a href="#" class="fw-bold custom-color">SEE MORE...</a>
            </div>
            <!-- Images -->
            <div class="col-md-6 col-12 position-relative mt-5">
                <div class="d-flex flex-column flex-md-row align-items-center justify-content-center gap-3">
                    <img src="{{ asset('images/ABOUT2.jpg') }}" alt="Resort Image 1" class="img-fluid shadow" style="max-width: 45%;">
                    <img src="{{ asset('images/about1.jpg') }}" alt="Resort Image 2" class="img-fluid shadow" style="max-width: 55%; height: auto;">
                </div>
            </div>
        </div>
    </section>

</x-app-layout>