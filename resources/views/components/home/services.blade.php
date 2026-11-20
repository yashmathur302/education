@php
    // Replace the placeholder SVGs in public/images/home with the final photos (WebP, 960x540).
    $services = [
        [
            'title' => 'Online Tutor',
            'description' => 'Learn from experienced tutors in live video classes, from anywhere, at a time that suits your family.',
            'meta' => 'Live one-to-one classes · Flexible timings',
            'image' => 'images/home/service-online.svg',
            'imageAlt' => 'Student attending a live online class',
            'theme' => 'blush',
        ],
        [
            'title' => 'Offline Tutor',
            'description' => "A verified tutor visits your home for focused one-to-one sessions that follow your child's syllabus.",
            'meta' => 'Home tuition · Class 1 to 12',
            'image' => 'images/home/service-offline.svg',
            'imageAlt' => 'Tutor teaching a student at home',
            'theme' => 'mist',
        ],
    ];
@endphp

<section class="py-16 sm:py-20 lg:py-24" aria-labelledby="services-heading">
    <div class="mx-auto max-w-[1440px] px-4 sm:px-6">
        <h2 id="services-heading" class="text-center font-display text-5xl font-extrabold text-ink sm:text-6xl lg:text-[4.5rem]">
            Services
        </h2>

        <div class="mx-auto mt-12 grid max-w-[1200px] gap-16 md:grid-cols-2 md:gap-8 lg:mt-16 lg:gap-12">
            @foreach ($services as $service)
                <x-service-card
                    :title="$service['title']"
                    :description="$service['description']"
                    :meta="$service['meta']"
                    :image="asset($service['image'])"
                    :image-alt="$service['imageAlt']"
                    :href="route('find-tutor')"
                    :theme="$service['theme']"
                />
            @endforeach
        </div>
    </div>
</section>
