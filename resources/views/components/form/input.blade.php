{{-- Text-style input with label, old value and validation message. --}}
@props([
    'name',
    'label',
    'type' => 'text',
    'hideLabel' => false,
])

<div>
    <x-form.label :for="$name" :hidden="$hideLabel">{{ $label }}</x-form.label>

    <input
        id="{{ $name }}"
        name="{{ $name }}"
        type="{{ $type }}"
        value="{{ old($name) }}"
        @error($name) aria-invalid="true" aria-describedby="{{ $name }}-error" @enderror
        {{ $attributes->class('form-control h-12') }}
    >

    <x-form.error :name="$name" />
</div>
