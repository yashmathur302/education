{{--
    A wide photo next to a taller white text card that slightly overlaps it
    vertically. Used for services, mission and vision. Set "reversed" to put
    the photo on the right and the card on the left.

    $item needs: slug, title, image, image_alt, paragraphs.
--}}
@props([
    'item',
    'reversed' => false,
])

@php
    // The photo slides in from the side it sits on, the card from the other.
    $photoEntrance = $reversed ? 'slide-from-right' : 'slide-from-left';
    $cardEntrance = $reversed ? 'slide-from-left' : 'slide-from-right';
@endphp

<article id="{{ $item['slug'] }}" {{ $attributes->class('grid scroll-mt-8 items-center lg:grid-cols-2') }}>
    <img
        src="{{ asset($item['image']) }}"
        alt="{{ $item['image_alt'] }}"
        width="1260"
        height="670"
        loading="lazy"
        decoding="async"
        data-animate="{{ $photoEntrance }}"
        @class([
            'aspect-[630/335] w-full rounded-lg object-cover',
            'lg:order-last' => $reversed,
        ])
    >

    <div data-animate="{{ $cardEntrance }}" data-animate-delay="150" class="relative -mt-8 mx-3 rounded-lg bg-white px-6 py-10 shadow-[0_12px_40px_rgba(18,52,60,0.10)] sm:mx-8 sm:px-12 sm:py-12 lg:m-0 lg:px-[60px] lg:py-[60px]">
        <h2 class="text-4xl leading-tight font-bold text-ink sm:text-5xl">{{ $item['title'] }}</h2>

        @foreach ($item['paragraphs'] as $paragraph)
            <p class="mt-5 text-base leading-[1.65] text-ink/85 sm:text-lg">{{ $paragraph }}</p>
        @endforeach
    </div>
</article>
