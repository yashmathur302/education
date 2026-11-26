<?php

namespace App\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

/**
 * Read-only access to the blog posts stored in config/blog.php.
 */
class BlogPostRepository
{
    /**
     * All posts, newest first.
     *
     * @return Collection<int, array<string, string>>
     */
    public function all(): Collection
    {
        return collect(config('blog.posts', []))
            ->sortByDesc('published_at')
            ->values();
    }

    /**
     * The most recent posts.
     *
     * @return Collection<int, array<string, string>>
     */
    public function latest(int $limit): Collection
    {
        return $this->all()->take($limit);
    }

    /**
     * One page of posts, newest first, with links that keep the current URL.
     *
     * @return LengthAwarePaginator<int, array<string, string>>
     */
    public function paginate(int $perPage): LengthAwarePaginator
    {
        $posts = $this->all();
        $currentPage = Paginator::resolveCurrentPage();

        return new LengthAwarePaginator(
            $posts->forPage($currentPage, $perPage)->values(),
            $posts->count(),
            $perPage,
            $currentPage,
            ['path' => Paginator::resolveCurrentPath()],
        );
    }

    /**
     * A single post by its slug, or null when no post matches.
     *
     * @return array<string, mixed>|null
     */
    public function findBySlug(string $slug): ?array
    {
        return $this->all()->firstWhere('slug', $slug);
    }

    /**
     * The posts just before and after the given one, in the same order the
     * site lists them. Either side is null at the start or end of the list.
     *
     * @return array{previous: array<string, mixed>|null, next: array<string, mixed>|null}
     */
    public function neighbours(string $slug): array
    {
        $posts = $this->all();
        $index = $posts->search(fn (array $post) => $post['slug'] === $slug);

        if ($index === false) {
            return ['previous' => null, 'next' => null];
        }

        return [
            'previous' => $posts->get($index - 1),
            'next' => $posts->get($index + 1),
        ];
    }

    /**
     * Other posts to suggest below an article, newest first.
     *
     * @return Collection<int, array<string, mixed>>
     */
    public function relatedTo(string $slug, int $limit): Collection
    {
        return $this->all()
            ->reject(fn (array $post) => $post['slug'] === $slug)
            ->take($limit)
            ->values();
    }
}
