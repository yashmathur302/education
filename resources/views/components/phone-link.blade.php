@php($phone = config('site.phone'))

<a
    href="tel:{{ $phone['dial'] }}"
    {{ $attributes->class('inline-flex items-center gap-3 text-[0.9375rem] font-medium tracking-wide text-teal hover:text-brand') }}
>
    <svg class="size-5 shrink-0" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
        <path d="M6.6 10.8a15.1 15.1 0 0 0 6.6 6.6l2.2-2.2a1 1 0 0 1 1-.25 11.4 11.4 0 0 0 3.6.57 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.2 2.45.57 3.57a1 1 0 0 1-.25 1z" />
    </svg>
    {{ $phone['display'] }}
</a>
