@aware(['page', 'text'])

@php
    $text = str_replace('<h1>', '<h1 class="text-3xl">', $text);
    $text = str_replace('<h2>', '<h2 class="text-2xl">', $text);
    $text = str_replace('<h3>', '<h3 class="text-xl">', $text);
    $text = str_replace('<ul>', '<ul class="list-disc list-inside">', $text);
    $text = str_replace('<ol>', '<ol class="list-inside" style="list-style-type: decimal;">', $text);
@endphp

<div class="text-foreground">
    {!! $text !!}
</div>
