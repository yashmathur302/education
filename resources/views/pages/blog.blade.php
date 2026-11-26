<x-layouts.app>
    <x-page-hero
        title="Blogs"
        subtitle="Study tips, exam guidance and helpful advice for students and parents."
    />

    <section class="py-14 sm:py-16 lg:py-20" aria-label="Blog posts">
        <div class="mx-auto max-w-[1280px] px-4 sm:px-6">
            @if ($posts->isEmpty())
                <p class="text-center text-lg text-ink/70">New posts are coming soon. Please check back later.</p>
            @else
                <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-3 lg:gap-8 lg:gap-y-14">
                    @foreach ($posts as $post)
                        <x-blog-card :post="$post" background="white" />
                    @endforeach
                </div>

                <x-pagination :paginator="$posts" class="mt-14" />
            @endif
        </div>
    </section>
</x-layouts.app>
