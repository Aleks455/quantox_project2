@props(['name', 'placeholder', 'label', 'type', 'value'])
<div class="mb-4 w-96 m-2">
    <label 
        class=""
        for="{{ $name }}"     
    >
        {{ ucwords($label) }}
    </label>

    <input 
        class="bg-gray-100 border-2 w-full p-3 rounded-lg mt-1 @error($name) border-red-500 @enderror"
        type="{{ $type }}"
        name="{{ $name }}" 
        id="{{ $name }}" 
        placeholder="{{ $placeholder }}"
        @if(isset($value)) 
        value ="{{ $value }}";
        @else
        value="{{ old($name) }}"
        @endif
    >
    <x-form.error name="{{ $name }}" /> 
    
</div>
        