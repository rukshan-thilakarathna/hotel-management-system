<div class="container mt-5 text-white">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card p-4 border border-warning border-2 bg-black">
                <div class="row g-3 align-items-center">
                    <!-- Date Range -->
                    <div class="col-md-4 text-white">
                        <label for="dateRange" class="form-label">Check-in & Check-out</label>
                        <input type="text" class="form-control" id="dateRange" placeholder="YYYY-MM-DD - YYYY-MM-DD">
                    </div>
                    <!-- City -->
                    <div class="col-md-4 text-white">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control text-black" id="city" placeholder="City">
                    </div>
                    <!-- Guests -->
                    <div class="col-md-4 text-white">
                        <label for="guests" class="form-label">Guests</label>
                        <div class="input-group ">
                            <button class="btn btn-outline-secondary dropdown-toggle bg-white text-black" type="button" id="guestButton" data-bs-toggle="dropdown" aria-expanded="false" style="width:100%;">
                                1 Adult, 0 Children
                            </button>
                            <ul class="dropdown-menu p-3 bg-white" id="guestDropdown">
                                <li>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <label class="me-2">Adults</label>
                                        <div class="d-flex align-items-center">
                                            <button class="btn btn-outline-secondary btn-sm" id="adultMinus">-</button>
                                            <span class="mx-2" id="adultCount">1</span>
                                            <button class="btn btn-outline-secondary btn-sm" id="adultPlus">+</button>
                                        </div>
                                    </div>
                                </li>
                                <hr>
                                <li>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <label class="me-2">Children</label>
                                        <div class="d-flex align-items-center">
                                            <button class="btn btn-outline-secondary btn-sm" id="childMinus">-</button>
                                            <span class="mx-2" id="childCount">0</span>
                                            <button class="btn btn-outline-secondary btn-sm" id="childPlus">+</button>
                                        </div>
                                    </div>
                                </li>
                                <hr>
                                <li>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <label class="me-2">Rooms</label>
                                        <div class="d-flex align-items-center">
                                            <button class="btn btn-outline-secondary btn-sm" id="roomMinus">-</button>
                                            <span class="mx-2" id="roomCount">1</span>
                                            <button class="btn btn-outline-secondary btn-sm" id="roomPlus">+</button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="mt-3 text-center">
                    <button class="btn btn-success w-100">Check availability</button>
                </div>
            </div>
        </div>
    </div>
</div>