<x-guest-layout>
    <style>

    @media (max-width: 768px) {
                .bg-img{
                    min-height: 100vh; /* Prevents cutting on smaller screens */
                }
            }
    @media screen and (max-width: 320px) {
        .card {
            padding: 15px;
            background-color: rgba(255, 255, 255, 0.9); /* Adjust background */
            border-radius: 10px; /* Smooth borders */
            height: 50px;
        }
    }

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

    </style>
    <div class="card shadow-lg p-4" style="max-width: 400px; background-color: rgba(255, 255, 255, 0.8); border-radius: 15px;">
    <div class="card-home-icon d-md-none"> <a href="/"><i class="bi bi-house-fill"></i></a></i> 
    </div>
        <div class="card-body text-dark">
            <div class="text-center mb-4">
                <i class="bi bi-door-open-fill text-primary" style="font-size: 3rem;"></i>
                <h3 class="fw-bold mt-2">Login</h3>
                <p class="text-muted">Welcome back! Please log in to your account.</p>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email Address</label>
                    <input type="email" value="{{old('email') ?? ''}}" name="email" class="form-control bg-light border border-secondary" id="email" placeholder="Enter your email">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" style="margin-top: .5rem !important;color: red;" />
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label fw-bold">Password</label>
                    <input type="password" name="password"  class="form-control bg-light border border-secondary" id="password" placeholder="Enter your password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" style="margin-top: .5rem !important;color: red;" />
                </div>
                @if (Route::has('password.request'))
                    <div class="mb-3 text-end">
                        <a href="{{ route('password.request') }}" class="text-decoration-none text-primary fw-bold">Forgot Password?</a>
                    </div>
                @endif
                <button type="submit" class="btn btn-primary w-100 py-2">Login</button>
                <div class="text-center mt-4">
                    <small>Don't have an account? <a href="{{ route('register') }}" class="text-decoration-none text-primary fw-bold">Sign Up Now</a></small>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
