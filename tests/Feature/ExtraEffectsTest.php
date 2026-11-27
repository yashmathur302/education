<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExtraEffectsTest extends TestCase
{
    public function test_homepage_section_headings_have_the_hand_drawn_underline(): void
    {
        $html = $this->get(route('home'))->getContent();

        $this->assertSame(7, substr_count($html, 'class="squiggle-word"'));
    }

    public function test_homepage_banner_has_floating_doodles_with_parallax(): void
    {
        $this->get(route('home'))
            ->assertSee('doodle doodle--slow', false)
            ->assertSee('doodle doodle--drift', false)
            ->assertSee('data-parallax="0.25"', false);
    }

    public function test_service_and_blog_cards_can_tilt(): void
    {
        $html = $this->get(route('home'))->getContent();
        $cardCount = count(config('tutoring.services')) + min(3, count(config('blog.posts')));

        $this->assertSame($cardCount, substr_count($html, '<article data-tilt'));
    }

    public function test_blog_post_has_a_sticky_reading_progress_bar(): void
    {
        $this->get(route('blog.show', config('blog.posts')[0]['slug']))
            ->assertSee('data-reading-progress', false)
            ->assertSee('sticky top-0', false);
    }

    public function test_service_card_arrows_nudge_on_hover(): void
    {
        $this->get(route('home'))->assertSee('group-hover/arrow:animate-[arrow-nudge', false);
    }
}
