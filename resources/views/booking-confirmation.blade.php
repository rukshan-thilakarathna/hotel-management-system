<x-guest-layout>
    <div class="card shadow-lg p-4 text-dark" style="max-width: 700px; background-color: rgba(255, 255, 255, 0.8); border-radius: 15px; margin: auto;">
        <div class="card-body">
            <div class="text-center mb-4">
                <i class="bi bi-calendar-check-fill text-primary" style="font-size: 2.5rem;"></i>
                <h4 class="fw-bold mt-2">Booking Confirmation</h4>
                <p class="text-muted">Please review your details and confirm your booking.</p>
            </div>
            <form action="{{ route('booking-confirmation-store') }}" method="POST">
                @csrf <!-- Laravel CSRF Protection -->

                <!-- Guest Information -->
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Full Name</label>
                    <div class="form-control bg-light border border-secondary">
                        {{ Auth::user()->name }}
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email Address</label>
                    <div class="form-control bg-light border border-secondary">
                        {{ Auth::user()->email }}
                    </div>
                </div>

                <input type="hidden" name="room_id" value="{{ $room->id }}">

                @if (Auth::user()->phone)
                <div class="mb-3">
                    <label for="phone" class="form-label fw-bold">Phone Number</label>
                    <div class="form-control bg-light border border-secondary">
                        {{ Auth::user()->phone }}
                    </div>
                </div>
                @endif

                <!-- Booking Details -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="checkin" class="form-label fw-bold">Check-in Date</label>
                        <div class="form-control bg-light border border-secondary">
                            {{ session('checkin_date') }}
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="checkout" class="form-label fw-bold">Check-out Date</label>
                        <div class="form-control bg-light border border-secondary">
                            {{ session('checkout_date') }}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="adults" class="form-label fw-bold">Adults</label>
                        <input min="1" max="3" type="number" name="adults" value="{{ session('adults') ?? old('adults') ?? $room->adults ?? '' }}" class="form-control bg-light border border-secondary" placeholder="Number of adults">
                        <small class="text-muted">Please enter the number of adults.</small> <!-- Message under the input -->
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="children" class="form-label fw-bold">Children</label>
                        <input min="1" max="3" type="number" name="children" value="{{ session('children') ?? old('children') ?? $room->children ?? '' }}" class="form-control bg-light border border-secondary" placeholder="Number of children">
                        <small class="text-muted">Please enter the number of children.</small> <!-- Message under the input -->
                    </div>
                </div>
                

                <!-- Special Requests -->
                <div class="mb-3">
                    <label for="requests" class="form-label fw-bold">Special Requests</label>
                    <textarea id="requests" name="note" rows="3" class="form-control bg-light border border-secondary" placeholder="Enter any special requests">{{ old('note') ?? '' }}</textarea>
                </div>

                 <!-- Terms and Conditions Checkbox -->
                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                    <label class="form-check-label" for="terms">
                        I agree to the <a href="/terms" class="text-primary" target="_blank">Terms and Conditions</a>.
                    </label>
                </div>

                <div class="d-flex justify-content-between">
                    <!-- Back to Room Page Button -->
                    <a href="/rooms" class="btn btn-outline-secondary w-48 py-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-arrow-left me-2"></i> Back to Room Page
                    </a>
                    
                    <!-- Confirm Booking Button -->
                    <button type="submit" class="btn btn-primary w-48 py-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-check-circle me-2"></i> Confirm Booking
                    </button>
                </div>
                
            </form>
        </div>
    </div>
</x-guest-layout>
