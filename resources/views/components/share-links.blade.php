{{-- Round buttons that share the given page on Facebook, X or by email. --}}
@props([
    'url',
    'title',
])

@php
    $encodedUrl = urlencode($url);
    $encodedTitle = urlencode($title);

    $networks = [
        [
            'label' => 'Share on Facebook',
            'icon' => 'facebook',
            'href' => "https://www.facebook.com/sharer/sharer.php?u={$encodedUrl}",
        ],
        [
            'label' => 'Share on X',
            'icon' => 'x-twitter',
            'href' => "https://twitter.com/intent/tweet?url={$encodedUrl}&text={$encodedTitle}",
        ],
        [
            'label' => 'Share by email',
            'icon' => 'mail',
            'href' => 'mailto:?subject=' . rawurlencode($title) . '&body=' . rawurlencode($url),
        ],
    ];
@endphp

<ul {{ $attributes->class('flex items-center gap-2') }}>
    @foreach ($networks as $network)
        <li>
            <a
                href="{{ $network['href'] }}"
                @unless (str_starts_with($network['href'], 'mailto:')) target="_blank" rel="noopener" @endunless
                class="flex size-9 items-center justify-center rounded-full bg-lagoon text-white transition-colors hover:bg-brand motion-safe:hover:animate-[pop_0.3s_ease-out]"
                aria-label="{{ $network['label'] }}"
            >
                <x-dynamic-component :component="'icons.' . $network['icon']" class="size-4" />
            </a>
        </li>
    @endforeach
</ul>
