<x-layouts.app>
    <x-page-hero
        title="Services"
        subtitle="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore."
    />

    <section class="py-14 sm:py-16 lg:py-24" aria-label="Our services">
        <div class="mx-auto max-w-[1308px] space-y-16 px-4 sm:px-6 lg:space-y-24">
            @foreach (config('tutoring.services') as $service)
                <x-service-feature :service="$service" :reversed="$loop->even" />
            @endforeach
        </div>
    </section>
</x-layouts.app>
