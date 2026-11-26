<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

/**
 * Turns a post's Markdown article into HTML for the blog post page.
 *
 * Articles live in resources/content/blog/{slug}.md. A paragraph that
 * contains only [recent-posts] is replaced with the Recent Posts box.
 */
class BlogPostRenderer
{
    private const RECENT_POSTS_MARKER = '<p>[recent-posts]</p>';

    private const WORDS_PER_MINUTE = 200;

    /**
     * @param  array<string, mixed>  $post
     * @param  Collection<int, array<string, mixed>>  $recentPosts
     */
    public function toHtml(array $post, Collection $recentPosts): string
    {
        $markdown = $this->markdown($post['slug']);

        if ($markdown === '') {
            return '';
        }

        $html = Str::markdown($markdown, [
            'html_input' => 'strip',
            'allow_unsafe_links' => false,
        ]);

        $recentPostsHtml = view('components.recent-posts', ['posts' => $recentPosts])->render();

        return str_replace(self::RECENT_POSTS_MARKER, $recentPostsHtml, $html);
    }

    /**
     * Estimated reading time in whole minutes (at least one).
     */
    public function readingMinutes(string $slug): int
    {
        $wordCount = str_word_count(strip_tags($this->markdown($slug)));

        return max(1, (int) ceil($wordCount / self::WORDS_PER_MINUTE));
    }

    private function markdown(string $slug): string
    {
        $path = resource_path("content/blog/{$slug}.md");

        return File::exists($path) ? File::get($path) : '';
    }
}
