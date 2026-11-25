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

    public function test_contact_page_shows_the_form_and_map(): void
    {
        $this->get(route('contact'))
            ->assertOk()
            ->assertSee('Send Us a Message')
            ->assertSee('maps.google.com/maps', false)
            ->assertSee(route('privacy-policy'), false);
    }

    public function test_valid_submission_emails_the_recipient(): void
    {
        $this->post(route('contact.store'), $this->validSubmission())
            ->assertRedirect(route('contact') . '#contact-form')
            ->assertSessionHas('status');

        Mail::assertSent(ContactFormSubmitted::class, function (ContactFormSubmitted $mail) {
            return $mail->hasTo(self::RECIPIENT)
                && $mail->hasReplyTo('parent@example.test')
                && $mail->submission['message'] === 'Looking for a maths tutor.';
        });
    }

    public function test_missing_required_fields_are_rejected(): void
    {
        $this->post(route('contact.store'), [])
            ->assertSessionHasErrors(['first_name', 'last_name', 'email', 'phone', 'message']);

        Mail::assertNothingSent();
    }

    public function test_invalid_email_and_phone_are_rejected(): void
    {
        $this->post(route('contact.store'), $this->validSubmission([
            'email' => 'not-an-email',
            'phone' => '12345',
        ]))->assertSessionHasErrors(['email', 'phone']);

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
            'phone' => '9876543210',
            'message' => 'Looking for a maths tutor.',
        ], $overrides);
    }
}
