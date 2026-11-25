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

    public function test_slider_copy_used_for_looping_is_hidden_from_assistive_technology(): void
    {
        $this->get(route('home'))
            ->assertSee('aria-hidden="true" inert', false)
            ->assertSee('id="testimonial-copy-1"', false);
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
