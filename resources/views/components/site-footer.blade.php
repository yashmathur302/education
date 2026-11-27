@php
    $footer = config('site.footer');
    $phone = config('site.phone');
    $address = config('site.address');
    $email = config('site.email');
    $cta = config('site.cta');
    $linkClasses = 'text-base font-medium text-ink hover:text-brand';
@endphp

<footer class="relative isolate flex flex-col pt-36 lg:h-[520px] lg:pt-[270px]">
    <x-footer.landscape />

    <x-illustrations.pine-tree data-animate="rotate-in-left" data-animate-delay="300" class="absolute top-[49px] left-[8%] w-[34px] text-ink lg:top-[90px] lg:left-[6%] lg:w-[60px]" />
    <x-illustrations.fox data-animate="bounce-in-down" class="absolute top-[4px] left-[22%] w-[90px] lg:top-[26px] lg:left-[15%] lg:w-[150px]" />
    <x-illustrations.round-tree data-animate="rotate-in-right" data-animate-delay="300" class="absolute top-[50px] left-[82%] w-[36px] text-ink lg:top-[85px] lg:left-[80%] lg:w-[58px]" />

    <div class="bg-sand lg:bg-transparent">
        <div class="mx-auto grid max-w-[1440px] grid-cols-2 gap-x-6 gap-y-8 px-4 pt-4 pb-10 sm:px-6 lg:grid-cols-5 lg:items-center lg:gap-y-0 lg:pr-28 lg:pl-12 lg:py-0">
            <a
                href="{{ route('home') }}"
                class="col-span-2 font-display text-4xl font-extrabold text-ink lg:order-3 lg:col-span-1 lg:justify-self-center lg:text-[2.5rem]"
            >
                {{ config('site.name') }}
            </a>

            @foreach ($footer['link_columns'] as $column)
                <ul class="space-y-2 {{ $loop->first ? 'lg:order-1' : 'lg:order-2' }}">
                    @foreach ($column as $link)
                        <li><a href="{{ route($link['route']) }}" class="{{ $linkClasses }}">{{ $link['label'] }}</a></li>
                    @endforeach
                </ul>
            @endforeach

            <address class="col-span-2 space-y-3 text-base font-medium text-ink not-italic lg:order-4 lg:col-span-1">
                <p class="flex items-start gap-3">
                    <x-icons.map-pin class="mt-0.5 size-5 shrink-0 text-brand" />
                    <span>
                        @foreach ($address['lines'] as $line)
                            <span class="block">{{ $line }}</span>
                        @endforeach
                    </span>
                </p>
                <p>
                    <a href="tel:{{ $phone['dial'] }}" class="flex items-center gap-3 hover:text-brand">
                        <x-icons.phone class="size-5 shrink-0 text-brand" />
                        {{ $phone['display'] }}
                    </a>
                </p>
                <p>
                    <a href="mailto:{{ $email }}" class="flex items-center gap-3 hover:text-brand">
                        <x-icons.mail class="size-5 shrink-0 text-brand" />
                        {{ $email }}
                    </a>
                </p>
            </address>

            <div class="col-span-2 flex flex-col items-start gap-8 lg:order-5 lg:col-span-1 lg:items-end lg:gap-12">
                <x-button :href="route($cta['route'])" size="lg">{{ $cta['label'] }}</x-button>

                <ul class="flex items-center gap-7">
                    @foreach (config('site.social') as $profile)
                        <li>
                            <a href="{{ $profile['url'] }}" target="_blank" rel="noopener" class="block text-ink hover:text-brand motion-safe:hover:animate-[pop_0.3s_ease-out]" aria-label="{{ $profile['label'] }}">
                                <x-dynamic-component :component="'icons.' . $profile['icon']" class="size-6" />
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="bg-sand lg:mt-auto lg:bg-transparent">
        <div class="mx-auto flex max-w-[1440px] flex-col gap-4 border-t border-ink/10 py-6 pr-20 pl-4 text-sm text-ink/80 sm:pr-24 sm:pl-6 lg:flex-row lg:items-center lg:justify-between lg:border-0 lg:pr-28 lg:pl-12 lg:pb-8">
            <p>&copy; {{ now()->year }} {{ config('site.name') }}. All rights reserved.</p>

            <ul class="flex flex-wrap gap-x-5 gap-y-2">
                @foreach ($footer['bottom_links'] as $link)
                    <li><a href="{{ route($link['route']) }}" class="hover:text-brand">{{ $link['label'] }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</footer>
