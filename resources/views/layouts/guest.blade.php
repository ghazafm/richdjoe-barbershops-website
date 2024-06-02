<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Additional CSS for Dark Theme -->
        <style>
            body {
                background-color: #121212;
                color: #e0e0e0;
            }
            .bg-dark {
        background-color: rgba(0, 19, 33, 255); /* Equivalent to 0, 19, 33, 255 in RGBA */
    }
        </style>
    </head>
    <body class="font-sans text-gray-100 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-dark">
            <div>
                <a href="/">
                    <!-- Remove the logo if not needed -->
                    <img src="{{ asset('images/home/logo.png') }}" alt="Logo">
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg bg-dark text-gray-100">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
