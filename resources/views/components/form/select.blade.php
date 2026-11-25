{{-- Dropdown with label, placeholder option, old value and validation message. --}}
@props([
    'name',
    'label',
    'options' => [],
    'placeholder' => null,
    'hideLabel' => false,
])

<div>
    <x-form.label :for="$name" :hidden="$hideLabel">{{ $label }}</x-form.label>

    <select
        id="{{ $name }}"
        name="{{ $name }}"
        @error($name) aria-invalid="true" aria-describedby="{{ $name }}-error" @enderror
        {{ $attributes->class('form-control h-12') }}
    >
        @if ($placeholder)
            <option value="">{{ $placeholder }}</option>
        @endif

        @foreach ($options as $value => $text)
            <option value="{{ $value }}" @selected(old($name) === (string) $value)>{{ $text }}</option>
        @endforeach
    </select>

    <x-form.error :name="$name" />
</div>
