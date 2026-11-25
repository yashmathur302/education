{{-- Single checkbox with its label text in the slot. --}}
@props(['name'])

<div>
    <label for="{{ $name }}" class="inline-flex cursor-pointer items-start gap-3 text-sm text-ink">
        <input
            id="{{ $name }}"
            name="{{ $name }}"
            type="checkbox"
            value="1"
            @checked(old($name))
            @error($name) aria-invalid="true" aria-describedby="{{ $name }}-error" @enderror
            {{ $attributes->class('mt-0.5 size-4 shrink-0 accent-brand') }}
        >
        <span>{{ $slot }}</span>
    </label>

    <x-form.error :name="$name" />
</div>
