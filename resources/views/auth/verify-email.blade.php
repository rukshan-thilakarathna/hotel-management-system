<x-guest-layout>
    <div class="card shadow-lg p-4 text-dark" style="max-width: 500px; background-color: rgba(255, 255, 255, 0.8); border-radius: 15px;">
        <div class="card-body">
            <div class="text-center mb-4">
                <i class="bi bi-check-circle-fill text-primary" style="font-size: 2.5rem;"></i>
                <h4 class="fw-bold mt-2">Verify Your Email</h4>
                <p class="text-muted">Thanks for signing up! Before getting started, please verify your email address by clicking on the link we just sent you.</p>
                <p class="text-muted">If you didn’t receive the email, we’ll gladly send you another.</p>
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <div class="mt-4 flex items-center justify-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary w-100 py-2">{{ __('Resend Verification Email') }}</button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100 py-2 mt-3">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
