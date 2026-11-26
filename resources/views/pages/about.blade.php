<x-layouts.app>
    <x-page-hero
        title="About Us"
        subtitle="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore."
    >
        <x-slot:illustration>
            <x-illustrations.fox class="h-full w-auto py-6 pr-6 lg:pr-16" />
        </x-slot:illustration>
    </x-page-hero>

    <x-home.about :show-learn-more="false" />

    {{-- Sand section with the site's waves, like the design's "Our graduates" / "Our community" blocks. --}}
    <section class="relative overflow-hidden bg-sand" aria-label="Our mission and vision">
        <div class="scalloped-edge pointer-events-none absolute inset-x-0 top-0" aria-hidden="true"></div>

        <div class="mx-auto max-w-[1308px] space-y-16 px-4 pt-20 pb-24 sm:px-6 lg:space-y-24 lg:pt-28 lg:pb-32">
            @foreach (config('about.mission_and_vision') as $item)
                <x-feature-block :item="$item" :reversed="$loop->odd" />
            @endforeach
        </div>

        <div class="scalloped-edge pointer-events-none absolute inset-x-0 bottom-0 -scale-y-100" aria-hidden="true"></div>
    </section>

    {{-- White version so the page alternates: sand Mission/Vision, then white. --}}
    <x-home.why-choose-us background="white" />
</x-layouts.app>
