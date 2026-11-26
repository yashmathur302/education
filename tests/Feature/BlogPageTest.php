<?php

namespace Tests\Feature;

use Tests\TestCase;

class BlogPageTest extends TestCase
{
    public function test_blog_page_shows_the_hero_and_every_post(): void
    {
        $response = $this->get(route('blog'))
            ->assertOk()
            ->assertSee('<title>Blogs |', false)
            ->assertSee('Blogs');

        foreach (config('blog.posts') as $post) {
            $response->assertSee($post['title']);
        }
    }

    public function test_cards_use_a_white_wave_on_the_white_page(): void
    {
        $this->get(route('blog'))
            ->assertSee('text-white', false)
            ->assertDontSee('h-4 w-full sm:h-5 text-sand', false);
    }

    public function test_posts_are_split_into_pages_of_nine(): void
    {
        config(['blog.posts' => $this->fakePosts(10)]);

        $this->get(route('blog'))
            ->assertSee('Post 10')
            ->assertSee('Post 2')
            ->assertDontSee('Post 1<', false)
            ->assertSee('aria-label="Next page"', false);

        $this->get(route('blog', ['page' => 2]))
            ->assertSee('Post 1')
            ->assertDontSee('Post 10');
    }

    public function test_no_pagination_when_all_posts_fit_on_one_page(): void
    {
        $this->get(route('blog'))->assertDontSee('aria-label="Blog pages"', false);
    }

    public function test_friendly_message_when_there_are_no_posts(): void
    {
        config(['blog.posts' => []]);

        $this->get(route('blog'))->assertSee('New posts are coming soon.');
    }

    /**
     * Posts numbered 1 to $count, where a higher number is newer.
     *
     * @return array<int, array<string, string>>
     */
    private function fakePosts(int $count): array
    {
        return array_map(fn (int $number) => [
            'slug' => "post-{$number}",
            'title' => "Post {$number}",
            'category' => 'Tips',
            'image' => 'images/blog/study-habits.svg',
            'published_at' => now()->subDays(100 - $number)->toDateString(),
        ], range(1, $count));
    }
}
