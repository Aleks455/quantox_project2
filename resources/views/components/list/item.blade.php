@props(['label'])

<div class="p-3">
    <div class="">{{ $label }}:</div>
    <hr>
    <div class="name">{{ $slot }}</div>
</div>