@php
    $highlights = [
        'Verified, Experienced Tutors',
        'CBSE, ICSE and State Board Syllabus',
        'Home and Online Classes',
    ];
@endphp

<section class="py-16 sm:py-20 lg:py-24" aria-labelledby="about-heading">
    <div class="mx-auto grid max-w-[1440px] items-center gap-12 px-4 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-6">
        {{-- Replace public/images/home/about.svg with the final photo (WebP, 1280x720). --}}
        <x-tv-frame
            :src="asset('images/home/about.svg')"
            alt="Student learning with a tutor"
            class="mx-auto w-full max-w-[640px]"
        />

        <div class="max-w-[34rem]">
            <h2 id="about-heading" class="text-4xl font-semibold text-ink sm:text-5xl">
                Our Story
            </h2>

            <p class="mt-5 text-base leading-[1.75] text-ink/80 sm:text-lg sm:leading-[1.7]">
                We started with a simple belief: every child learns differently, and the right tutor can change
                how a student feels about a subject. Today we connect families with experienced home and online
                tutors for school subjects, board exams and competitive tests. Every tutor is interviewed and
                verified, then matched to your child's class, syllabus and pace, so learning feels personal and
                progress is easy to see.
            </p>

            <ul class="mt-7 space-y-4">
                @foreach ($highlights as $highlight)
                    <li class="flex items-center gap-3 text-base font-semibold text-ink sm:text-lg">
                        <span class="size-5 shrink-0 rounded-full border-[5px] border-brand bg-white" aria-hidden="true"></span>
                        {{ $highlight }}
                    </li>
                @endforeach
            </ul>

            <x-button :href="route('about')" variant="outline" class="mt-9">Learn more</x-button>
        </div>
    </div>
</section>
