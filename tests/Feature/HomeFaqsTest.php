<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomeFaqsTest extends TestCase
{
    public function test_homepage_lists_every_faq_as_a_closed_accordion_item(): void
    {
        $response = $this->get(route('home'))->assertOk();

        foreach (config('faqs.items') as $faq) {
            $response->assertSee($faq['question']);
        }

        $response->assertSee('<details name="home-faq" class="group">', false)
            ->assertDontSee('<details name="home-faq" class="group" open', false);
    }

    public function test_faq_section_has_a_visible_heading(): void
    {
        $this->get(route('home'))
            ->assertSeeInOrder(['id="faqs-heading"', 'FAQ', config('faqs.items')[0]['question']], false);
    }

    public function test_homepage_includes_faq_structured_data_for_search_engines(): void
    {
        $firstFaq = config('faqs.items')[0];

        $this->get(route('home'))
            ->assertSee('"@type":"FAQPage"', false)
            ->assertSee('"name":"' . $firstFaq['question'] . '"', false);
    }
}
