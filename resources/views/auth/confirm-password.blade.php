<x-guest-layout>
    <div class="card shadow-lg p-4 text-dark" style="max-width: 500px; background-color: rgba(255, 255, 255, 0.8); border-radius: 15px;">
        <div class="card-body">
            <div class="text-center mb-4">
                <i class="bi bi-shield-lock-fill text-primary" style="font-size: 2.5rem;"></i>
                <h4 class="fw-bold mt-2">Secure Area</h4>
                <p class="text-muted">Please confirm your password before continuing.</p>
            </div>
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label fw-bold">Password</label>
                    <input type="password" class="form-control bg-light border border-secondary" id="password" name="password" required autocomplete="current-password" placeholder="Enter your password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" style="margin-top: .5rem !important; color: red;" />
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2">Confirm</button>
            </form>
        </div>
    </div>
</x-guest-layout>
