<section class="relative overflow-hidden bg-sand" aria-labelledby="blogs-heading">
    <div class="scalloped-edge pointer-events-none absolute inset-x-0 top-0" aria-hidden="true"></div>

    <x-illustrations.mountain-sun class="pointer-events-none absolute bottom-0 left-0 hidden w-[260px] text-ink/10 lg:block" />
    <x-illustrations.lollipop-tree class="pointer-events-none absolute right-[6%] bottom-0 hidden w-[90px] lg:block" />

    <div class="relative mx-auto max-w-[1280px] px-4 pt-20 pb-24 sm:px-6 lg:pt-24 lg:pb-28">
        <h2 id="blogs-heading" class="text-center font-display text-5xl font-extrabold text-ink sm:text-6xl lg:text-[4rem]">
            Blogs
        </h2>

        <div class="mt-10 grid gap-10 sm:grid-cols-2 lg:mt-12 lg:grid-cols-3 lg:gap-8">
            @foreach ($posts as $post)
                <x-blog-card :post="$post" />
            @endforeach
        </div>

        <div class="mt-12 text-center lg:mt-14">
            <x-button :href="route('blog')" variant="outline">View all</x-button>
        </div>
    </div>

    <div class="scalloped-edge pointer-events-none absolute inset-x-0 bottom-0 -scale-y-100" aria-hidden="true"></div>
</section>
