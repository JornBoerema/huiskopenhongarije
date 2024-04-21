@php
    use Illuminate\Support\Number;

    $price = Number::currency($house->price, 'EUR', "nl-NL");
    $images = array_reverse($house->images);
@endphp

<x-app-layout>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
        <div class="flex flex-col gap-y-4" x-data="{ image: '{{ $images[0] }}' }">
            <img x-bind:src="image" alt="" class="rounded shadow-lg min-h-[480px] max-h-[480px] object-cover object-center" />
            <div class="grid grid-cols-5 gap-2">
                @foreach($images as $image)
                    <div class="relative rounded overflow-hidden">
                        <button class="absolute inset-0" @click="image = '{{ $image }}'"></button>
                        <img src="{{ $image }}" alt="" class="border-4 border-background cursor-pointer w-[120px] h-[90px]" :class="{ '!border-primary': image === @js($image) }" />
                    </div>
                @endforeach
            </div>
        </div>
        <div class="text-foreground">
            <div class="bg-primary text-white px-6 py-3 rounded flex items-center justify-between text-xl font-semibold">
                <p>{{ $house->title }}</p>
                <p>{{ $price }}</p>
            </div>
            <div class="mt-6">
                <div class="flex items-center justify-between">
                    <h2 class="text-2xl font-bold">Omschrijving</h2>
                    <div class="flex items-center justify-start gap-x-5">
                        <div class="text-foreground flex items-center gap-x-2">
                            <i class="fa-regular fa-border-all"></i>
                            <span>{{ $house->surface }} m²</span>
                        </div>
                        <div class="text-foreground flex items-center gap-x-2">
                            <i class="fa-regular fa-bed-front"></i>
                            <span>{{ $house->bedrooms }}</span>
                        </div>
                        <div class="text-foreground flex items-center gap-x-2">
                            <i class="fa-regular fa-bath"></i>
                            <span>{{ $house->bathrooms }}</span>
                        </div>
                    </div>
                </div>
                <p class="mt-2">{{ $house->description }}</p>
            </div>
            <div class="mt-6">
                <h2 class="text-2xl font-bold">Tuin en omgeving</h2>
                <p class="mt-2">{{ $house->surroundings }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
