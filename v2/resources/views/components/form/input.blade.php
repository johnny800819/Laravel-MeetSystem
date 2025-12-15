@props(['disabled' => false, 'label' => '', 'name', 'type' => 'text', 'value' => '', 'required' => false])

<div>
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-medium leading-6 text-gray-900">{{ $label }}</label>
    @endif
    <div class="mt-2">
        <input 
            id="{{ $name }}" 
            name="{{ $name }}" 
            type="{{ $type }}" 
            value="{{ old($name, $value) }}"
            {{ $disabled ? 'disabled' : '' }}
            {{ $required ? 'required' : '' }}
            {!! $attributes->merge(['class' => 'block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6']) !!}
        >
        @error($name)
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>
