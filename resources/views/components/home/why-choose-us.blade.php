@php
    /*
     * On large screens the points are scattered like the design: each entry
     * sets where its centre sits inside the points area. Every number uses
     * the same size. On smaller screens they fall back to a two-column grid.
     */
    $points = [
        [
            'label' => 'Verified Tutors',
            'icon' => 'shield-check',
            'position' => 'lg:left-[12%] lg:top-0',
        ],
        [
            'label' => 'Personalised Plans',
            'icon' => 'notebook-pen',
            'position' => 'lg:left-[37%] lg:top-[58%]',
        ],
        [
            'label' => 'Home & Online Classes',
            'icon' => 'home-laptop',
            'position' => 'lg:left-[62%] lg:top-[10%]',
        ],
        [
            'label' => 'Progress Updates',
            'icon' => 'chart-up',
            'position' => 'lg:left-[87%] lg:top-[60%]',
        ],
    ];
@endphp

<section class="relative overflow-hidden bg-sky" aria-labelledby="why-choose-us-heading">
    <div class="scalloped-edge pointer-events-none absolute inset-x-0 top-0" aria-hidden="true"></div>

    <div class="mx-auto max-w-[1440px] px-4 pt-20 pb-20 sm:px-6 lg:pt-28 lg:pb-24">
        <h2
            id="why-choose-us-heading"
            class="font-display text-5xl leading-none font-extrabold text-ink sm:text-6xl lg:ml-[17%] lg:text-[6.5rem]"
        >
            Why Choose Us
        </h2>

        <p class="mt-6 max-w-lg text-sm leading-relaxed text-ink/80 sm:text-base lg:ml-[33%] lg:max-w-[30rem]">
            From the first call to the final exam, we stay with your family. Tutors are carefully selected,
            lessons follow your child's own syllabus, and you always know how your child is progressing.
        </p>

        <ol class="mt-12 grid grid-cols-2 gap-x-4 gap-y-10 sm:gap-x-8 lg:relative lg:mt-8 lg:block lg:h-[450px]">
            @foreach ($points as $point)
                <li class="relative text-center text-[6rem] sm:text-[8rem] lg:absolute lg:-translate-x-1/2 lg:text-[11rem] {{ $point['position'] }}">
                    <span class="block leading-[0.8] font-bold tracking-tight text-white/60 select-none" aria-hidden="true">
                        {{ sprintf('%02d', $loop->iteration) }}
                    </span>

                    <x-dynamic-component
                        :component="'icons.' . $point['icon']"
                        class="absolute top-[0.5em] left-1/2 size-11 -translate-x-1/2 -translate-y-1/2 text-brand lg:size-16"
                    />

                    <span class="relative -mt-2 block text-lg font-bold text-ink sm:text-2xl lg:text-[1.75rem] lg:whitespace-nowrap">
                        {{ $point['label'] }}
                    </span>
                </li>
            @endforeach
        </ol>
    </div>

    <div class="scalloped-edge pointer-events-none absolute inset-x-0 bottom-0 -scale-y-100" aria-hidden="true"></div>
</section>
