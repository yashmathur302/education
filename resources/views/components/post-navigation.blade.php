{{--
    Links to the previous and next blog posts. A side is left out when there
    is no post in that direction; nothing renders when both are missing.
--}}
@props([
    'previous' => null,
    'next' => null,
])

@if ($previous || $next)
    <nav {{ $attributes->class('grid gap-6 rounded-2xl bg-sand p-6 sm:grid-cols-2 sm:p-8') }} aria-label="More posts">
        @if ($previous)
            <a href="{{ route('blog.show', $previous['slug']) }}" class="group block" rel="prev">
                <span class="flex items-center gap-2 text-sm font-semibold text-ink/70">
                    <span aria-hidden="true">&larr;</span> Previous
                </span>
                <span class="mt-1 block font-semibold text-brand group-hover:underline">{{ $previous['title'] }}</span>
            </a>
        @endif

        @if ($next)
            <a href="{{ route('blog.show', $next['slug']) }}" class="group block sm:col-start-2 sm:text-right" rel="next">
                <span class="flex items-center gap-2 text-sm font-semibold text-ink/70 sm:justify-end">
                    Next <span aria-hidden="true">&rarr;</span>
                </span>
                <span class="mt-1 block font-semibold text-brand group-hover:underline">{{ $next['title'] }}</span>
            </a>
        @endif
    </nav>
@endif
