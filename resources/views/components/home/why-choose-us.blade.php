@php
    /*
     * On large screens the points are scattered like the design: each entry
     * sets where its centre sits inside the points area and how big its
     * number is. On smaller screens they fall back to a two-column grid.
     */
    $points = [
        [
            'label' => 'Verified Tutors',
            'icon' => 'shield-check',
            'layout' => 'lg:left-[9%] lg:top-0 lg:text-[7rem]',
        ],
        [
            'label' => 'Personalised Plans',
            'icon' => 'notebook-pen',
            'layout' => 'lg:left-[35%] lg:top-[58%] lg:text-[7rem]',
        ],
        [
            'label' => 'Home & Online Classes',
            'icon' => 'home-laptop',
            'layout' => 'lg:left-[61%] lg:top-[2%] lg:text-[12rem]',
        ],
        [
            'label' => 'Progress Updates',
            'icon' => 'chart-up',
            'layout' => 'lg:left-[87%] lg:top-[60%] lg:text-[8.5rem]',
        ],
    ];
@endphp

<section class="relative overflow-hidden bg-sky" aria-labelledby="why-choose-us-heading">
    <div class="scalloped-edge scalloped-edge--rise scalloped-edge--small absolute inset-x-0 top-0 -scale-y-100" aria-hidden="true"></div>

    <div class="mx-auto max-w-[1100px] px-4 pt-20 pb-24 sm:px-6 lg:pt-24 lg:pb-28">
        <h2
            id="why-choose-us-heading"
            class="font-display text-5xl leading-none font-extrabold text-ink sm:text-6xl lg:ml-[17%] lg:text-[6.5rem]"
        >
            Why Choose Us
        </h2>

        <p class="mt-6 max-w-lg text-sm leading-relaxed text-ink/80 sm:text-base lg:ml-[34%] lg:max-w-[30rem]">
            From the first call to the final exam, we stay with your family. Tutors are carefully selected,
            lessons follow your child's own syllabus, and you always know how your child is progressing.
        </p>

        <ol class="mt-12 grid grid-cols-2 gap-x-4 gap-y-10 sm:gap-x-8 lg:relative lg:mt-14 lg:ml-[11%] lg:block lg:h-[300px] lg:w-[75%]">
            @foreach ($points as $point)
                <li class="relative text-center text-[5.5rem] sm:text-[6.5rem] lg:absolute lg:-translate-x-1/2 {{ $point['layout'] }}">
                    <span class="block leading-[0.8] font-semibold tracking-tight text-white/70 select-none" aria-hidden="true">
                        {{ sprintf('%02d', $loop->iteration) }}
                    </span>

                    <x-dynamic-component
                        :component="'icons.' . $point['icon']"
                        class="absolute top-[0.36em] left-1/2 size-10 -translate-x-1/2 -translate-y-1/2 text-brand lg:size-12"
                    />

                    <span class="relative -mt-4 block text-base font-semibold text-ink sm:text-lg lg:whitespace-nowrap">
                        {{ $point['label'] }}
                    </span>
                </li>
            @endforeach
        </ol>
    </div>

    <div class="scalloped-edge scalloped-edge--rise scalloped-edge--small absolute inset-x-0 bottom-0" aria-hidden="true"></div>
</section>
