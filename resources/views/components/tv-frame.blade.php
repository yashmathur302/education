{{--
    Image inside a television-shaped frame with antennas and legs.
    Pass video-url to turn the play icon into a link to the video.
--}}
@props([
    'src',
    'alt' => '',
    'width' => 1280,
    'height' => 720,
    'videoUrl' => null,
])

{{-- Top padding = 42% width x (138 / 264) viewBox ratio, so the antennas sit exactly on the frame. --}}
<figure {{ $attributes->class('relative pt-[21.95%] pb-[8%]') }}>
    <svg
        class="absolute top-0 left-1/2 w-[42%] -translate-x-1/2 text-ink"
        viewBox="0 -8 264 138"
        fill="currentColor"
        aria-hidden="true"
    >
        <path d="M116 120C96 92 70 60 40 30L58 18C86 50 114 84 140 112Z" />
        <path d="M148 120C168 92 194 60 224 30L206 18C178 50 150 84 124 112Z" />
        <ellipse cx="34" cy="20" rx="34" ry="19" transform="rotate(-36 34 20)" />
        <ellipse cx="230" cy="20" rx="34" ry="19" transform="rotate(36 230 20)" />
        <path d="M78 131C100 100 164 100 186 131Z" />
    </svg>

    <div class="rounded-[1.75rem] bg-ink p-3 sm:rounded-[2.25rem] sm:p-5">
        <div class="relative overflow-hidden rounded-2xl sm:rounded-[1.25rem]">
            <img
                src="{{ $src }}"
                alt="{{ $alt }}"
                width="{{ $width }}"
                height="{{ $height }}"
                loading="lazy"
                decoding="async"
                class="aspect-video w-full object-cover"
            >

            @php
                $playClasses = 'absolute top-1/2 left-1/2 flex size-16 -translate-x-1/2 -translate-y-1/2 items-center '
                    . 'justify-center rounded-full border-4 border-white/90 text-white/90 sm:size-24';
            @endphp

            @if ($videoUrl)
                <a href="{{ $videoUrl }}" target="_blank" rel="noopener" class="{{ $playClasses }} transition-transform hover:scale-105" aria-label="Play video">
                    <x-icons.play class="ml-1 size-7 sm:size-10" />
                </a>
            @else
                <span class="{{ $playClasses }}" aria-hidden="true">
                    <x-icons.play class="ml-1 size-7 sm:size-10" />
                </span>
            @endif
        </div>
    </div>

    <svg
        class="absolute bottom-0 left-1/2 w-[42%] -translate-x-1/2 text-ink"
        viewBox="0 0 264 56"
        fill="currentColor"
        aria-hidden="true"
    >
        <path d="M102 0C94 20 72 36 32 40C18 41 15 55 30 55C62 55 98 40 120 0Z" />
        <path d="M166 0C176 18 198 34 224 48C235 55 248 46 240 38C220 25 200 13 186 0Z" />
    </svg>
</figure>
