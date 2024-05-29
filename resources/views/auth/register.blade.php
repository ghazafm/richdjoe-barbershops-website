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
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="dark-text">
                    <x-input-label for="name" :value="__('Name')" class="dark-text" />
                    <x-text-input id="name" class="block mt-1 w-full dark-text input-text-color" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2 dark-text" />
                </div>

                <!-- Email Address -->
                <div class="mt-4 dark-text">
                    <x-input-label for="email" :value="__('Email')" class="dark-text" />
                    <x-text-input id="email" class="block mt-1 w-full dark-text input-text-color" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 dark-text" />
                </div>

                <!-- Phone -->
                <div class="mt-4 dark-text">
                    <x-input-label for="phone" :value="__('Phone')" class="dark-text" />
                    <x-text-input id="phone" class="block mt-1 w-full dark-text input-text-color" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2 dark-text" />
                </div>

                <!-- Password -->
                <div class="mt-4 dark-text">
                    <x-input-label for="password" :value="__('Password')" class="dark-text" />
                    <x-text-input id="password" class="block mt-1 w-full dark-text input-text-color"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 dark-text" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4 dark-text">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="dark-text" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full dark-text input-text-color"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 dark-text" />
                </div>

                <div class="flex items-center justify-end mt-4 dark-text">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark-text" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="ms-4 dark-text">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
</x-guest-layout>
