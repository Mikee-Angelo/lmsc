<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="{{ url('/img/favicon.ico')}}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Simple Notify Toaster Notification -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify@0.5.5/dist/simple-notify.min.css" />
    
    @livewireStyles

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Simple Notify Toaster Notification -->
    <script src="https://cdn.jsdelivr.net/npm/simple-notify@0.5.5/dist/simple-notify.min.js"></script>
    
</head>
<body class="font-sans antialiased bg-gray-100">
<x-banner />

<div class="flex-col w-full lg:flex lg:flex-row lg:min-h-screen">
    <!-- Sidebar -->
    <x-jet-bar-sidebar />
    <!-- End Sidebar -->

    <div class="w-full bg-white">

        <x-navigation-menu />

        <!-- Content Container -->
        <main class="relative z-0 flex-1 py-6 overflow-y-auto focus:outline-none" tabindex="0" x-init="$el.focus()">
            @if (isset($header))
                <div class="px-4 pt-3 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <!-- Title -->
                    <h1 class="text-lg font-semibold tracking-widest text-gray-900 uppercase dark-mode:text-white">{{ $header }}</h1>
                    <!-- End Title -->
                </div>
            @endif
            <div>
                <div class="px-4 lg:min-h-96 sm:px-0">
                    {{ $slot }}
                </div>
            </div>
        </main>
        <!-- Content Container -->

    </div>
</div>

@stack('modals')

@livewireScripts

<script>
    window.addEventListener('success', event => {
        let { type, title, text} = event.detail;
        
        new Notify({
            status: type ,
            title: title ,
            text: text,
            effect: 'fade',
            speed: 300,
            showIcon: true,
            showCloseButton: true,
            autoclose: true,
            autotimeout: 3000,
            gap: 20,
            distance: 20,
            type: 1,
            position: 'right top'
        });
    })
</script>
</body>
</html>
