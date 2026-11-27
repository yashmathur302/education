{{--
    "Our Achievements": key figures in one row. The final numbers are in the
    HTML (for search engines and visitors without JavaScript); counter.js
    counts them up from zero when the section scrolls into view.
--}}
@php($counters = config('tutoring.counters'))

<section class="py-12 sm:py-16 lg:py-20" aria-labelledby="achievements-heading">
    <div class="mx-auto max-w-[1200px] px-4 sm:px-6">
        <h2 id="achievements-heading" data-animate="fade-in" class="text-center font-display text-4xl font-extrabold text-ink sm:text-5xl lg:text-[3.5rem]">
            Our <x-squiggle>Achievements</x-squiggle>
        </h2>

        <p data-animate="fade-in" data-animate-delay="200" class="mt-4 text-center text-base text-ink/75 sm:text-lg">
            Celebrating milestones and success stories in education
        </p>

        <dl class="mt-12 grid grid-cols-2 gap-x-6 gap-y-10 md:grid-cols-4 lg:mt-14 lg:gap-8" data-counters>
            @foreach ($counters as $counter)
                {{-- The label comes first in the HTML (as <dl> requires) but shows under the number. --}}
                <div data-animate="fade-up" data-animate-delay="{{ $loop->index * 150 }}" class="flex flex-col items-center text-center lg:items-start lg:text-left">
                    <dt class="mt-2 text-base font-bold tracking-wide text-ink uppercase sm:text-lg">{{ $counter['label'] }}</dt>
                    <dd class="order-first font-display text-6xl leading-none font-extrabold text-brand sm:text-7xl md:text-6xl lg:text-[5.5rem]">
                        <span class="sr-only">{{ $counter['value'] . $counter['suffix'] }}</span>
                        <span aria-hidden="true"><span data-counter-target="{{ $counter['value'] }}">{{ $counter['value'] }}</span>{{ $counter['suffix'] }}</span>
                    </dd>
                    <dd class="mt-1 max-w-[15rem] text-sm leading-relaxed text-ink/70">{{ $counter['description'] }}</dd>
                </div>
            @endforeach
        </dl>
    </div>
</section>
