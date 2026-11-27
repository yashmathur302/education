@php
    $publishedAt = \Illuminate\Support\Carbon::parse($post['published_at']);
    $postUrl = route('blog.show', $post['slug']);
    $authorInitials = collect(explode(' ', $post['author']))->map(fn (string $word) => mb_substr($word, 0, 1))->take(2)->implode('');
@endphp

<x-layouts.app
    :title="$post['title']"
    :description="$post['excerpt']"
    :image="$post['image']"
    type="article"
>
    <article>
        <header data-animate="fade-in" class="mx-auto max-w-[1048px] px-4 pt-12 sm:px-6 lg:pt-16">
            <div class="flex items-center justify-between gap-4">
                <p class="text-sm font-semibold text-brand">{{ $post['category'] }}</p>
                <x-share-links :url="$postUrl" :title="$post['title']" />
            </div>

            <h1 class="mt-4 text-3xl leading-tight font-bold text-ink sm:text-4xl lg:text-5xl">{{ $post['title'] }}</h1>

            <div class="mt-6 flex flex-wrap items-center gap-x-5 gap-y-2 text-sm text-ink/70">
                <span class="flex items-center gap-2">
                    <span class="flex size-8 items-center justify-center rounded-full bg-mist text-xs font-bold text-lagoon" aria-hidden="true">{{ $authorInitials }}</span>
                    by <span class="font-semibold text-ink">{{ $post['author'] }}</span>
                </span>
                <time datetime="{{ $publishedAt->toDateString() }}">{{ $publishedAt->format('j F Y') }}</time>
                <span>{{ $readingMinutes }} min read</span>
            </div>

            <div class="mt-6 h-2 rounded-full bg-brand" aria-hidden="true"></div>
        </header>

        <div data-animate="fade-up" data-animate-delay="200" class="mx-auto mt-10 max-w-[1200px] px-4 sm:px-6">
            <img
                src="{{ asset($post['image']) }}"
                alt=""
                width="1200"
                height="675"
                fetchpriority="high"
                decoding="async"
                class="aspect-video w-full rounded-[48px_32px_56px_40px/40px_56px_32px_48px] object-cover"
            >
        </div>

        <div class="article-content mx-auto mt-12 max-w-[1048px] px-4 sm:px-6">
            {!! $bodyHtml !!}
        </div>

        <footer class="mx-auto mt-12 max-w-[1048px] px-4 pb-16 sm:px-6 lg:pb-20">
            @if (! empty($post['tags']))
                <p class="text-sm">
                    <span class="font-semibold text-ink">Tags:</span>
                    <span class="text-brand">{{ implode(', ', $post['tags']) }}</span>
                </p>
            @endif

            <x-post-navigation :previous="$neighbours['previous']" :next="$neighbours['next']" class="mt-8" />
        </footer>
    </article>

    @if ($suggestedPosts->isNotEmpty())
        <section class="relative overflow-hidden bg-sand" aria-label="More blog posts">
            <div class="scalloped-edge pointer-events-none absolute inset-x-0 top-0" aria-hidden="true"></div>

            <div class="relative mx-auto max-w-[1280px] px-4 pt-20 pb-24 sm:px-6 lg:pt-24 lg:pb-28">
                <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-3 lg:gap-8">
                    @foreach ($suggestedPosts as $suggestedPost)
                        <x-blog-card :post="$suggestedPost" data-animate="fade-up" :data-animate-delay="$loop->index * 150" />
                    @endforeach
                </div>
            </div>

            <div class="scalloped-edge pointer-events-none absolute inset-x-0 bottom-0 -scale-y-100" aria-hidden="true"></div>
        </section>
    @endif

    @push('page-end')
        <script type="application/ld+json">
            {!! json_encode([
                '@context' => 'https://schema.org',
                '@type' => 'BlogPosting',
                'headline' => $post['title'],
                'description' => $post['excerpt'],
                'image' => asset($post['image']),
                'datePublished' => $publishedAt->toDateString(),
                'author' => ['@type' => 'Organization', 'name' => $post['author']],
                'publisher' => ['@type' => 'Organization', 'name' => config('site.name')],
                'mainEntityOfPage' => $postUrl,
            ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG) !!}
        </script>
    @endpush
</x-layouts.app>
