@props([
    'name',
    'label' => null,
    'accept' => 'image/*',
    'required' => false,
    'hint' => null,
    'preview' => null
])

@php
    $hasError = $errors->has($name);
@endphp

<div {{ $attributes->merge(['class' => 'mb-4']) }} x-data="{ preview: '{{ $preview }}' }">
    @if($label)
    <label for="{{ $name }}" class="block text-sm font-medium leading-6 text-gray-900 mb-1.5">
        {{ $label }}
        @if($required)
        <span class="text-red-500">*</span>
        @endif
    </label>
    @endif
    
    <div class="flex items-center gap-4">
        <!-- Preview -->
        <div x-show="preview" class="flex-shrink-0">
            <img :src="preview" 
                 class="h-20 w-20 object-cover rounded-lg border border-gray-200"
                 alt="Preview">
        </div>
        
        <!-- Upload Area -->
        <div class="flex-1">
            <label for="{{ $name }}" 
                   class="flex justify-center rounded-lg border border-dashed px-6 py-4 cursor-pointer transition-colors
                          {{ $hasError ? 'border-red-300 hover:border-red-400' : 'border-gray-300 hover:border-primary-400' }}">
                <div class="text-center">
                    <svg class="mx-auto h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                    </svg>
                    <div class="mt-2 flex text-sm leading-6 text-gray-600">
                        <span class="font-semibold text-primary-600 hover:text-primary-500">Upload file</span>
                        <span class="pl-1">atau drag and drop</span>
                    </div>
                    <p class="text-xs leading-5 text-gray-500">PNG, JPG, GIF up to 2MB</p>
                </div>
                <input id="{{ $name }}" 
                       name="{{ $name }}" 
                       type="file" 
                       accept="{{ $accept }}"
                       {{ $required ? 'required' : '' }}
                       class="sr-only"
                       @change="
                           const file = $event.target.files[0];
                           if (file) {
                               const reader = new FileReader();
                               reader.onload = (e) => preview = e.target.result;
                               reader.readAsDataURL(file);
                           }
                       ">
            </label>
        </div>
    </div>
    
    @if($hint && !$hasError)
    <p class="mt-1.5 text-sm text-gray-500">{{ $hint }}</p>
    @endif
    
    @error($name)
    <p class="mt-1.5 text-sm text-red-600 flex items-center gap-1">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/>
        </svg>
        {{ $message }}
    </p>
    @enderror
</div>
