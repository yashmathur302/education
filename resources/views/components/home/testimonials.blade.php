@php
    $testimonials = config('testimonials.items');

    // About eight seconds per card keeps the movement slow enough to read.
    $scrollDuration = max(count($testimonials), 1) * 8 . 's';
@endphp

<section class="relative overflow-hidden bg-sand" aria-labelledby="testimonials-heading">
    <div class="scalloped-edge pointer-events-none absolute inset-x-0 top-0" aria-hidden="true"></div>

    <div class="mx-auto grid max-w-[1440px] items-center gap-10 px-4 pt-20 pb-24 sm:px-6 lg:grid-cols-[2fr_3fr] lg:gap-16 lg:px-16 lg:pt-24 lg:pb-28">
        <div>
            <div class="flex items-start gap-3">
                <svg class="mt-1 size-10 shrink-0 text-lagoon sm:size-12" viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="24" cy="12" r="5" />
                    <circle cx="10" cy="18" r="4" />
                    <circle cx="38" cy="18" r="4" />
                    <path d="M15 40v-6a9 9 0 0 1 18 0v6" />
                    <path d="M3 40v-4a7 7 0 0 1 10-6.3M45 40v-4a7 7 0 0 0-10-6.3" />
                    <path d="M3 44h42" />
                </svg>

                <h2 id="testimonials-heading" class="font-display text-4xl leading-tight font-extrabold text-ink sm:text-5xl">
                    Lorem Ipsum Dolor
                </h2>
            </div>

            <p class="mt-4 max-w-md text-base leading-relaxed text-ink/80 sm:text-lg">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.
            </p>
        </div>

        <div data-testimonial-slider>
            <p class="relative z-10 rounded-xl bg-lagoon py-2.5 text-center text-lg font-semibold text-white">
                Parent Speak
            </p>

            {{--
                The list is repeated once so the downward scroll can loop without a gap.
                The copy stays clickable (it is often the one on screen) but is hidden
                from screen readers and skipped by the Tab key.
            --}}
            <div class="testimonial-viewport -mt-2 h-[480px] overflow-hidden sm:h-[520px]">
                <div class="vertical-marquee flex flex-col" style="--marquee-duration: {{ $scrollDuration }}">
                    @foreach (['original', 'copy'] as $group)
                        <div
                            class="flex flex-col gap-6 pb-6"
                            @if ($group === 'copy') aria-hidden="true" @endif
                        >
                            @foreach ($testimonials as $testimonial)
                                <x-testimonial-card
                                    :testimonial="$testimonial"
                                    :quote-id="'testimonial-' . $group . '-' . $loop->iteration"
                                    :keyboard-focusable="$group === 'original'"
                                />
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="scalloped-edge pointer-events-none absolute inset-x-0 bottom-0 -scale-y-100" aria-hidden="true"></div>
</section>
