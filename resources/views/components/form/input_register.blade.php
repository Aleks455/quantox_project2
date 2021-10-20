@props(['name', 'placeholder', 'label', 'type'])
<div class="mb-4">
    <label 
        class=""
        for="{{ $name }}"     
    >
        {{-- Company Number --}}
        {{ ucwords($label) }}
    </label>

    <input 
        class="bg-gray-100 border-2 w-full p-3 rounded-lg mt-1"
        {{-- {{ isset($type)? $type: }}type="text" --}}
        name="{{ $name }}" 
        id="{{ $name }}" 
        placeholder="{{ $placeholder }}"
        value="{{ old($name) }}"
    >

    @error($name);
        <p class="text-red-500 text-xs mt-2">
            {{-- {{ $message }} --}}
        </p>
    @enderror   
    
    
    
</div>