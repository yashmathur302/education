@props([
    'href' => null,
    'type' => 'button',
    'size' => 'md',
])

@php
    $sizeClasses = [
        'md' => 'px-6 py-2.5 text-base',
        'lg' => 'px-8 py-3.5 text-lg',
    ];

    $classes = 'inline-flex items-center justify-center rounded font-display font-extrabold tracking-wide text-white '
        . 'bg-brand transition-colors hover:bg-brand-dark focus-visible:outline-2 focus-visible:outline-offset-2 '
        . 'focus-visible:outline-brand ' . $sizeClasses[$size];
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->class($classes) }}>{{ $slot }}</a>
@else
    <button type="{{ $type }}" {{ $attributes->class($classes) }}>{{ $slot }}</button>
@endif
