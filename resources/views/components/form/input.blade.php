@props(['name', 'placeholder', 'label', 'type'])
<div class="mb-4">
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
        value="{{ old($name) }}"
    >

    <x-form.error name="{{ $name }}" /> 
    
    
</div>