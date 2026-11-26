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
     * @return array<string, string>|null
     */
    public function findBySlug(string $slug): ?array
    {
        return $this->all()->firstWhere('slug', $slug);
    }
}
