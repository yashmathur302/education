{{--
    About section with the TV-frame photo. Text comes from config/about.php:
    "home" on the homepage (short text, underlined last word, Learn more link)
    and "page" on the About Us page (the longer story, no link).
--}}
@props(['variant' => 'home'])

@php
    $isHome = $variant === 'home';
    $content = config('about.' . $variant);
    $headingStart = \Illuminate\Support\Str::beforeLast($content['heading'], ' ');
    $headingLastWord = \Illuminate\Support\Str::afterLast($content['heading'], ' ');
@endphp

<section class="py-16 sm:py-20 lg:py-24" aria-labelledby="about-heading">
    <div class="mx-auto grid max-w-[1440px] items-center gap-12 px-4 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-6">
        {{-- Replace public/images/home/about.svg with the final photo (WebP, 1280x720). --}}
        <x-tv-frame
            :src="asset('images/home/about.svg')"
            alt="Student learning with a tutor"
            class="mx-auto w-full max-w-[640px]"
            data-animate="slide-from-left"
            data-parallax="0.08"
        />

        <div data-animate="slide-from-right" data-animate-delay="150" class="max-w-[36rem]">
            @if ($content['eyebrow'])
                <p class="mb-3 text-sm font-semibold tracking-wide text-brand uppercase">{{ $content['eyebrow'] }}</p>
            @endif

            <h2 id="about-heading" @class([
                'font-semibold text-ink',
                'text-4xl sm:text-5xl' => $isHome,
                'text-3xl leading-tight sm:text-4xl' => ! $isHome,
            ])>
                @if ($isHome)
                    {{ $headingStart }} <x-squiggle>{{ $headingLastWord }}</x-squiggle>
                @else
                    {{ $content['heading'] }}
                @endif
            </h2>

            @foreach ($content['paragraphs'] as $paragraph)
                <p class="mt-5 text-base leading-[1.75] text-ink/80 sm:text-lg sm:leading-[1.7]">{{ $paragraph }}</p>
            @endforeach

            @if ($isHome)
                <x-button :href="route('about')" variant="outline" class="mt-9">Learn more</x-button>
            @endif
        </div>
    </div>
</section>
