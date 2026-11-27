<?php

namespace Tests\Feature;

use Tests\TestCase;

class BrandingAndContentTest extends TestCase
{
    public function test_every_page_has_the_favicon_logo_and_brand_name(): void
    {
        foreach (['home', 'about', 'services', 'blog', 'contact', 'find-tutor', 'privacy-policy'] as $route) {
            $response = $this->get(route($route))
                ->assertSee('<link rel="apple-touch-icon"', false)
                ->assertSee('favicon.ico', false)
                ->assertSee('| GyanDoorStep</title>', false);

            $this->assertSame(2, substr_count($response->getContent(), 'images/brand/logo.webp'));
        }
    }

    public function test_brand_files_exist(): void
    {
        foreach (['favicon.ico', 'images/brand/logo.webp', 'images/brand/logo.png', 'images/brand/apple-touch-icon.png', 'images/og/default.jpg'] as $file) {
            $this->assertFileExists(public_path($file));
        }
    }

    public function test_homepage_shows_the_short_about_text_and_about_page_the_longer_one(): void
    {
        $this->get(route('home'))
            ->assertSee(config('about.home.paragraphs')[0])
            ->assertDontSee(config('about.page.heading'));

        $this->get(route('about'))
            ->assertSee(config('about.page.eyebrow'))
            ->assertSee(config('about.page.heading'))
            ->assertSee(config('about.page.paragraphs')[2])
            ->assertSee(config('about.mission_and_vision')[0]['description'])
            ->assertSee(config('about.mission_and_vision')[1]['description']);
    }

    public function test_homepage_shows_achievements_and_why_choose_content(): void
    {
        $this->get(route('home'))
            ->assertSee('Celebrating milestones and success stories in education')
            ->assertSee('data-counter-target="500"', false)
            ->assertSee('<span class="sr-only">98%</span>', false)
            ->assertSee('Guaranteed Results')
            ->assertSee('Get a replacement tutor at no additional cost');
    }
}
