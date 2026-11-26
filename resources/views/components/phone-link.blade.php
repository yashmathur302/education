@php($phone = config('site.phone'))

<a
    href="tel:{{ $phone['dial'] }}"
    {{ $attributes->class('inline-flex items-center gap-3 text-[0.9375rem] font-medium tracking-wide text-teal hover:text-brand') }}
>
    <x-icons.phone class="size-5 shrink-0" />
    {{ $phone['display'] }}
</a>
