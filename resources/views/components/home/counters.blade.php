{{--
    Key figures in one row. The final numbers are in the HTML (for search
    engines and visitors without JavaScript); counter.js counts them up from
    zero when the section scrolls into view.
--}}
@php($counters = config('tutoring.counters'))

<section class="py-12 sm:py-16 lg:py-20" aria-label="Our numbers">
    <dl class="mx-auto grid max-w-[1200px] grid-cols-2 gap-x-6 gap-y-10 px-4 sm:px-6 md:grid-cols-4 lg:gap-8" data-counters>
        @foreach ($counters as $counter)
            {{-- The label comes first in the HTML (as <dl> requires) but shows under the number. --}}
            <div class="flex flex-col items-center text-center lg:items-start lg:text-left">
                <dt class="mt-2 text-base font-bold tracking-wide text-ink uppercase sm:text-lg">{{ $counter['label'] }}</dt>
                <dd class="order-first font-display text-6xl leading-none font-extrabold text-brand sm:text-7xl md:text-6xl lg:text-[5.5rem]">
                    <span class="sr-only">{{ $counter['value'] . $counter['suffix'] }}</span>
                    <span aria-hidden="true"><span data-counter-target="{{ $counter['value'] }}">{{ $counter['value'] }}</span>{{ $counter['suffix'] }}</span>
                </dd>
            </div>
        @endforeach
    </dl>
</section>
