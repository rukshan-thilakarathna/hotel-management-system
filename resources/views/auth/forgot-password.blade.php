<x-guest-layout>
    <div class="card shadow-lg p-4 text-dark" style="max-width: 500px; background-color: rgba(255, 255, 255, 0.8); border-radius: 15px;">
        <div class="card-body">
            <div class="text-center mb-4">
                <i class="bi bi-envelope-fill text-primary" style="font-size: 2.5rem;"></i>
                <h4 class="fw-bold mt-2">Forgot Password?</h4>
                <p class="text-muted">Enter your email to reset your password.</p>
            </div>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email Address</label>
                    <input type="email" class="form-control bg-light border border-secondary" id="email" name="email" :value="old('email')" required autofocus placeholder="Enter your email">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" style="margin-top: .5rem !important; color: red;" />
                </div>
                <button type="submit" class="btn btn-primary w-100 py-2">Send Reset Link</button>
                <div class="text-center mt-4">
                    <small>Remember your password? <a href="{{ route('login') }}" class="text-decoration-none text-primary fw-bold">Sign In</a></small>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
