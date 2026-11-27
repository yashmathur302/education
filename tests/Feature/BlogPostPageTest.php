<?php

namespace Tests\Feature;

use Tests\TestCase;

class BlogPostPageTest extends TestCase
{
    public function test_every_post_has_its_own_page_with_its_article(): void
    {
        foreach (config('blog.posts') as $post) {
            $this->get(route('blog.show', $post['slug']))
                ->assertOk()
                ->assertSee('<h1', false)
                ->assertSee($post['title'])
                ->assertSee('<title>' . e($post['meta_title'] ?? $post['title']), false)
                ->assertSee('<meta property="og:type" content="article">', false)
                ->assertSee('class="article-content', false);
        }
    }

    public function test_blog_menu_item_is_highlighted_on_a_post_page(): void
    {
        $this->get(route('blog.show', config('blog.posts')[0]['slug']))
            ->assertSee('href="' . route('blog') . '"', false)
            ->assertSeeInOrder(['href="' . route('blog') . '"', 'aria-current="page"'], false);
    }

    public function test_unknown_post_returns_not_found(): void
    {
        $this->get('/blog/this-post-does-not-exist')->assertNotFound();
    }

    public function test_cards_on_home_and_blog_pages_link_to_the_same_post_pages(): void
    {
        $firstPostUrl = route('blog.show', config('blog.posts')[0]['slug']);

        $this->get(route('home'))->assertSee('href="' . $firstPostUrl . '"', false);
        $this->get(route('blog'))->assertSee('href="' . $firstPostUrl . '"', false);
    }

    public function test_first_post_has_next_but_no_previous_link(): void
    {
        [$first, $second] = config('blog.posts');

        $this->get(route('blog.show', $first['slug']))
            ->assertDontSee('rel="prev"', false)
            ->assertSee('rel="next"', false)
            ->assertSee(route('blog.show', $second['slug']), false);
    }

    public function test_last_post_has_previous_but_no_next_link(): void
    {
        $posts = config('blog.posts');
        $last = end($posts);
        $secondLast = prev($posts);

        $this->get(route('blog.show', $last['slug']))
            ->assertSee('rel="prev"', false)
            ->assertSee(route('blog.show', $secondLast['slug']), false)
            ->assertDontSee('rel="next"', false);
    }

    public function test_middle_post_has_both_links(): void
    {
        $this->get(route('blog.show', config('blog.posts')[1]['slug']))
            ->assertSee('rel="prev"', false)
            ->assertSee('rel="next"', false);
    }

    public function test_recent_posts_box_and_suggestions_leave_out_the_current_post(): void
    {
        [$first, $second, $third] = config('blog.posts');

        $this->get(route('blog.show', $first['slug']))
            ->assertSee('Recent Posts')
            ->assertSee('aria-label="More blog posts"', false)
            ->assertDontSee('More Blogs</h2>', false)
            ->assertSee($second['title'])
            ->assertSee($third['title'])
            ->assertDontSee('[recent-posts]');
    }

    public function test_article_has_no_video_or_comments(): void
    {
        $this->get(route('blog.show', config('blog.posts')[0]['slug']))
            ->assertDontSee('<iframe', false)
            ->assertDontSee('<video', false)
            ->assertDontSee('Leave a Reply')
            ->assertDontSee('Comment');
    }
}
