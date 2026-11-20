@php
    $navigation = config('site.navigation');
    $cta = config('site.cta');
@endphp

<header class="relative z-30 bg-white">
    {{-- On large screens a three-column grid keeps the menu centred between the logo and the actions. --}}
    <div class="mx-auto flex h-16 max-w-[1440px] items-center justify-between px-4 sm:px-6 lg:grid lg:h-[78px] lg:grid-cols-[1fr_auto_1fr] lg:gap-8 lg:px-6">
        <a href="{{ route('home') }}" class="font-display text-3xl font-extrabold text-ink lg:justify-self-start lg:text-[2.5rem]">
            {{ config('site.name') }}
        </a>

        <div
            id="site-menu"
            class="absolute inset-x-0 top-full z-40 hidden bg-white px-4 pb-6 shadow-lg sm:px-6 lg:contents"
            data-menu
        >
            <nav aria-label="Primary">
                <ul class="flex flex-col lg:flex-row lg:items-center lg:gap-6 xl:gap-8">
                    @foreach ($navigation as $item)
                        @php($isActive = request()->routeIs($item['route']))

                        <li>
                            <a
                                href="{{ route($item['route']) }}"
                                @class([
                                    'relative block border-b border-slate-100 py-3 text-base font-semibold lg:border-0 lg:py-0',
                                    'text-brand lg:before:absolute lg:before:-top-4 lg:before:left-1/2 lg:before:size-2 lg:before:-translate-x-1/2 lg:before:rounded-full lg:before:bg-brand' => $isActive,
                                    'text-ink hover:text-brand' => ! $isActive,
                                ])
                                @if ($isActive) aria-current="page" @endif
                            >
                                {{ $item['label'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>

            <div class="mt-5 flex flex-col items-start gap-4 sm:flex-row sm:items-center lg:mt-0 lg:justify-self-end lg:gap-5">
                <x-phone-link class="lg:hidden xl:inline-flex" />
                <x-button :href="route($cta['route'])">{{ $cta['label'] }}</x-button>
            </div>
        </div>

        <button
            type="button"
            class="inline-flex size-11 items-center justify-center rounded text-ink lg:hidden"
            aria-controls="site-menu"
            aria-expanded="false"
            aria-label="Open menu"
            data-menu-toggle
        >
            <svg class="size-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <path stroke-linecap="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <div class="scalloped-edge pointer-events-none absolute inset-x-0 top-full" aria-hidden="true"></div>
</header>
