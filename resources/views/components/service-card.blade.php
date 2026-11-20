{{--
    Pastel service card with a soft, hand-drawn outline, a rounded image,
    and a round arrow button resting on the bottom edge.
--}}
@props([
    'title',
    'description',
    'meta',
    'image',
    'imageAlt' => '',
    'href',
    'theme' => 'blush',
])

@php
    $themes = [
        'blush' => ['card' => 'text-blush', 'accent' => 'text-brand', 'button' => 'bg-brand hover:bg-brand-dark'],
        'mist' => ['card' => 'text-mist', 'accent' => 'text-lagoon', 'button' => 'bg-lagoon hover:bg-ink'],
    ];

    $colors = $themes[$theme];
@endphp

<article {{ $attributes->class('relative isolate flex flex-col items-center px-6 pt-9 pb-12 text-center sm:px-10 sm:pt-10') }}>
    {{-- Card outline: stretches with the card, so the edges keep their gentle bulges at any width. --}}
    <svg
        class="absolute inset-0 -z-10 size-full {{ $colors['card'] }}"
        viewBox="0 0 100 100"
        preserveAspectRatio="none"
        fill="currentColor"
        aria-hidden="true"
    >
        <path d="M10 9C35 3 70 0 90 3 98 4 100 10 99.5 20 99 45 100 70 99 88 98.5 97 94 100 86 100H16C7 100 3 96 2.5 88 1 65 0 40 1.5 22 2 14 4 11 10 9Z" />
    </svg>

    <h3 class="text-2xl font-bold sm:text-3xl {{ $colors['accent'] }}">{{ $title }}</h3>

    <img
        src="{{ $image }}"
        alt="{{ $imageAlt }}"
        width="960"
        height="540"
        loading="lazy"
        decoding="async"
        class="mt-5 aspect-video w-full max-w-[320px] rounded-[30px_22px_30px_24px/24px_30px_22px_30px] object-cover"
    >

    <p class="mt-5 max-w-md text-sm leading-relaxed text-ink sm:text-base">{{ $description }}</p>

    <p class="mt-3 text-sm font-semibold {{ $colors['accent'] }}">{{ $meta }}</p>

    <a
        href="{{ $href }}"
        class="absolute bottom-0 left-1/2 flex size-12 -translate-x-1/2 translate-y-1/2 items-center justify-center rounded-full text-white ring-[6px] ring-white transition-colors {{ $colors['button'] }}"
        aria-label="Find {{ strtolower($title) }}"
    >
        <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M13 6l6 6-6 6" />
        </svg>
    </a>
</article>
