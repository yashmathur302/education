{{-- Previous / page numbers / Next links. Renders nothing when everything fits on one page. --}}
@props(['paginator'])

@if ($paginator->hasPages())
    @php
        $linkClasses = 'flex size-11 items-center justify-center rounded-full border border-slate-300 text-sm font-semibold text-ink transition-colors hover:border-brand hover:text-brand';
    @endphp

    <nav {{ $attributes->class('flex items-center justify-center gap-2') }} aria-label="Blog pages">
        @if ($paginator->onFirstPage())
            <span class="{{ $linkClasses }} pointer-events-none opacity-40" aria-hidden="true">&larr;</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="{{ $linkClasses }}" rel="prev" aria-label="Previous page">&larr;</a>
        @endif

        @foreach (range(1, $paginator->lastPage()) as $page)
            @if ($page === $paginator->currentPage())
                <span class="{{ $linkClasses }} border-brand bg-brand text-white hover:text-white" aria-current="page">{{ $page }}</span>
            @else
                <a href="{{ $paginator->url($page) }}" class="{{ $linkClasses }}" aria-label="Page {{ $page }}">{{ $page }}</a>
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="{{ $linkClasses }}" rel="next" aria-label="Next page">&rarr;</a>
        @else
            <span class="{{ $linkClasses }} pointer-events-none opacity-40" aria-hidden="true">&rarr;</span>
        @endif
    </nav>
@endif
