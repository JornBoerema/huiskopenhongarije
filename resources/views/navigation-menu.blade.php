<div class="bg-foreground" x-data="{ open: false }">
    <div class="container py-4 flex items-center justify-between max-h-[72px]">
        <a href="/"><h1 class="text-2xl font-semibold whitespace-nowrap text-white">Authentic Hongaars</h1></a>
        <nav class="items-center justify-end gap-x-4 hidden lg:flex">
            <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
            <x-nav-link href="/woningaanbod" :active="request()->is('woningaanbod')">Woningaanbod</x-nav-link>
            <x-nav-link
                :items="[
                    (object) ['title' => 'Renovatieplannen', 'href' => '/renovatieplannen'],
                    (object) ['title' => 'Verbouwingen', 'href' => '/verbouwingen']
                ]"
            >
                Bouw en infra
            </x-nav-link>
            <x-nav-link
                :items="[
                    (object) ['title' => 'Omgeving', 'href' => '/omgeving'],
                    (object) ['title' => 'Emigreren', 'href' => '/emigreren'],
                    (object) ['title' => 'Beheer en nazorg', 'href' => '/beheer-en-nazorg']
                ]"
            >
                Diensten
            </x-nav-link>
            <x-nav-link href="/over-ons" :active="request()->is('over-ons')">Over ons</x-nav-link>
        </nav>
        <button class="flex items-center justify-center w-10 h-10 lg:hidden hover:bg-primary text-white rounded" @click="open = !open">
            <i class="fa-regular fa-bars"></i>
        </button>
    </div>
    <div x-show="open" class="z-40 absolute bg-foreground top-[72px] container py-12 grid grid-cols-1">
        <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
        <x-nav-link href="/woningaanbod" :active="request()->is('woningaanbod')">Woningaanbod</x-nav-link>
        <x-nav-link
            :items="[
                    (object) ['title' => 'Renovatieplannen', 'href' => '/renovatieplannen'],
                    (object) ['title' => 'Verbouwingen', 'href' => '/verbouwingen']
                ]"
        >
            Bouw en infra
        </x-nav-link>
        <x-nav-link
            :items="[
                    (object) ['title' => 'Omgeving', 'href' => '/omgeving'],
                    (object) ['title' => 'Emigreren', 'href' => '/emigreren'],
                    (object) ['title' => 'Beheer en nazorg', 'href' => '/beheer-en-nazorg']
                ]"
        >
            Diensten
        </x-nav-link>
        <x-nav-link href="/over-ons" :active="request()->is('over-ons')">Over ons</x-nav-link>
    </div>
</div>
