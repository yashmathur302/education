{{--
    Embedded Google Map for a place or address. It loads only when it
    scrolls into view, so it does not slow down the first paint.
--}}
@props([
    'query',
    'title' => 'Our location on Google Maps',
])

<div {{ $attributes->class('overflow-hidden bg-slate-100') }}>
    <iframe
        src="https://maps.google.com/maps?q={{ urlencode($query) }}&z=15&output=embed"
        title="{{ $title }}"
        class="size-full border-0"
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        allowfullscreen
    ></iframe>
</div>
