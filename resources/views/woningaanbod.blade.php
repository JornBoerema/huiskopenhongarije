<x-app-layout>
    <x-slot name="header">Woningaanbod</x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($houses as $house)
            <x-house-card :house="$house" key="{{ $house->id }}" />
        @endforeach
    </div>
</x-app-layout>
