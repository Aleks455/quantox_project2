@props(['name', 'placeholder', 'label', 'type', 'value'])
<div>
    <input 
        class="border-b border-black-100"
        type = "{{ $type }}"
        name = "{{ $name }}" 
        id = "{{ $name }}" 
        placeholder = "{{ $placeholder }}"
        @if (isset($value)) 
        value = "{{ $value }}";
        @else
        value = "{{ old($name) }}"
        @endif
    >
    <x-form.error name = "{{ $name }}" /> 
</div>