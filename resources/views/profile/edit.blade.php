<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12" style="background-color: rgba(0, 19, 33, 255);"> <!-- Mengubah warna background -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 text">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" style="background-color: rgba(10, 19, 47, 255);"> <!-- Mengembalikan warna background ke putih untuk konten -->
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" style="background-color: rgba(10, 19, 47, 255);"> <!-- Mengembalikan warna background ke putih untuk konten -->
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" style="background-color: rgba(10, 19, 47, 255);"> <!-- Mengembalikan warna background ke putih untuk konten -->
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
