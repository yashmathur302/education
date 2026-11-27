{{--
    Blog post teaser: image with a category tag and a wavy bottom edge,
    followed by the post title. The wave is filled with the colour behind
    the card, so pass the section background: "sand" (default) or "white".
--}}
@props([
    'post',
    'background' => 'sand',
])

@php
    $waveColors = [
        'sand' => 'text-sand',
        'white' => 'text-white',
    ];
@endphp

<article data-tilt {{ $attributes->class('group') }}>
    <a href="{{ route('blog.show', $post['slug']) }}" class="block">
        <div class="relative overflow-hidden rounded-t-2xl">
            <img
                src="{{ asset($post['image']) }}"
                alt=""
                width="800"
                height="450"
                loading="lazy"
                decoding="async"
                class="aspect-[16/9] w-full object-cover transition-transform duration-500 group-hover:scale-105"
            >

            <span class="absolute top-4 left-4 rounded-full bg-ink px-3.5 py-1.5 text-xs font-bold tracking-wide text-white uppercase">
                {{ $post['category'] }}
            </span>

            <svg
                class="absolute inset-x-0 -bottom-px h-4 w-full sm:h-5 {{ $waveColors[$background] }}"
                viewBox="0 0 300 20"
                preserveAspectRatio="none"
                fill="currentColor"
                aria-hidden="true"
            >
                <path d="M0 20V10C25 0 50 0 75 10S125 20 150 10 200 0 225 10 275 20 300 10V20Z" />
            </svg>
        </div>

        <h3 class="mt-5 text-lg leading-snug font-bold text-ink transition-colors group-hover:text-brand sm:text-xl">
            {{ $post['title'] }}
        </h3>
    </a>
</article>
