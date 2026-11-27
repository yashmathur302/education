@php($faqs = config('faqs.items'))

<section aria-labelledby="faqs-heading">
    <div class="mx-auto max-w-[1440px] px-4 py-14 sm:px-6 sm:py-16 lg:px-16 lg:py-20">
        <h2 id="faqs-heading" data-animate="fade-in" class="text-center font-display text-5xl font-extrabold text-ink sm:text-6xl lg:text-[4rem]">
            <x-squiggle>FAQ</x-squiggle>
        </h2>

        {{-- Native <details> elements sharing one name open one at a time; the accordion script backs this up in older browsers. --}}
        <div class="mt-10 lg:mt-12" data-accordion>
            @foreach ($faqs as $faq)
                <details name="home-faq" class="group" data-animate="fade-up" data-animate-delay="{{ $loop->index * 100 }}">
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

                    <p class="max-w-4xl pt-2 pb-6 pl-10 text-base leading-relaxed text-ink/80 motion-safe:animate-[fade-in_0.4s_ease-out]">
                        {{ $faq['answer'] }}
                    </p>
                </details>
            @endforeach
        </div>
    </div>
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
