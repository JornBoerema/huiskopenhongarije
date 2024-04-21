@props(["house"])

@php
    use Illuminate\Support\Number;

    $price = Number::currency($house->price, 'EUR', "nl-NL");
    $images = array_reverse($house->images);
@endphp

<div class="space-y-3 relative">
    <a href="/woningaanbod/{{ $house->id }}">
        @if($house->sold) <span class="absolute top-3 right-3 font-inter bg-red-500 text-white text-sm font-medium px-2 py-1 rounded">Sold - Verkocht</span> @endif
        <img src="{{ $images[0] }}" alt="" width="480px" height="350px" class="rounded min-h-[350px] max-h-[350px] object-cover object-center" />
    </a>
    <div class="bg-primary text-white font-medium flex items-center justify-between px-3 py-1.5 rounded">
        <p>{{ $house->title }}</p>
        <p>{{ $price }}</p>
    </div>
    <p class="text-lg font-semibold text-foreground leading-snug">{{ $house->subtitle }}</p>
    <p class="font-inter text-sm font-medium text-foreground">{{ $house->short_description }}</p>
    <div class="flex items-center justify-between !mt-6">
        <div class="flex items-center justify-start gap-x-5">
            <div class="text-foreground flex items-center gap-x-2" title="Oppervlakte">
                <i class="fa-regular fa-border-all"></i>
                <span>{{ $house->surface }} m²</span>
            </div>
            <div class="text-foreground flex items-center gap-x-2" title="Slaapkamers">
                <i class="fa-regular fa-bed-front"></i>
                <span>{{ $house->bedrooms }}</span>
            </div>
            <div class="text-foreground flex items-center gap-x-2" title="Badkamers">
                <i class="fa-regular fa-bath"></i>
                <span>{{ $house->bathrooms }}</span>
            </div>
        </div>
        <a href="/woningaanbod/{{ $house->id }}" class="flex items-center justify-center gap-x-2 px-4 py-1.5 whitespace-nowrap bg-primary hover:bg-transparent text-white font-medium hover:text-primary border-2 border-primary rounded">
            <span>Meer info</span>
            <i class="fa-regular fa-arrow-right"></i>
        </a>
    </div>
</div>
