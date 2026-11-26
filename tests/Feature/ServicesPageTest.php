<?php

namespace Tests\Feature;

use Tests\TestCase;

class ServicesPageTest extends TestCase
{
    public function test_services_page_shows_the_hero_and_every_service(): void
    {
        $response = $this->get(route('services'))
            ->assertOk()
            ->assertSee('<title>Services |', false);

        foreach (config('tutoring.services') as $service) {
            $response->assertSee('id="' . $service['slug'] . '"', false)
                ->assertSee($service['title'])
                ->assertSee($service['paragraphs'][0]);
        }
    }

    public function test_second_service_has_its_photo_on_the_right(): void
    {
        $html = $this->get(route('services'))->getContent();

        [$first, $second] = config('tutoring.services');

        $this->assertMatchesRegularExpression(
            '/id="' . $second['slug'] . '".*?<img[^>]*lg:order-last/s',
            $html,
        );
        $this->assertDoesNotMatchRegularExpression(
            '/id="' . $first['slug'] . '"[^>]*>\s*<img[^>]*lg:order-last/s',
            $html,
        );
    }

    public function test_homepage_cards_use_the_same_service_details(): void
    {
        $response = $this->get(route('home'));

        foreach (config('tutoring.services') as $service) {
            $response->assertSee($service['title'])->assertSee($service['summary']);
        }
    }
}
