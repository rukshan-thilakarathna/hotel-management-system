<x-app-layout>
    @include('layouts.dashboard')

    <section class="container my-5">
        @if (count($rooms) == 0)
            <h1 class="text-center">No Bookings Found</h1>
            
        @endif
        @foreach ($rooms as $key => $room)
            <div class="row mb-1">
                <div class="col-lg-8">
                    @include('components.room-card', ['SetAttributes' => false])
                </div>
                <div class="col-lg-3 ml-2 mb-5 p-4 bg-light border border-secondary rounded-3 shadow-sm">
                    <h2 class="h3 text-primary mb-4">Booking Details</h2>
                    <p class="mb-3"><strong class="text-muted">Booking Id:</strong> <span class="text-dark">{{$bookings[$key]->id}}</span></p>
                    <p class="mb-3"><strong class="text-muted">Booking User Name:</strong> <span class="text-dark">{{ Auth::user()->name }}</span></p>
                    <p class="mb-3"><strong class="text-muted">Check In Date:</strong> <span class="text-dark">{{ Carbon\Carbon::createFromTimestamp($bookings[$key]->check_in_date)->format('Y-m-d') }}</span></p>
                    <p class="mb-3"><strong class="text-muted">Check In Time:</strong> <span class="text-dark">{{$bookings[$key]->check_in_time}}</span></p>
                    <p class="mb-3"><strong class="text-muted">Check Out Date:</strong> <span class="text-dark">{{ Carbon\Carbon::createFromTimestamp($bookings[$key]->check_out_date)->format('Y-m-d') }}</span></p>
                    <p class="mb-3"><strong class="text-muted">Check Out Time:</strong> <span class="text-dark">{{$bookings[$key]->check_out_time}}</span></p>
                    <p class="mb-3"><strong class="text-muted">Booking Status:</strong> <span class="badge bg-success">{{$bookings[$key]->status}}</span></p>
                    <div class="mt-4" style="text-align: center;display: flex;">
                        <a href="#" class="btn btn-outline-primary btn-sm me-2">View Details</a>
                        @if (Carbon\Carbon::now()->between(Carbon\Carbon::createFromTimestamp($bookings[$key]->check_in_date), Carbon\Carbon::createFromTimestamp($bookings[$key]->check_out_date)))
                            <a href="{{route('menu')}}" class="btn btn-outline-success btn-sm me-2">Order Food</a>
                        @endif

                        <form id="cancelBookingForm-{{$bookings[$key]->id}}" action="{{ route('cancel-booking') }}" method="POST">
                            <input type="hidden" name="id" value="{{$bookings[$key]->id}}">
                            @csrf
                            <button type="button" class="btn btn-outline-danger btn-sm cancelBookingBtn" data-bs-toggle="modal" data-bs-target="#cancelBookingModal-{{$bookings[$key]->id}}">Cancel Booking</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Cancel Booking Confirmation Modal -->
        @foreach ($bookings as $booking)
        <div class="modal fade" id="cancelBookingModal-{{$booking->id}}" tabindex="-1" aria-labelledby="cancelBookingModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cancelBookingModalLabel">Confirm Cancellation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to cancel your booking? This action cannot be undone.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" onclick="confirmCancelBooking({{$booking->id}})">Cancel Booking</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </section>

    <script>
        function confirmCancelBooking(bookingId) {
            document.getElementById('cancelBookingForm-' + bookingId).submit();
        }
    </script>

</x-app-layout>
