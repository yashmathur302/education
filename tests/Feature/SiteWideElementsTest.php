<?php

namespace Tests\Feature;

use Tests\TestCase;

class SiteWideElementsTest extends TestCase
{
    public function test_every_page_has_the_whatsapp_button_above_back_to_top(): void
    {
        $whatsapp = config('site.whatsapp');
        $expectedLink = 'https://wa.me/' . $whatsapp['number'] . '?text=' . rawurlencode($whatsapp['message']);

        foreach (['home', 'about', 'services', 'blog', 'contact', 'find-tutor'] as $route) {
            $this->get(route($route))
                ->assertSee('href="' . $expectedLink . '"', false)
                ->assertSeeInOrder(['Chat with us on WhatsApp', 'data-back-to-top'], false);
        }
    }

    public function test_footer_shows_address_phone_and_email_without_google_map_link(): void
    {
        $this->get(route('home'))
            ->assertSeeInOrder(config('site.address.lines'))
            ->assertSee('href="tel:' . config('site.phone.dial') . '"', false)
            ->assertSee('href="mailto:' . config('site.email') . '"', false)
            ->assertDontSee('Google map')
            ->assertDontSee('Phone:');
    }
}
