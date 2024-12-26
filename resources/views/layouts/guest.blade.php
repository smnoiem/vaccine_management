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
    </head>
    <body class="font-sans text-gray-900 antialiased bg-gradient-to-r from-orange-400 via-orange-300 to-orange-550 min-h-screen">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">

            <!-- Adjusted Box Width and Height -->
            <div class="w-full sm:w-100 mt-6 px-8 py-6 bg-white shadow-md overflow-hidden sm:rounded-lg rounded-xl">
            {{-- <div class="w-full sm:w-100 mt-6 px-8 py-6 bg-white shadow-md overflow-hidden sm:rounded-lg rounded-xl"> --}}
                <!-- Logo or Heading Section -->
                <div class="text-center mb-6">
                    <h1 class="text-4xl font-extrabold text-orange-600">Vaccine Portal</h1>
                    <p class="text-sm text-gray-600">Login to your account</p>
                </div>

                <!-- Main Content (e.g., login form) -->
                {{ $slot }}
            </div>
        </div>
    </body>
</html>

