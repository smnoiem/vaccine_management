<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-orange-100">
        <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-6">
            <!-- Logo or Header -->
            <div class="text-center mb-6">
                <h1 class="text-3xl font-bold text-orange-600">Vaccine Portal</h1>
                <p class="text-sm text-orange-500">Login to access your account</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full border-orange-300 focus:border-orange-500 focus:ring-orange-500" 
                                  type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-orange-600" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full border-orange-300 focus:border-orange-500 focus:ring-orange-500" 
                                  type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-orange-600" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center mb-4">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-orange-600 shadow-sm focus:ring-orange-500" name="remember">
                    <label for="remember_me" class="ms-2 text-sm text-orange-600">{{ __('Remember me') }}</label>
                </div>

                <!-- Forgot Password and Login Button -->
                <div class="flex items-center justify-between">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-orange-500 hover:underline" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="bg-orange-500 hover:bg-orange-600 focus:ring-orange-500 text-white">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>

