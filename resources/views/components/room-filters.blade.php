<style>
    @media (max-width: 768px) {
    .form-check {
        display: inline-flex;
        flex: 0 0 48%; /* Each column takes about half the width */
        justify-content: flex-start;
        margin-bottom: 10px;
    }

    .form-check-input {
        margin-right: 5px; /* Adjust spacing between checkbox and label */
    }

    .form-check-label {
        white-space: nowrap; /* Prevent text wrapping */
    }
    
    /* Ensure checkboxes wrap to a new row */
    .form-check-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px; /* Add gap between columns */
    }
}
</style>
<div class="card p-4 border rounded shadow-sm font3">
    <h5 class="fw-bold mb-4 text-primary">Filters</h5>
    <form id="bookingFilter" action="{{ route('rooms') }}" method="GET">
        @csrf

        <input type="hidden" name="filter" value="1">
        <input type="hidden" name="adults" value="{{ session('adults') ?? 1 }}">
        <input type="hidden" name="children" value="{{ session('children') ?? 0 }}">
        <input type="hidden" name="dateRange" value="{{ session('checkin_date') ?? now()->format('Y-m-d') }} - {{ session('checkout_date') ?? now()->addDay()->format('Y-m-d') }}">

        
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
                <option>Both</option>
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
        <button class="btn book-btn-color btn-lg px-4 py-2 mt-auto w-100" style="hovercolor:white">Search</button>
    </form>
</div>