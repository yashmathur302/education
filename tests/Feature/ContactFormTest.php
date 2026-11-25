<?php

namespace Tests\Feature;

use App\Mail\ContactFormSubmitted;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    private const RECIPIENT = 'enquiries@example.test';

    protected function setUp(): void
    {
        parent::setUp();

        config(['site.contact_form.recipient' => self::RECIPIENT]);
        Mail::fake();
    }

    public function test_contact_page_shows_the_form(): void
    {
        $this->get(route('contact'))
            ->assertOk()
            ->assertSee('Contact Us')
            ->assertSee('Submit my information');
    }

    public function test_valid_submission_emails_the_recipient(): void
    {
        $this->post(route('contact.store'), $this->validSubmission())
            ->assertRedirect(route('contact') . '#contact-form')
            ->assertSessionHas('status');

        Mail::assertSent(ContactFormSubmitted::class, function (ContactFormSubmitted $mail) {
            return $mail->hasTo(self::RECIPIENT)
                && $mail->hasReplyTo('parent@example.test')
                && $mail->submission['first_name'] === 'Asha';
        });
    }

    public function test_missing_required_fields_are_rejected(): void
    {
        $this->post(route('contact.store'), [])
            ->assertSessionHasErrors([
                'first_name',
                'last_name',
                'email',
                'pin_code',
                'phone',
                'child_date_of_birth',
                'start_month',
                'visit_date',
                'privacy_consent',
            ]);

        Mail::assertNothingSent();
    }

    public function test_invalid_phone_pin_and_dates_are_rejected(): void
    {
        $this->post(route('contact.store'), $this->validSubmission([
            'phone' => '12345',
            'pin_code' => '0123',
            'child_date_of_birth' => now()->addDay()->toDateString(),
            'visit_date' => now()->subDay()->toDateString(),
        ]))->assertSessionHasErrors(['phone', 'pin_code', 'child_date_of_birth', 'visit_date']);

        Mail::assertNothingSent();
    }

    public function test_spam_bots_filling_the_hidden_field_are_rejected(): void
    {
        $this->post(route('contact.store'), $this->validSubmission(['website' => 'http://spam.test']))
            ->assertSessionHasErrors('website');

        Mail::assertNothingSent();
    }

    /**
     * @param  array<string, string>  $overrides
     * @return array<string, string>
     */
    private function validSubmission(array $overrides = []): array
    {
        return array_merge([
            'first_name' => 'Asha',
            'last_name' => 'Verma',
            'email' => 'parent@example.test',
            'pin_code' => '302001',
            'phone' => '9876543210',
            'child_date_of_birth' => now()->subYears(8)->toDateString(),
            'start_month' => now()->format('Y-m'),
            'visit_date' => now()->addWeek()->toDateString(),
            'message' => 'Looking for a maths tutor.',
            'privacy_consent' => '1',
        ], $overrides);
    }
}
