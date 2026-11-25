{{-- Multi-line text field with label, old value and validation message. --}}
@props([
    'name',
    'label',
    'rows' => 4,
    'hideLabel' => false,
])

<div>
    <x-form.label :for="$name" :hidden="$hideLabel">{{ $label }}</x-form.label>

    <textarea
        id="{{ $name }}"
        name="{{ $name }}"
        rows="{{ $rows }}"
        @error($name) aria-invalid="true" aria-describedby="{{ $name }}-error" @enderror
        {{ $attributes->class('form-control py-3') }}
    >{{ old($name) }}</textarea>

    <x-form.error :name="$name" />
</div>
