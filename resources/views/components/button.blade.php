@props([
    'href' => null,
    'type' => 'button',
    'size' => 'md',
    'variant' => 'solid',
])

@php
    $sizeClasses = [
        'md' => 'px-6 py-2.5 text-base',
        'lg' => 'px-8 py-3.5 text-lg',
    ];

    $variantClasses = [
        'solid' => 'border-brand bg-brand text-white hover:border-brand-dark hover:bg-brand-dark',
        'outline' => 'border-brand bg-transparent text-brand hover:bg-brand hover:text-white',
    ];

    $classes = 'inline-flex items-center justify-center rounded border font-display font-extrabold tracking-wide '
        . 'transition duration-200 motion-safe:hover:scale-105 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand '
        . $sizeClasses[$size] . ' ' . $variantClasses[$variant];
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->class($classes) }}>{{ $slot }}</a>
@else
    <button type="{{ $type }}" {{ $attributes->class($classes) }}>{{ $slot }}</button>
@endif
