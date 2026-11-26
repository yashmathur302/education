<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomeCountersTest extends TestCase
{
    public function test_counters_sit_right_below_the_about_section(): void
    {
        $this->get(route('home'))->assertSeeInOrder([
            'id="about-heading"',
            'data-counters',
            'id="why-choose-us-heading"',
        ], false);
    }

    public function test_every_counter_shows_its_final_value_and_label_in_the_html(): void
    {
        $response = $this->get(route('home'));

        foreach (config('tutoring.counters') as $counter) {
            $response
                ->assertSee('data-counter-target="' . $counter['value'] . '"', false)
                ->assertSee($counter['label'])
                ->assertSee('<span class="sr-only">' . $counter['value'] . $counter['suffix'] . '</span>', false);
        }
    }
}
