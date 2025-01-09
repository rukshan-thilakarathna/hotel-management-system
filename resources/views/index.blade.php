<x-app-layout>
    <!-- Hero Section -->
    <section class="hero-section position-relative text-white text-center d-flex font3" style="display: flex; height: 100vh; background: url('{{ asset('images/bg.jpg') }}') center/cover no-repeat;margin-bottom: -40px;">
       <div class="container h-100 d-flex flex-column justify-content-center align-items-center">
           <!-- Hero Text -->
           <div class="hero-section d-flex justify-content-center align-items-center vh-100">
               <div class="hero-content mt-auto" style="margin:50% auto;">
                   <h1 class="display-4 fw-bold">WHERE NATURE MEETS LUXURY</h1>
                   <p class="lead">Book Your Stay Today</p>
               </div>
           </div>

           

       </div>
   </section>
   @include('layouts.booking-form')

   <!-- Resort Section -->
   <section class="container py-5 font3" style="background: url('{{ asset('images/') }}') no-repeat center center; background-size: cover;">
       <div class="row align-items-center">
           <!-- Text Content -->
           <div class="col-md-6 col-12 mb-4 mb-md-0">
           <h5 class="text-uppercase text-muted fw-bold mb-3 main-font">Tranquil Trails</h5>

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

   <!-- Rooms Section -->
   <section class="container py-5 mt-5 font3">
       <h5 class="text-uppercase text-muted fw-bold mb-2">Rooms</h5>
       <h2 class="text-muted fw-bold mb-4" style="font-size: 40px;">Experience the perfect blend of comfort and luxury <br>in our beautifully designed rooms</h2>

       <div id="roomCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
       <div class="carousel-inner">
           @foreach ($rooms as $key => $room)
               @php
                   $images = json_decode($room->image, true) ?? [];
               @endphp
               <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                   <img src="{{ asset('storage/rooms/' . $images[0]) }}" 
                        class="d-block w-100 img-fluid rounded" 
                        style="max-height: 650px; object-fit: cover;" 
                        alt="Room Image">
                   <div class="carousel-caption bg-dark bg-opacity-50 rounded">
                       <div class="d-flex justify-content-center gap-2 flex-wrap">
                           @foreach ($rooms as $index => $room)
                               <button class="btn btn-outline-light btn-sm" data-bs-target="#roomCarousel" data-bs-slide-to="{{ $index }}">
                                   ROOM {{ str_pad($room->number, 2, '0', STR_PAD_LEFT) }}
                               </button>
                           @endforeach
                       </div>
                   </div>
               </div>
           @endforeach
       </div>

       <!-- Carousel Controls -->
       <button class="carousel-control-prev" type="button" data-bs-target="#roomCarousel" data-bs-slide="prev">
           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
           <span class="visually-hidden">Previous</span>
       </button>
       <button class="carousel-control-next" type="button" data-bs-target="#roomCarousel" data-bs-slide="next">
           <span class="carousel-control-next-icon" aria-hidden="true"></span>
           <span class="visually-hidden">Next</span>
       </button>
   </div>
       

       <!-- Description Text -->
       <p class="mb-4" style="font-size: 20px;">
           Lorem ipsum dolor sit amet consectetur. Ut sed proin odio bibendum euismod. Pellentesque nunc pellentesque quis
           integer et pulvinar porttitor nam tincidunt. Ut sed proin odio bibendum euismod. Pellentesque nunc pellentesque
           quis integer et pulvinar porttitor nam tincidunt. Lorem ipsum dolor sit amet consectetur. Ut sed proin odio
           bibendum euismod. Pellentesque nunc pellentesque quis integer et pulvinar porttitor nam tincidunt.
       </p>

       <!-- See More Link -->
       <a href="#"  class="fw-bold custom-color">SEE MORE...</a>
   </section>

   <!-- Dining Section -->
   <section 
       style="background: url('{{ asset('images/dining.jpg') }}') no-repeat center center; background-size: cover; font3">
       <div class="py-5 font3">
           <div class="container">
               <div class="row justify-content-center">
                   <div class="col-lg-10">
                       <!-- Card Wrapper -->
                       <div class="card shadow-lg border-0" style="background-color: rgba(255, 255, 255, 0.9);">
                           <div class="card-body p-5">
                               <div class="row align-items-center">
                                   <!-- Text Section -->
                                   <div class="col-lg-6 col-md-12 mb-4">
                                       <h3 class="text-muted text-uppercase fw-bold mb-2">Dining at our Hotel</h3>
                                       <h1 class="text-muted  text-dark fw-bold mb-4" style="font-size: 40px;">Fresh ingredients, Bold flavors, Unforgettable dining</h1>
                                       <p class="mb-4 custom-color" style="font-size: 20px;">
                                           Lorem ipsum dolor sit amet consectetur. Sapien id diam nulla molestie justo quisque maecenas.
                                           Quis nulla feugiat eu magna mi amet. Erat nunc ut auctor id suscipit cursus purus lacinia
                                           donec. Turpis et mattis pellentesque orci dapibus turpis cras viverra suspendisse. Dolor proin
                                           laoreet quis laoreet blandit egestas purus eget.
                                       </p>
                                       <a href="#" class="fw-bold custom-color">SEE MORE...</a>
                                   </div>

                                   <!-- Images Section -->
                                   <div class="col-lg-6 col-md-12">
                                       <div class="row g-3">
                                           <div class="col-6">
                                               <div class="position-relative">
                                                   <img src="{{ asset('images/food1.jpg') }}" alt="Sri Lankan Dish"
                                                       class="img-fluid rounded shadow">
                                                   <div
                                                       class="position-absolute bottom-0 start-0 w-100 bg-black bg-opacity-70 text-white text-center py-2">
                                                       SRI LANKAN
                                                   </div>
                                               </div>
                                           </div>

                                           <div class="col-6">
                                               <div class="position-relative">
                                                   <img src="{{ asset('images/food2.jpg') }}" alt="Italian Dish"
                                                       class="img-fluid rounded shadow">
                                                   <div
                                                       class="position-absolute bottom-0 start-0 w-100 bg-black bg-opacity-70 text-white text-center py-2">
                                                       ITALIAN
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <!-- End Card Wrapper -->
                   </div>
               </div>
           </div>
       </div>
   </section>

   <!-- Nearby Attraction Section -->
   <section class="container py-5 mt-5 font3">
       <!-- Section Title and Text Content -->
       <div class="row align-items-center">
           <!-- Text Content (Left Aligned) -->
           <div class="col-md-6">
               <h2 class="text-muted fw-bold mb-3" style="font-size: 40px;">Nearby Attraction</h2>
               <p class="mb-4" style="font-size: 20px;">
                   Lorem ipsum dolor sit amet consectetur. At erat facilisis in nisi non varius quam. Dictum porttitor neque enim integer rutrum. 
                   Diam adipiscing et integer porttitor auctor sem. Dictum facilisis quisque pellentesque pretium iaculis diam. A id feugiat at eu posuere nam et gravida scelerisque. 
                   Aliquet congue non egestas lacinia. Egestas quis adipiscing sed nibh viverra vestibulum.
               </p>
               <a href="#"  class="fw-bold custom-color">SEE MORE...</a>
           </div>

           <!-- Image Slider (Right Aligned) -->
           <div class="col-md-6">
               <div id="attractionCarousel" class="carousel slide" data-bs-ride="carousel">
                   <div class="carousel-inner">
                       <!-- First Slide -->
                       <div class="carousel-item active">
                           <img src="{{ asset('images/sl1.jpg') }}" class="d-block w-100 rounded" alt="Attraction 1">
                       </div>
                       <!-- Second Slide -->
                       <div class="carousel-item">
                           <img src="{{ asset('images/sl2.jpg') }}" class="d-block w-100 rounded" alt="Attraction 2">
                       </div>
                       <!-- Third Slide -->
                       <div class="carousel-item">
                           <img src="{{ asset('images/sl3.jpg') }}" class="d-block w-100 rounded" alt="Attraction 3">
                       </div>
                   </div>
                   
                   <!-- Carousel Controls -->
                   <button class="carousel-control-prev" type="button" data-bs-target="#attractionCarousel" data-bs-slide="prev">
                       <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                       <span class="visually-hidden">Previous</span>
                   </button>
                   <button class="carousel-control-next" type="button" data-bs-target="#attractionCarousel" data-bs-slide="next">
                       <span class="carousel-control-next-icon" aria-hidden="true"></span>
                       <span class="visually-hidden">Next</span>
                   </button>
               </div>
           </div>
       </div>
   </section>

   <section class="container py-5 mt-5 font3">
       <!-- Section Title -->
       <div class="text-center mb-4">
           <h5 class="text-uppercase text-muted fw-bold">Client Testimonial</h5>
           <h2 class="fw-bold mt-5" style="font-size: 40px;">Hear from Our Happy Customers</h2>
       </div>

       <!-- Carousel Slider -->
       <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
           <div class="carousel-inner">
               <!-- First Slide -->
               <div class="carousel-item active mt-5">
                   <div class="row justify-content-center align-items-center text-center">
                       <div class="col-lg-4 col-md-6 mb-4">
                           <img src="{{ asset('images/c1.jpg') }}" class="rounded-circle mb-3 mx-auto d-block" alt="Navod Liyanage" style="width:120px; height:120px; object-fit:cover;">
                           <h5 class="fw-bold mb-1">Navod Liyanage</h5>
                           <p class="text-warning mb-1">
                               <i class="fas fa-star"></i>
                               <i class="fas fa-star"></i>
                               <i class="fas fa-star"></i>
                               <i class="fas fa-star"></i>
                               <i class="fas fa-star"></i>
                           </p>
                           <p class="text-muted">
                               Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis.
                           </p>
                       </div>
                       <div class="col-lg-4 col-md-6 mb-4">
                           <img src="{{ asset('images/c2.jpg') }}" class="rounded-circle mb-3 mx-auto d-block" alt="Kasun Perera" style="width:120px; height:120px; object-fit:cover;">
                           <h5 class="fw-bold mb-1">Kasun Perera</h5>
                           <p class="text-warning mb-1">
                               <i class="fas fa-star"></i>
                               <i class="fas fa-star"></i>
                               <i class="fas fa-star"></i>
                               <i class="fas fa-star"></i>
                               <i class="fas fa-star"></i>
                           </p>
                           <p class="text-muted">
                               Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis.
                           </p>
                       </div>
                       <div class="col-lg-4 col-md-6 mb-4">
                           <img src="{{ asset('images/c3.jpg') }}" class="rounded-circle mb-3 mx-auto d-block" alt="Sandun Perera" style="width:120px; height:120px; object-fit:cover;">
                           <h5 class="fw-bold mb-1">Sandun Perera</h5>
                           <p class="text-warning mb-1">
                               <i class="fas fa-star"></i>
                               <i class="fas fa-star"></i>
                               <i class="fas fa-star"></i>
                               <i class="fas fa-star"></i>
                               <i class="fas fa-star-half-alt"></i>
                           </p>
                           <p class="text-muted">
                               Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis.
                           </p>
                       </div>
                   </div>
               </div>

               <!-- Additional slides can be added here in similar structure -->
           </div>

           <!-- Carousel Controls -->
           <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
               <span class="visually-hidden">Previous</span>
           </button>
           <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
               <span class="carousel-control-next-icon" aria-hidden="true"></span>
               <span class="visually-hidden">Next</span>
           </button>
       </div>
   </section>

</x-app-layout>