<x-guest-layout>
    <style>
        .dark-bg {
            background-color: #121212;
        }
        .dark-text {
            color: #ffffff;
        }
        .input-text-color {
            color: #000000; /* Black text color */
        }
    </style>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="dark-text">
                    <x-input-label for="email" :value="__('Email')" class="dark-text" />
                    <x-text-input id="email" class="block mt-1 w-full dark-text input-text-color" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 dark-text" />
                </div>

                <!-- Password -->
                <div class="mt-4 dark-text">
                    <x-input-label for="password" :value="__('Password')" class="dark-text" />
                    <x-text-input id="password" class="block mt-1 w-full dark-text input-text-color"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 dark-text" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4 dark-text">
                    <label for="remember_me" class="inline-flex items-center dark-text">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 dark-text" name="remember">
                        <span class="ms-2 text-sm text-gray-600 dark-text">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4 dark-text">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-white-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark-text mr-2" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                    <a class="underline text-sm text-gray-600 hover:text-white-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark-text mr-2" href="{{ route('register') }}">
                        {{ __('Dont have an account?') }}
                    </a>
                
                    <x-primary-button class="ms-3 dark-text">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
                
            </form>
</x-guest-layout>
