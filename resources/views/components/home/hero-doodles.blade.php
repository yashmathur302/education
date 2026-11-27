{{--
    Effect: floating doodles in the homepage banner. Four small school doodles
    bob gently (see app.css, "Effect: floating doodles") and, on desktop, move
    at slightly different speeds while scrolling (data-parallax, see
    resources/js/modules/parallax.js). Phones show only the star and the plane.
--}}
<div class="pointer-events-none absolute inset-0 -z-[5]" aria-hidden="true">
    {{-- Star --}}
    <div class="absolute top-[10%] right-[6%] w-9 sm:w-11 lg:top-[16%] lg:right-auto lg:left-[44%]" data-parallax="0.25">
        <svg class="doodle doodle--slow w-full" viewBox="0 0 48 48">
            <path d="M24 4l5.6 12.4L43 18l-10 9.3 2.6 13.4L24 34.2 12.4 40.7 15 27.3 5 18l13.4-1.6z" fill="#f6c453" stroke="#12343c" stroke-width="2.5" stroke-linejoin="round" />
        </svg>
    </div>

    {{-- Paper plane --}}
    <div class="absolute right-[8%] bottom-[14%] w-12 sm:w-14 lg:top-[12%] lg:right-[10%] lg:bottom-auto lg:w-16" data-parallax="0.4">
        <svg class="doodle doodle--drift w-full" viewBox="0 0 64 48">
            <path d="M4 22 60 4 40 44 30 28z" fill="#fff" stroke="#1b6f7f" stroke-width="2.5" stroke-linejoin="round" />
            <path d="M30 28 60 4M30 28l-2 12 8-8" fill="none" stroke="#1b6f7f" stroke-width="2.5" stroke-linejoin="round" stroke-linecap="round" />
        </svg>
    </div>

    {{-- Pencil --}}
    <div class="absolute bottom-[18%] left-[40%] hidden w-16 lg:block" data-parallax="0.15">
        <svg class="doodle doodle--tilt w-full" viewBox="0 0 80 24">
            <path d="M6 12 18 4h50a4 4 0 0 1 4 4v8a4 4 0 0 1-4 4H18z" fill="#e5522a" stroke="#12343c" stroke-width="2.5" stroke-linejoin="round" />
            <path d="M18 4v16" stroke="#12343c" stroke-width="2.5" />
            <path d="M6 12l5-3.4v6.8z" fill="#12343c" />
            <path d="M62 4v16" stroke="#12343c" stroke-width="2.5" />
        </svg>
    </div>

    {{-- ABC block --}}
    <div class="absolute right-[34%] bottom-[22%] hidden w-12 lg:block" data-parallax="0.3">
        <svg class="doodle doodle--slow doodle--offset w-full" viewBox="0 0 48 48">
            <rect x="4" y="4" width="40" height="40" rx="8" fill="#d5e5ea" stroke="#12343c" stroke-width="2.5" />
            <text x="24" y="33" text-anchor="middle" font-family="Sniglet, sans-serif" font-weight="800" font-size="24" fill="#e5522a">A</text>
        </svg>
    </div>
</div>
