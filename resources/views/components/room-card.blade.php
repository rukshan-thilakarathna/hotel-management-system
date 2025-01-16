<style>
@media (max-width: 768px) {
    .list-unstyled {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .list-unstyled li {
        flex: 0 0 48%; /* Each column takes about half the width */
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .list-unstyled li i {
        margin-right: 5px; /* Adjust spacing between icon and text */
    }
}
</style>
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
    <div class="col-lg-8 d-flex flex-column p-4 font3">
        <h2 class="fw-bold mb-3 text-primary" style="font-size: 25px;">Room Number - {{ $room->number }}</h2>
        <p class="text-muted" style="font-size:1rem;">{{ $room->description }}</p>
        <div class="row mt-3 mb-4">
            <!-- First Column -->
            <div class="col-md-4">
                <ul class="list-unstyled">
                    <li class="mb-2" style="display: flex; align-items: center;">
                        <i class="material-icons me-2 custom-color" style="font-size: 20px;">group</i> {{ $room->adults }} Adults Guests
                    </li>
                    <li class="mb-2" style="display: flex; align-items: center;">
                        <i class="material-icons  me-2 custom-color" style="font-size: 20px;">child_care</i> {{ $room->children }} Children Guests
                    </li>
                    <li class="mb-2" style="display: flex; align-items: center;">
                        <i class="material-icons  me-2 custom-color" style="font-size: 20px;">square_foot</i> {{ $room->size }} ft
                    </li>
                    <li class="mb-2" style="display: flex; align-items: center;">
                        <i class="material-icons  me-2 custom-color" style="font-size: 20px;">attach_money</i> ${{ $room->price }} / Night
                    </li>
                    @if ($room->ac == 1)
                    <li class="mb-2" style="display: flex; align-items: center;">
                        <i class="material-icons  me-2 custom-color" style="font-size: 20px;">ac_unit</i> AC
                    </li>
                    @else
                    <li class="mb-2" style="display: flex; align-items: center;">
                        <i class="material-icons me-2 custom-color" style="font-size: 20px;">air</i> Non-AC
                    </li>
                    @endif
                    <li class="mb-2" style="display: flex; align-items: center;">
                        <i class="material-icons me-2 custom-color" style="font-size: 20px;">bed</i> {{ $room->bed }} Beds
                    </li>
                </ul>
            </div>
        
            <!-- Second Column -->
            <div class="col-md-4 font3">
                <ul class="list-unstyled">
                    @if ($room->parking == 1)
                    <li class="mb-2" style="display: flex; align-items: center;">
                        <i class="material-icons  me-2 custom-color" style="font-size: 20px;">local_parking</i> Parking
                    </li>
                    @endif
                    @if ($room->free_wifi == 1)
                    <li class="mb-2" style="display: flex; align-items: center;">
                        <i class="material-icons  me-2 custom-color" style="font-size: 20px;">wifi</i> Free WiFi
                    </li>
                    @endif
                    @if ($room->restaurant == 1)
                    <li class="mb-2" style="display: flex; align-items: center;">
                        <i class="material-icons  me-2 custom-color" style="font-size: 20px;">restaurant</i> Restaurant
                    </li>
                    @endif
                    @if ($room->pet_friendly == 1)
                    <li class="mb-2" style="display: flex; align-items: center;">
                        <i class="material-icons  me-2 custom-color" style="font-size: 20px;">pets</i> Pet Friendly
                    </li>
                    @endif
                    @if ($room->room_service == 1)
                    <li class="mb-2" style="display: flex; align-items: center;">
                        <i class="material-icons  me-2 custom-color" style="font-size: 20px;">room_service</i> Room Service
                    </li>
                    @endif
                </ul>
            </div>
        
            <!-- Third Column -->
            <div class="col-md-4 font3">
                <ul class="list-unstyled">
                    @if ($room->front_desk == 1)
                    <li class="mb-2" style="display: flex; align-items: center;">
                        <i class="material-icons  me-2 custom-color" style="font-size: 20px;">support_agent</i> 24 Hour Front Desk
                    </li>
                    @endif
                    @if ($room->smoking == 1)
                    <li class="mb-2" style="display: flex; align-items: center;">
                        <i class="material-icons  me-2 custom-color" style="font-size: 20px;">smoking_rooms</i> Smoking
                    </li>
                    @endif
                    @if ($room->wheelchair_accessible == 1)
                    <li class="mb-2" style="display: flex; align-items: center;">
                        <i class="material-icons  me-2 custom-color" style="font-size: 20px;">accessible</i> Wheelchair Accessible
                    </li>
                    @endif
                    @if ($room->swimming_pool == 1)
                    <li class="mb-2" style="display: flex; align-items: center;">
                        <i class="material-icons  me-2 custom-color" style="font-size: 20px;">pool</i> Swimming Pool
                    </li>
                    @endif
                    @if ($room->hours_security == 1)
                    <li class="mb-2" style="display: flex; align-items: center;">
                        <i class="material-icons  me-2 custom-color" style="font-size: 20px;">security</i> 24 Hours Security
                    </li>
                    @endif
                </ul>
            </div>
        </div>
        
    </div>
    @if($SetAttributes)
        @if ($availabilityStatus)
            <a href="{{route('booking-confirmation',$room->id)}}" class="btn btn-outline-success btn-lg px-4 py-2 mt-auto w-100 book-btn-color custom-colorr font3">BOOK NOW</a>
        @else
            <a href="#booking-form-ss" class="btn btn-outline-success btn-lg px-4 py-2 mt-auto w-100 book-btn-color custom-color font3">First Check Availability Before Book This Room</a>
        @endif
    @else
        {{-- <a href="{{route('booking-confirmation',$room->id)}}" class="btn btn-outline-success btn-lg px-4 py-2 mt-3 w-100 "> View Booking Details</a> --}}
    @endif
</div>