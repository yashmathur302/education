<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomeTestimonialsTest extends TestCase
{
    public function test_homepage_shows_every_testimonial_with_a_read_more_button(): void
    {
        $response = $this->get(route('home'))->assertOk();

        foreach (config('testimonials.items') as $testimonial) {
            $response->assertSee($testimonial['quote']);
        }

        $response->assertSee('data-read-more', false)
            ->assertSee('aria-controls="testimonial-original-1"', false);
    }

    public function test_slider_copy_is_clickable_but_hidden_from_screen_readers_and_tab_key(): void
    {
        $html = $this->get(route('home'))->getContent();

        $this->assertStringNotContainsString(' inert', $html);
        $this->assertStringContainsString('id="testimonial-copy-1"', $html);
        $this->assertMatchesRegularExpression('/aria-controls="testimonial-copy-1"\s+tabindex="-1"/', $html);
        $this->assertDoesNotMatchRegularExpression('/aria-controls="testimonial-original-1"\s+tabindex="-1"/', $html);
    }

    public function test_homepage_sections_are_in_the_agreed_order(): void
    {
        $this->get(route('home'))->assertSeeInOrder([
            'id="services-heading"',
            'id="testimonials-heading"',
            'Testimonials',
            'id="faqs-heading"',
            'id="blogs-heading"',
        ], false);
    }

    public function test_initials_are_shown_when_there_is_no_photo(): void
    {
        config(['testimonials.items' => [[
            'name' => 'Asha Verma',
            'relation' => 'Parent',
            'photo' => null,
            'quote' => 'Very helpful tutors.',
        ]]]);

        $this->get(route('home'))->assertSee('AV');
    }
}
