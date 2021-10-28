@props(['label', 'value' ])

<div class="p-3">
    <div class="bg-gray-100 rounded">{{ $label }}:</div>
    <hr>
    <div class="name w-36 {{ isset($value)?  $value: ''}}">
        {{ $slot }}
    </div>
</div>