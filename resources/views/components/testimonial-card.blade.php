{{--
    One testimonial: quote shortened to three lines with a Read More toggle,
    then the person's photo (or initials), name and relation.
--}}
@props([
    'testimonial',
    'quoteId',
])

@php
    $initials = collect(explode(' ', $testimonial['name']))
        ->filter()
        ->map(fn (string $word) => mb_substr($word, 0, 1))
        ->take(2)
        ->implode('');
@endphp

<figure {{ $attributes->class('rounded-2xl bg-white p-6 shadow-sm') }}>
    <svg class="h-6 w-8 text-brand" viewBox="0 0 32 24" fill="currentColor" aria-hidden="true">
        <path d="M0 24V14C0 6.3 4.2 1.6 12.6 0l1.4 3.4C9.3 4.9 7 7.6 6.8 11.4H13V24H0Zm19 0V14c0-7.7 4.2-12.4 12.6-14L33 3.4c-4.7 1.5-7 4.2-7.2 8H32V24H19Z" />
    </svg>

    <blockquote id="{{ $quoteId }}" class="mt-3 line-clamp-3 text-base leading-relaxed text-ink sm:text-lg" data-testimonial-quote>
        {{ $testimonial['quote'] }}
    </blockquote>

    <button
        type="button"
        class="mt-2 inline-flex items-center gap-1.5 text-base font-medium text-lagoon hover:text-brand"
        aria-expanded="false"
        aria-controls="{{ $quoteId }}"
        data-read-more
    >
        <svg class="size-4 transition-transform" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true" data-read-more-icon>
            <path stroke-linecap="round" stroke-linejoin="round" d="m6 3 5 5-5 5" />
        </svg>
        <span data-read-more-label>Read More</span>
    </button>

    <figcaption class="mt-5 flex items-center gap-4">
        @if ($testimonial['photo'])
            <img
                src="{{ asset($testimonial['photo']) }}"
                alt=""
                width="64"
                height="64"
                loading="lazy"
                decoding="async"
                class="size-16 shrink-0 rounded-full border-2 border-slate-200 object-cover"
            >
        @else
            <span class="flex size-16 shrink-0 items-center justify-center rounded-full border-2 border-slate-200 bg-mist text-lg font-bold text-lagoon" aria-hidden="true">
                {{ $initials }}
            </span>
        @endif

        <span>
            <span class="block text-lg font-bold text-ink">{{ $testimonial['name'] }}</span>
            <span class="block text-sm text-ink/70">{{ $testimonial['relation'] }}</span>
        </span>
    </figcaption>
</figure>
