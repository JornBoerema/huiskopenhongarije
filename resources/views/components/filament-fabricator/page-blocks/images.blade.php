@aware(['page', 'images'])

<div class="flex items-center flex-wrap gap-10 justify-between">
    @foreach($images as $image)
        <img src="{{ $image['image'] }}" alt="" class="rounded my-4" style="max-height: 250px" />
    @endforeach
</div>
