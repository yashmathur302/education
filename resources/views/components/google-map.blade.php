{{--
    Embedded Google Map. Uses the embed link copied from Google Maps when one
    is set; otherwise it searches Google Maps for the given address. Only
    google.com embed links are accepted. The map loads when it scrolls into
    view, so it does not slow down the first paint.
--}}
@props([
    'embedUrl' => null,
    'query' => '',
    'title' => 'Our location on Google Maps',
])

@php
    $isGoogleEmbed = is_string($embedUrl) && str_starts_with($embedUrl, 'https://www.google.com/maps/embed');

    $src = $isGoogleEmbed
        ? $embedUrl
        : 'https://maps.google.com/maps?q=' . urlencode($query) . '&z=15&output=embed';
@endphp

<div {{ $attributes->class('overflow-hidden bg-slate-100') }}>
    <iframe
        src="{{ $src }}"
        title="{{ $title }}"
        class="size-full border-0"
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        allowfullscreen
    ></iframe>
</div>
