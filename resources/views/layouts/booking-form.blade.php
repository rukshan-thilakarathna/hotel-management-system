<div class="container mt-5 text-white">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- Booking Form -->
            <form id="bookingForm" action="{{ route('rooms') }}" method="GET">
                <div class="card p-4 border border-warning border-2 bg-black">
                    <div class="row g-3 align-items-center">
                        <!-- Date Range -->
                        <div class="col-md-4 text-white">
                            <label for="dateRange" class="form-label">Check-in & Check-out</label>
                            <input 
                                type="text" 
                                value="{{ session('checkin_date') ?? \Carbon\Carbon::now()->format('Y-m-d') }} - {{ session('checkout_date') ?? \Carbon\Carbon::now()->addDay()->format('Y-m-d') }}" 
                                class="form-control" 
                                name="dateRange" 
                                id="dateRange" 
                                placeholder="YYYY-MM-DD - YYYY-MM-DD">
                        </div>
                        <!-- City -->
                        <div class="col-md-4 text-white">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control text-black" readonly id="city" placeholder="Dambulla">
                        </div>
                        <!-- Guests -->
                        <div class="col-md-4 text-white">
                            <label for="guests" class="form-label">Guests</label>
                            <div class="input-group">
                                <button class="btn btn-outline-secondary dropdown-toggle bg-white text-black" type="button" id="guestButton" data-bs-toggle="dropdown" aria-expanded="false"  style="width:100%;">
                                    {{session('adults') ?? 1}} Adult, {{session('children') ?? 0}} Children
                                </button>
                                <ul class="dropdown-menu p-3 bg-white" id="guestDropdown">
                                    <li>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <label class="me-2">Adults</label>
                                            <div class="d-flex align-items-center">
                                                <button type="button" class="btn btn-outline-secondary btn-sm" id="adultMinus">-</button>
                                                <span class="mx-2" id="adultCount">{{session('adults') ?? 1}}</span>
                                                <button type="button" class="btn btn-outline-secondary btn-sm" id="adultPlus">+</button>
                                            </div>
                                        </div>
                                    </li>
                                    <hr>
                                    <li>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <label class="me-2">Children</label>
                                            <div class="d-flex align-items-center">
                                                <button type="button" class="btn btn-outline-secondary btn-sm" id="childMinus">-</button>
                                                <span class="mx-2" id="childCount">{{session('children') ?? 0}}</span>
                                                <button type="button" class="btn btn-outline-secondary btn-sm" id="childPlus">+</button>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Hidden Fields for Adult and Children Counts -->
                    <input type="hidden" name="adults" id="hiddenAdultCount" value="1">
                    <input type="hidden" name="children" id="hiddenChildCount" value="0">

                    <div class="mt-3 text-center">
                        <button class="btn btn-success w-100 new-btn-color">Check availability</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>