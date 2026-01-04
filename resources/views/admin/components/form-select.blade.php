@props([
    'name',
    'label' => null,
    'options' => [],
    'selected' => '',
    'placeholder' => 'Pilih opsi...',
    'required' => false,
    'disabled' => false,
    'hint' => null
])

@php
    $hasError = $errors->has($name);
    $inputClasses = 'block w-full rounded-lg border-0 py-2.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 transition-colors';
    $inputClasses .= $hasError 
        ? ' ring-red-300 focus:ring-red-500' 
        : ' ring-gray-300 focus:ring-primary-500';
    $inputClasses .= $disabled ? ' bg-gray-50 text-gray-500' : '';
@endphp

<div {{ $attributes->merge(['class' => 'mb-4']) }}>
    @if($label)
    <label for="{{ $name }}" class="block text-sm font-medium leading-6 text-gray-900 mb-1.5">
        {{ $label }}
        @if($required)
        <span class="text-red-500">*</span>
        @endif
    </label>
    @endif
    
    <select name="{{ $name }}"
            id="{{ $name }}"
            {{ $required ? 'required' : '' }}
            {{ $disabled ? 'disabled' : '' }}
            class="{{ $inputClasses }}">
        @if($placeholder)
        <option value="">{{ $placeholder }}</option>
        @endif
        
        @foreach($options as $value => $optionLabel)
        <option value="{{ $value }}" {{ old($name, $selected) == $value ? 'selected' : '' }}>
            {{ $optionLabel }}
        </option>
        @endforeach
    </select>
    
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
