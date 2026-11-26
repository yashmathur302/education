{{--
    Floating WhatsApp button, always visible, stacked above the back-to-top
    button. wa.me opens the WhatsApp app on phones and WhatsApp Web on computers.
--}}
@php
    $whatsapp = config('site.whatsapp');
    $chatUrl = 'https://wa.me/' . $whatsapp['number'] . '?text=' . rawurlencode($whatsapp['message']);
@endphp

<a
    href="{{ $chatUrl }}"
    target="_blank"
    rel="noopener"
    class="fixed right-4 bottom-[4.75rem] z-50 flex size-12 items-center justify-center rounded-full bg-[#25d366] text-white shadow-lg transition-transform hover:scale-105 sm:right-6 sm:bottom-[5.5rem]"
    aria-label="Chat with us on WhatsApp"
>
    <x-icons.whatsapp class="size-7" />
</a>
