{{-- Replace public/images/home/hero.svg with the final photo (WebP, about 1920x760). --}}
<section class="relative isolate overflow-hidden bg-slate-100">
    <img
        src="{{ asset('images/home/hero.svg') }}"
        alt=""
        width="1920"
        height="760"
        fetchpriority="high"
        decoding="async"
        class="absolute inset-0 -z-20 size-full object-cover object-[70%_center]"
    >
    <div class="absolute inset-0 -z-10 bg-linear-to-r from-white/90 via-white/70 to-white/10 lg:via-white/40 lg:to-transparent"></div>

    <div class="mx-auto flex min-h-[460px] max-w-[1440px] items-center px-4 pt-16 pb-14 sm:min-h-[500px] sm:px-6 lg:min-h-[534px] lg:px-6 lg:pt-20">
        <div class="max-w-xl">
            <h1 data-animate="zoom-in-down" class="font-display text-[2.25rem] leading-[1.15] font-extrabold text-ink sm:text-5xl xl:text-[3.5rem]">
                Find the Right Tutor for Your Child
            </h1>

            <p data-animate="fade-up" data-animate-delay="400" class="mt-5 max-w-lg text-base leading-relaxed text-ink/80 sm:text-lg">
                Qualified, verified tutors for every class, board and subject, matched to your child's learning needs.
            </p>

            <div data-animate="zoom-in" data-animate-delay="700" class="mt-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:gap-6">
                <x-button :href="route('find-tutor')" size="lg">Find Tutor</x-button>
                <x-phone-link />
            </div>
        </div>
    </div>

    <div class="scalloped-edge scalloped-edge--rise pointer-events-none absolute inset-x-0 bottom-0" aria-hidden="true"></div>
</section>
