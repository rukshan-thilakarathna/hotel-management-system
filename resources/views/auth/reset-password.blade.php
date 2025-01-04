<x-guest-layout>
    <div class="card shadow-lg p-4 text-dark" style="max-width: 500px; background-color: rgba(255, 255, 255, 0.8); border-radius: 15px;">
        <div class="card-body">
            <div class="text-center mb-4">
                <i class="bi bi-lock-fill text-primary" style="font-size: 2.5rem;"></i>
                <h4 class="fw-bold mt-2">Reset Password</h4>
                <p class="text-muted">Enter your new password to reset your account.</p>
            </div>
            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email Address</label>
                    <input type="email" class="form-control bg-light border border-secondary" id="email" name="email" :value="old('email', $request->email)" required autofocus placeholder="Enter your email">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" style="margin-top: .5rem !important; color: red;" />
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label fw-bold">New Password</label>
                    <input type="password" class="form-control bg-light border border-secondary" id="password" name="password" required placeholder="Enter your new password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" style="margin-top: .5rem !important; color: red;" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label fw-bold">Confirm Password</label>
                    <input type="password" class="form-control bg-light border border-secondary" id="password_confirmation" name="password_confirmation" required placeholder="Confirm your password">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" style="margin-top: .5rem !important; color: red;" />
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2">Reset Password</button>
            </form>
        </div>
    </div>
</x-guest-layout>
