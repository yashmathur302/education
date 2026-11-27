{{--
    The GyanDoorStep logo. WebP for modern browsers, PNG as a fallback.
    Pass a height class (e.g. h-14) to size it; the width follows.
--}}
<picture>
    <source srcset="{{ asset('images/brand/logo.webp') }}" type="image/webp">
    <img
        src="{{ asset('images/brand/logo.png') }}"
        alt="{{ config('site.name') }}"
        width="480"
        height="238"
        decoding="async"
        {{ $attributes->class('w-auto') }}
    >
</picture>
