<style>
.card-home-icon {
    position: absolute;
    top: 25px;
    font-size: 2rem; /* Adjust icon size */
    right: 30px;
    color: #000; /* Adjust icon color */
    background: none; /* Background color for better visibility */
    padding: 5px;
    border-radius: 50%; /* Make it a circle */
    z-index: 10; /* Ensure the icon is above other elements */
}

@media (max-width: 768px) {
                .bg-img{
                    min-height: 140vh; /* Prevents cutting on smaller screens */
                    margin-top: -110px;
                    
                }
            }
        
    @media (max-width: 768px) {
    body, html {
        overflow: hidden; /* Disable scrolling */
        height: 120%; /* Ensure full height */
    }

    /* Allow controlled scrolling within specific elements if needed */
    .card {
        max-height: 100vh; /* Restrict card height to viewport */
        overflow-y: auto; /* Enable internal scrolling for long content */
        -webkit-overflow-scrolling: touch; /* Smooth scrolling on mobile */
    }
}

</style>

</style>
<x-guest-layout>
    <div class="card shadow-lg p-4 text-light" style="max-width: 600px; background-color: rgba(255, 255, 255, 0.8); border-radius: 15px; width:400px;">
        <div class="card-home-icon d-md-none"> <a href="/"><i class="bi bi-house-fill"></i></a></i> 
        </div>
        <div class="card-body">
            <!-- Tabs -->
            <ul class="nav nav-tabs justify-content-center mb-4" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active text-dark fw-bold" id="guest-tab" data-bs-toggle="tab" data-bs-target="#guest" type="button" role="tab" aria-controls="guest" aria-selected="true">
                        Guest Registration
                    </button>
                </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="guest" role="tabpanel" aria-labelledby="guest-tab">
                    <div class="text-center mb-3">
                        <i class="bi bi-person-fill text-primary" style="font-size: 2.5rem;"></i>
                        <h4 class="fw-bold mt-2 text-dark">Create Your Account</h4>
                        <p class="text-muted">Sign up to enjoy your stay with us.</p>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold text-dark">Name</label>
                            <input type="text" class="form-control bg-light border border-secondary" id="name" name="name" :value="old('name')" required autofocus placeholder="Enter your name">
                            <x-input-error :messages="$errors->get('name')" class="mt-2" style="margin-top: .5rem !important; color: red;" />
                        </div>
                        <input type="hidden" name="type" value="2">
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold text-dark">Email</label>
                            <input type="email" class="form-control bg-light border border-secondary" id="email" name="email" :value="old('email')" required placeholder="Enter your email">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" style="margin-top: .5rem !important; color: red;" />
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label fw-bold text-dark">Password</label>
                            <input type="password" class="form-control bg-light border border-secondary" id="password" name="password" required placeholder="Enter your password">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" style="margin-top: .5rem !important; color: red;" />
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label fw-bold text-dark">Repeat Password</label>
                            <input type="password" class="form-control bg-light border border-secondary" id="password_confirmation" name="password_confirmation" required placeholder="Repeat your password">
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" style="margin-top: .5rem !important; color: red;" />
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-2">Register</button>
                        <div class="text-center mt-3 text-dark">
                            <small>Already have an account? <a href="{{ route('login') }}" class="text-decoration-none text-primary fw-bold">Sign In</a></small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
