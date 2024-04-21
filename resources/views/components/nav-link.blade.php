@props([
    "active" => false,
    "items"
])

@php
    $activeClasses = $active ? "bg-primary" : "hover:bg-primary";
@endphp

@if(isset($items))
    <div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
        <button @click="open = !open" {{ $attributes->merge(["class" => "text-sm text-white font-medium leading-6 px-4 py-2 rounded whitespace-nowrap " . $activeClasses]) }}>
            <span>{{ $slot }}</span>
            <i class="fa-regular fa-chevron-down ml-2"></i>
        </button>
        <div
            x-show="open"
            x-transition:enter="ease-out duration-100"
            x-transition:enter-start="opacity-0 sm:scale-95"
            x-transition:enter-end="opacity-100 sm:scale-100"
            x-transition:leave="ease-in duration-100"
            x-transition:leave-start="opacity-100 sm:scale-100"
            x-transition:leave-end="opacity-0 sm:scale-95"
            class="z-50 absolute top-[60px] right-0 bg-foreground min-w-56 rounded p-2 shadow grid grid-cols-1"
        >
            @foreach($items as $item)
                <a href="{{ $item->href }}" {{ $attributes->merge(["class" => "text-sm text-white font-medium leading-6 px-4 py-2 rounded whitespace-nowrap " . $activeClasses]) }}>
                    <span>{{ $item->title }}</span>
                </a>
            @endforeach
        </div>
    </div>
@else
    <a {{ $attributes->merge(["class" => "text-sm text-white font-medium leading-6 px-4 py-2 rounded whitespace-nowrap " . $activeClasses]) }}>{{ $slot }}</a>
@endif
