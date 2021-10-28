@props(['color'])
<button class="border border-{{ isset($color)? $color : 'green' }}-200 rounded p-3 my-5 bg-{{ isset($color)? $color : 'green' }}-100 hover:bg-{{ isset($color)? $color : 'green' }}-200">
    {{ $slot }}
</button>