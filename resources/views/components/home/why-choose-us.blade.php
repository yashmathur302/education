{{--
    Used on the homepage (light blue with waves, the default) and on the
    About Us page with background="white" (no waves, darker numbers so
    they stay visible on white).
--}}
@props(['background' => 'sky'])

@php
    $themes = [
        'sky' => ['section' => 'bg-sky', 'numbers' => 'text-white/60', 'waves' => true],
        'white' => ['section' => 'bg-white', 'numbers' => 'text-sky', 'waves' => false],
    ];

    $theme = $themes[$background];

    /*
     * On large screens the points are scattered like the design: each entry
     * sets where its centre sits inside the points area. Every number uses
     * the same size. On smaller screens they stack (two columns on tablets).
     */
    $points = [
        [
            'title' => 'Verified & Experienced Tutors',
            'description' => 'Learn from carefully verified, qualified, and experienced tutors who provide personalized guidance for every student.',
            'icon' => 'shield-check',
            'position' => 'lg:left-[15%] lg:top-0',
        ],
        [
            'title' => 'Flexible Learning Schedules',
            'description' => "Enjoy the convenience of choosing tuition timings that fit your child's daily routine and learning needs.",
            'icon' => 'clock',
            'position' => 'lg:left-[38%] lg:top-[50%]',
        ],
        [
            'title' => 'Guaranteed Results',
            'description' => 'Not satisfied with the tutor? Get a replacement tutor at no additional cost and continue learning with confidence.',
            'icon' => 'award',
            'position' => 'lg:left-[62%] lg:top-[6%]',
        ],
        [
            'title' => 'Affordable Tuition Fees',
            'description' => 'Access quality education and expert guidance at competitive prices that suit your budget.',
            'icon' => 'rupee',
            'position' => 'lg:left-[85%] lg:top-[52%]',
        ],
    ];
@endphp

<section {{ $attributes->class(['relative overflow-hidden', $theme['section']]) }} aria-labelledby="why-choose-us-heading">
    @if ($theme['waves'])
        <div class="scalloped-edge pointer-events-none absolute inset-x-0 top-0" aria-hidden="true"></div>
    @endif

    <div class="mx-auto max-w-[1440px] px-4 pt-20 pb-20 sm:px-6 lg:pt-28 lg:pb-24">
        <h2
            id="why-choose-us-heading"
            data-animate="fade-in"
            class="text-center font-display text-4xl leading-tight font-extrabold text-ink sm:text-5xl lg:text-[4.25rem]"
        >
            Why Choose <x-squiggle>GyanDoorStep?</x-squiggle>
        </h2>

        <ol class="mt-12 grid gap-x-8 gap-y-12 sm:grid-cols-2 lg:relative lg:mt-16 lg:block lg:h-[580px]">
            @foreach ($points as $point)
                <li data-animate="zoom-in" data-animate-delay="{{ $loop->index * 200 }}" class="relative mx-auto w-full max-w-[19rem] text-center text-[6rem] sm:text-[7rem] lg:absolute lg:w-[19rem] lg:-translate-x-1/2 lg:text-[9rem] {{ $point['position'] }}">
                    <span class="block leading-[0.8] font-bold tracking-tight select-none {{ $theme['numbers'] }}" aria-hidden="true">
                        {{ sprintf('%02d', $loop->iteration) }}
                    </span>

                    <x-dynamic-component
                        :component="'icons.' . $point['icon']"
                        class="absolute top-[0.5em] left-1/2 size-11 -translate-x-1/2 -translate-y-1/2 text-brand lg:size-14"
                    />

                    <h3 class="relative -mt-2 text-xl leading-snug font-bold text-ink sm:text-2xl">{{ $point['title'] }}</h3>
                    <p class="mt-2 text-sm leading-relaxed text-ink/75 sm:text-base">{{ $point['description'] }}</p>
                </li>
            @endforeach
        </ol>
    </div>

    @if ($theme['waves'])
        <div class="scalloped-edge pointer-events-none absolute inset-x-0 bottom-0 -scale-y-100" aria-hidden="true"></div>
    @endif
</section>
