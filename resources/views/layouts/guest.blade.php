<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <link rel="icon" href="{{ url('build/assets/img/favicon.ico')}}" type="image/x-icon">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-gray-900">
        <div class="flex flex-col items-center min-h-screen pt-6 sm:justify-center sm:pt-0 dark:bg-gray-900">
            <div>
                <a href="/">
                    <x-application-logo class="h-40 text-gray-500 fill-current" />
                </a>
            </div>

            <h1 class="mt-5 text-2xl">SBCI LAN-Based Library System Catalogue</h1>

            <div class="w-full px-6 py-4 mt-6 overflow-hidden bg-white sm:max-w-xs dark:bg-gray-800">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
