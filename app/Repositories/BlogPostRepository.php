<?php

namespace App\Repositories;

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
     * A single post by its slug, or null when no post matches.
     *
     * @return array<string, string>|null
     */
    public function findBySlug(string $slug): ?array
    {
        return $this->all()->firstWhere('slug', $slug);
    }
}
