<?php

namespace Tests\Feature;

use Tests\TestCase;

class AnimationsTest extends TestCase
{
    public function test_every_page_loads_the_js_flag_with_a_fallback_before_the_styles(): void
    {
        foreach (['home', 'about', 'services', 'blog', 'contact', 'find-tutor', 'privacy-policy'] as $route) {
            $this->get(route($route))->assertSeeInOrder([
                "document.documentElement.classList.add('js')",
                "classList.remove('js')",
                '/build/assets/app-',
            ], false);
        }
    }

    public function test_homepage_sections_have_their_planned_entrances(): void
    {
        $this->get(route('home'))->assertSeeInOrder([
            'data-animate="pulse"',
            'data-animate="zoom-in-down"',
            'data-animate="slide-from-left"',
            'data-animate="jello"',
            'data-animate="slide-from-right"',
            'id="why-choose-us-heading"',
            'data-animate="zoom-in"',
            'id="services-heading"',
            'id="testimonials-heading"',
            'id="faqs-heading"',
            'id="blogs-heading"',
            'data-animate="bounce-in-down"',
        ], false);
    }

    public function test_feature_blocks_slide_in_from_the_photo_side(): void
    {
        $html = $this->get(route('services'))->getContent();

        [$first, $second] = config('tutoring.services');

        $this->assertMatchesRegularExpression(
            '/id="' . $first['slug'] . '".*?<img.*?data-animate="slide-from-left".*?data-animate="slide-from-right"/s',
            $html,
        );
        $this->assertMatchesRegularExpression(
            '/id="' . $second['slug'] . '".*?<img.*?data-animate="slide-from-right".*?data-animate="slide-from-left"/s',
            $html,
        );
    }

    public function test_privacy_policy_text_is_not_animated(): void
    {
        $html = $this->get(route('privacy-policy'))->getContent();

        $this->assertDoesNotMatchRegularExpression('/<article[^>]*data-animate/', $html);
    }
}
