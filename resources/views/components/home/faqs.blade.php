@php($faqs = config('faqs.items'))

<section class="relative mt-12 overflow-hidden bg-sand" aria-labelledby="faqs-heading">
    <div class="scalloped-edge pointer-events-none absolute inset-x-0 top-0" aria-hidden="true"></div>

    <x-illustrations.mountain-sun class="pointer-events-none absolute bottom-0 left-0 hidden w-[440px] text-ink/10 lg:block" />

    <div class="relative mx-auto max-w-[1440px] px-4 pt-16 pb-24 sm:px-6 lg:px-16 lg:pt-20 lg:pb-28">
        <h2 id="faqs-heading" class="sr-only">Frequently Asked Questions</h2>

        {{-- Native <details> elements sharing one name open one at a time; the accordion script backs this up in older browsers. --}}
        <div data-accordion>
            @foreach ($faqs as $faq)
                <details name="home-faq" class="group">
                    <summary class="flex cursor-pointer list-none items-start gap-4 py-3 [&::-webkit-details-marker]:hidden">
                        <span class="mt-1 flex size-6 shrink-0 items-center justify-center rounded-sm border-2 border-lagoon text-lagoon" aria-hidden="true">
                            <svg class="size-3.5" viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                                <path d="M2 7h10" />
                                <path d="M7 2v10" class="group-open:hidden" />
                            </svg>
                        </span>

                        <span class="text-xl leading-snug font-semibold text-ink transition-colors group-hover:text-lagoon sm:text-2xl">
                            {{ $faq['question'] }}
                        </span>
                    </summary>

                    <p class="max-w-4xl pt-2 pb-6 pl-10 text-base leading-relaxed text-ink/80">
                        {{ $faq['answer'] }}
                    </p>
                </details>
            @endforeach
        </div>

        <div class="mt-12 text-center lg:mt-14">
            <x-button :href="route('contact')" variant="outline">View all</x-button>
        </div>
    </div>

    <div class="scalloped-edge pointer-events-none absolute inset-x-0 bottom-0 -scale-y-100" aria-hidden="true"></div>
</section>

@push('page-end')
    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => array_map(fn (array $faq) => [
                '@type' => 'Question',
                'name' => $faq['question'],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq['answer']],
            ], $faqs),
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG) !!}
    </script>
@endpush
