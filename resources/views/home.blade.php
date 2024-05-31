<x-app-layout>
    <style>
        .bg-home-header {
            background: url('https://hkh.bijvoorbeeldzo.nl/home_background.jpeg') center center no-repeat;
            background-size: cover;
        }
    </style>

    <header class="bg-home-header text-white">
        <div class="flex flex-col items-center justify-center py-32 gap-y-5 bg-black/50">
            <p class="text-3xl md:text-6xl font-bold">{{ config('app.name') }}</p>
            <p class="max-w-4xl px-8 text-lg md:text-3xl text-center">
                Ontdek Hongarije met ons! Een betrouwbare makelaardij en aannemersbedrijf voor uw droomhuis of bouwproject. Laat uw wensen uitkomen. Neem contact met ons op!
            </p>
        </div>
    </header>
</x-app-layout>
