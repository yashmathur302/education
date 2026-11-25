@props([
    'for',
    'hidden' => false,
])

<label for="{{ $for }}" @class(['mb-2 block text-sm font-medium text-ink', 'sr-only' => $hidden])>
    {{ $slot }}
</label>
