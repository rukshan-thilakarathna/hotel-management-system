<x-app-layout>
    <section class="hero-section position-relative text-white text-center d-flex" style="display: flex; height: 60vh; background: url('{{ asset('images/bg.jpg') }}') center/cover no-repeat;">
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
                    <div class="card p-4 border rounded shadow-sm">
                        <h5 class="fw-bold mb-4 text-primary">Filters</h5>
                        <form id="bookingFilter" action="{{ route('rooms') }}" method="GET">
                            @csrf

                            <input type="hidden" name="filter" value="1">
                            <input type="hidden" name="dateRange" value="{{session('checkin_date')}} - {{session('checkout_date')}}">
                            
                            <!-- Beds -->
                            <div class="mb-3">
                                <label for="ac" class="form-label">AC Type</label>
                                <select onchange="Onchangef()" class="form-select" name="ac" id="ac">
                                    <option value="2" @if (isset($_GET['ac']) && $_GET['ac'] == 2) selected @endif>Both</option>
                                    <option value="1" @if (isset($_GET['ac']) && $_GET['ac'] == 1) selected @endif>AC</option>
                                    <option value="0" @if (isset($_GET['ac']) && $_GET['ac'] == 0) selected @endif>Non-AC</option>
                                </select>
                            </div>
                            

                            <div class="form-check mb-3">
                                <input onchange="Onchangef()" class="form-check-input" 
                                    <?= isset($_GET['free_wifi']) && $_GET['free_wifi'] == 1 ? 'checked' : '' ?> 
                                    type="checkbox" id="wifi" name="free_wifi" value="1">
                                <label class="form-check-label" for="wifi">Free WiFi</label>
                            </div>
                            <div class="form-check mb-3">
                                <input onchange="Onchangef()" class="form-check-input" 
                                    <?= isset($_GET['parking']) && $_GET['parking'] == 1 ? 'checked' : '' ?> 
                                    type="checkbox" id="parking" name="parking" value="1">
                                <label class="form-check-label" for="parking">Parking</label>
                            </div>
                            <div class="form-check mb-3">
                                <input onchange="Onchangef()" class="form-check-input" 
                                    <?= isset($_GET['restaurant']) && $_GET['restaurant'] == 1 ? 'checked' : '' ?> 
                                    type="checkbox" id="restaurant" name="restaurant" value="1">
                                <label class="form-check-label" for="restaurant">Restaurant</label>
                            </div>
                            <div class="form-check mb-3">
                                <input onchange="Onchangef()" class="form-check-input" 
                                    <?= isset($_GET['pet_friendly']) && $_GET['pet_friendly'] == 1 ? 'checked' : '' ?> 
                                    type="checkbox" id="pet_friendly" name="pet_friendly" value="1">
                                <label class="form-check-label" for="pet_friendly">Pet Friendly</label>
                            </div>
                            <div class="form-check mb-3">
                                <input onchange="Onchangef()" class="form-check-input" 
                                    <?= isset($_GET['room_service']) && $_GET['room_service'] == 1 ? 'checked' : '' ?> 
                                    type="checkbox" id="room_service" name="room_service" value="1">
                                <label class="form-check-label" for="room_service">Room Service</label>
                            </div>
                            <div class="form-check mb-3">
                                <input onchange="Onchangef()" class="form-check-input" 
                                    <?= isset($_GET['smoking']) && $_GET['smoking'] == 1 ? 'checked' : '' ?> 
                                    type="checkbox" id="smoking" name="smoking" value="1">
                                <label class="form-check-label" for="smoking">Smoking</label>
                            </div>
                            <div class="form-check mb-3">
                                <input onchange="Onchangef()" class="form-check-input" 
                                    <?= isset($_GET['wheelchair_accessible']) && $_GET['wheelchair_accessible'] == 1 ? 'checked' : '' ?> 
                                    type="checkbox" id="wheelchair_accessible" name="wheelchair_accessible" value="1">
                                <label class="form-check-label" for="wheelchair_accessible">Wheelchair Accessible</label>
                            </div>
                            <div class="form-check mb-3">
                                <input onchange="Onchangef()" class="form-check-input" 
                                    <?= isset($_GET['swimming_pool']) && $_GET['swimming_pool'] == 1 ? 'checked' : '' ?> 
                                    type="checkbox" id="swimming_pool" name="swimming_pool" value="1">
                                <label class="form-check-label" for="swimming_pool">Swimming Pool</label>
                            </div>
                            <div class="form-check mb-3">
                                <input onchange="Onchangef()" class="form-check-input" 
                                    <?= isset($_GET['hours_security']) && $_GET['hours_security'] == 1 ? 'checked' : '' ?> 
                                    type="checkbox" id="security" name="hours_security" value="1">
                                <label class="form-check-label" for="security">24 Hours Security</label>
                            </div>
                            <div class="form-check mb-3">
                                <input onchange="Onchangef()" class="form-check-input" 
                                    <?= isset($_GET['front_desk']) && $_GET['front_desk'] == 1 ? 'checked' : '' ?> 
                                    type="checkbox" id="front_desk" name="front_desk" value="1">
                                <label class="form-check-label" for="front_desk">24 Hour Front Desk</label>
                            </div>



                            
                            <!-- Beds -->
                            <div class="mb-3">
                                <label for="beds" class="form-label">Beds</label>
                                <select onchange="Onchangef()" class="form-select" name="bed" id="beds">
                                    <option @if (isset($_GET['bed']) && $_GET['bed'] == 1) selected @endif value="1">1 Bed</option>
                                    <option @if (isset($_GET['bed']) && $_GET['bed'] == 2) selected @endif value="2">2 Beds</option>
                                    <option @if (isset($_GET['bed']) && $_GET['bed'] == 3) selected @endif value="3">3 Beds</option>
                                    <option @if (isset($_GET['bed']) && $_GET['bed'] == 4) selected @endif value="4">4 Beds</option>
                                </select>
                            </div>
                            
                            <!-- Price Range -->
                            <div class="mb-3">
                                <label for="minprice" class="form-label">Min Price ({{env('CURRENCY')}})</label>
                                <input type="number" id="minprice" name="minprice" class="form-control"  placeholder="0">
                            </div>
                            <div class="mb-4">
                                <label for="maxprice" class="form-label">Max Price ({{env('CURRENCY')}})</label>
                                <input type="number" id="maxprice" name="maxprice" class="form-control" placeholder="0">
                            </div>
                            
                            <!-- Search Button -->
                            <button class="btn btn-outline-success btn-lg px-4 py-2 mt-auto w-100">Search</button>
                        </form>
                    </div>
                </div>

                <!-- Right Side Room List -->
                <div class="col-lg-9">
                    @foreach ($rooms as $room)
                        <div class="row mb-5 align-items-start shadow-sm border rounded overflow-hidden p-3">
                            <div class="col-lg-4 p-0">
                                <!-- Carousel for each Room -->
                                <div id="carouselRoom{{ $room->id }}" class="carousel slide h-100" data-bs-ride="carousel">
                                    <div class="carousel-inner h-100">
                                        @php
                                            $images = json_decode($room->image, true) ?? []; // Decode JSON images
                                        @endphp
                                        @foreach ($images as $index => $image)
                                            <div class="carousel-item h-100 {{ $index == 0 ? 'active' : '' }}">
                                                <img src="{{ asset('storage/rooms/' . $image) }}" 
                                                     class="d-block w-100 h-100 object-fit-cover" 
                                                     alt="Room {{ $room->id }} - Image {{ $index + 1 }}">
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- Controls -->
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselRoom{{ $room->id }}" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselRoom{{ $room->id }}" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-8 d-flex flex-column p-4">
                                <h2 class="fw-bold mb-3 text-primary" style="font-size: 25px;">Room Number - {{ $room->number }}</h2>
                                <p class="text-muted fs-5">{{ $room->description }}</p>
                                <div class="row mt-3 mb-4">
                                    <!-- First Column -->
                                    <div class="col-md-4">
                                        <ul class="list-unstyled">
                                            <li class="mb-2" style="display: flex; align-items: center;">
                                                <i class="material-icons text-success me-2" style="font-size: 20px;">group</i> {{ $room->adults }} Adults Guests
                                            </li>
                                            <li class="mb-2" style="display: flex; align-items: center;">
                                                <i class="material-icons text-success me-2" style="font-size: 20px;">child_care</i> {{ $room->children }} Children Guests
                                            </li>
                                            <li class="mb-2" style="display: flex; align-items: center;">
                                                <i class="material-icons text-success me-2" style="font-size: 20px;">square_foot</i> {{ $room->size }} ft
                                            </li>
                                            <li class="mb-2" style="display: flex; align-items: center;">
                                                <i class="material-icons text-success me-2" style="font-size: 20px;">attach_money</i> ${{ $room->price }} / Night
                                            </li>
                                            @if ($room->ac == 1)
                                            <li class="mb-2" style="display: flex; align-items: center;">
                                                <i class="material-icons text-success me-2" style="font-size: 20px;">ac_unit</i> AC
                                            </li>
                                            @else
                                            <li class="mb-2" style="display: flex; align-items: center;">
                                                <i class="material-icons text-success me-2" style="font-size: 20px;">air</i> Non-AC
                                            </li>
                                            @endif
                                            <li class="mb-2" style="display: flex; align-items: center;">
                                                <i class="material-icons text-success me-2" style="font-size: 20px;">bed</i> {{ $room->bed }} Beds
                                            </li>
                                        </ul>
                                    </div>
                                
                                    <!-- Second Column -->
                                    <div class="col-md-4">
                                        <ul class="list-unstyled">
                                            @if ($room->parking == 1)
                                            <li class="mb-2" style="display: flex; align-items: center;">
                                                <i class="material-icons text-success me-2" style="font-size: 20px;">local_parking</i> Parking
                                            </li>
                                            @endif
                                            @if ($room->free_wifi == 1)
                                            <li class="mb-2" style="display: flex; align-items: center;">
                                                <i class="material-icons text-success me-2" style="font-size: 20px;">wifi</i> Free WiFi
                                            </li>
                                            @endif
                                            @if ($room->restaurant == 1)
                                            <li class="mb-2" style="display: flex; align-items: center;">
                                                <i class="material-icons text-success me-2" style="font-size: 20px;">restaurant</i> Restaurant
                                            </li>
                                            @endif
                                            @if ($room->pet_friendly == 1)
                                            <li class="mb-2" style="display: flex; align-items: center;">
                                                <i class="material-icons text-success me-2" style="font-size: 20px;">pets</i> Pet Friendly
                                            </li>
                                            @endif
                                            @if ($room->room_service == 1)
                                            <li class="mb-2" style="display: flex; align-items: center;">
                                                <i class="material-icons text-success me-2" style="font-size: 20px;">room_service</i> Room Service
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                
                                    <!-- Third Column -->
                                    <div class="col-md-4">
                                        <ul class="list-unstyled">
                                            @if ($room->front_desk == 1)
                                            <li class="mb-2" style="display: flex; align-items: center;">
                                                <i class="material-icons text-success me-2" style="font-size: 20px;">support_agent</i> 24 Hour Front Desk
                                            </li>
                                            @endif
                                            @if ($room->smoking == 1)
                                            <li class="mb-2" style="display: flex; align-items: center;">
                                                <i class="material-icons text-success me-2" style="font-size: 20px;">smoking_rooms</i> Smoking
                                            </li>
                                            @endif
                                            @if ($room->wheelchair_accessible == 1)
                                            <li class="mb-2" style="display: flex; align-items: center;">
                                                <i class="material-icons text-success me-2" style="font-size: 20px;">accessible</i> Wheelchair Accessible
                                            </li>
                                            @endif
                                            @if ($room->swimming_pool == 1)
                                            <li class="mb-2" style="display: flex; align-items: center;">
                                                <i class="material-icons text-success me-2" style="font-size: 20px;">pool</i> Swimming Pool
                                            </li>
                                            @endif
                                            @if ($room->hours_security == 1)
                                            <li class="mb-2" style="display: flex; align-items: center;">
                                                <i class="material-icons text-success me-2" style="font-size: 20px;">security</i> 24 Hours Security
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                
                            </div>
                            @if ($availabilityStatus)
                                <a href="{{route('booking-confirmation',$room->id)}}" class="btn btn-outline-success btn-lg px-4 py-2 mt-auto w-100 ">BOOK NOW</a>
                            @else
                                <span class="btn btn-outline-success btn-lg px-4 py-2 mt-auto w-100 ">First Check Availability After Book This Room</span>
                            @endif
                        </div>
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
