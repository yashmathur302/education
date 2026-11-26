@php($services = config('tutoring.services'))

<section class="py-14 sm:py-16 lg:py-20" aria-labelledby="services-heading">
    <div class="mx-auto max-w-[1440px] px-4 sm:px-6">
        <h2 id="services-heading" class="text-center font-display text-5xl font-extrabold text-ink sm:text-6xl lg:text-[4rem]">
            Services
        </h2>

        <div class="mx-auto mt-10 grid max-w-[960px] gap-14 md:grid-cols-2 md:gap-8 lg:mt-10 lg:gap-10">
            @foreach ($services as $service)
                <x-service-card
                    :title="$service['title']"
                    :description="$service['summary']"
                    :meta="$service['meta']"
                    :image="asset($service['image'])"
                    :image-alt="$service['image_alt']"
                    :href="route('find-tutor')"
                    :theme="$service['theme']"
                />
            @endforeach
        </div>
    </div>
</section>
