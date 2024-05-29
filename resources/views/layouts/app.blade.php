<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">

        <!-- Icons -->
        <script src="https://kit.fontawesome.com/ecf910a053.js" crossorigin="anonymous"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-background">
            @livewire('navigation-menu')

            @if(!request()->is('/'))
                <!-- Page Content -->
                <main class="container py-12 flex flex-col gap-y-6">
                    @if(isset($header))
                        <header class="bg-primary px-6 py-5 rounded">
                            <h2 class="text-3xl font-bold text-white">{{ $header }}</h2>
                        </header>
                    @endif

                    {{ $slot }}
                </main>
            @else
                {{ $slot }}
            @endif

            <x-footer></x-footer>

        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
