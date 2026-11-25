{{--
    Hero banner for inner pages: sand background, the header's wave above
    and the homepage hero's rising wave below. An optional illustration
    can be passed in the "illustration" slot and sits on the right.
--}}
@props([
    'title',
    'subtitle' => null,
])

<section class="relative isolate overflow-hidden bg-sand">
    <div class="mx-auto flex min-h-[240px] max-w-[1440px] items-center px-4 pt-14 pb-16 sm:min-h-[280px] sm:px-6 lg:min-h-[320px] lg:pt-16 lg:pb-20">
        <div class="max-w-xl">
            <h1 class="text-4xl leading-tight font-bold text-ink sm:text-5xl lg:text-[3.5rem]">{{ $title }}</h1>

            @if ($subtitle)
                <p class="mt-4 text-base leading-relaxed text-ink/80 sm:text-lg">{{ $subtitle }}</p>
            @endif
        </div>
    </div>

    @isset($illustration)
        <div class="pointer-events-none absolute right-0 bottom-0 -z-10 hidden h-full md:block" aria-hidden="true">
            {{ $illustration }}
        </div>
    @endisset

    <div class="scalloped-edge scalloped-edge--rise pointer-events-none absolute inset-x-0 bottom-0" aria-hidden="true"></div>
</section>
