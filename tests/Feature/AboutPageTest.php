<?php

namespace Tests\Feature;

use Tests\TestCase;

class AboutPageTest extends TestCase
{
    public function test_about_page_shows_its_sections_in_order(): void
    {
        $this->get(route('about'))
            ->assertOk()
            ->assertSee('<title>About Us |', false)
            ->assertSeeInOrder([
                'About Us',
                'id="about-heading"',
                'id="our-mission"',
                'Our Mission',
                'id="our-vision"',
                'Our Vision',
                'id="why-choose-us-heading"',
            ], false);
    }

    public function test_about_section_on_the_about_page_has_no_learn_more_button(): void
    {
        $this->get(route('about'))->assertDontSee('Learn more');
    }

    public function test_homepage_learn_more_button_opens_the_about_page(): void
    {
        $this->get(route('home'))
            ->assertSeeInOrder(['id="about-heading"', 'href="' . route('about') . '"', 'Learn more'], false);
    }

    public function test_mission_has_its_photo_on_the_right_and_vision_on_the_left(): void
    {
        $html = $this->get(route('about'))->getContent();

        $this->assertMatchesRegularExpression('/id="our-mission".*?<img[^>]*lg:order-last/s', $html);
        $this->assertDoesNotMatchRegularExpression('/id="our-vision"[^>]*>\s*<img[^>]*lg:order-last/s', $html);
    }
}
