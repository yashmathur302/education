<?php

namespace Tests\Feature;

use App\Mail\TutorRequestSubmitted;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class FindTutorFormTest extends TestCase
{
    private const RECIPIENT = 'tutors@example.test';

    protected function setUp(): void
    {
        parent::setUp();

        config(['site.tutor_request.recipient' => self::RECIPIENT]);
        Mail::fake();
    }

    public function test_find_tutor_page_shows_the_form(): void
    {
        $this->get(route('find-tutor'))
            ->assertOk()
            ->assertSee('Find a Tutor')
            ->assertSee('Which class or course do you need help with?')
            ->assertSee('Which subject do you need help with?');
    }

    public function test_valid_request_emails_the_recipient(): void
    {
        $this->post(route('find-tutor.store'), $this->validRequest())
            ->assertRedirect(route('find-tutor') . '#find-tutor-form')
            ->assertSessionHas('status');

        Mail::assertSent(TutorRequestSubmitted::class, function (TutorRequestSubmitted $mail) {
            return $mail->hasTo(self::RECIPIENT)
                && $mail->hasReplyTo('parent@example.test')
                && $mail->submission['class_or_course'] === 'Class 10 (CBSE)'
                && $mail->submission['subject'] === 'Mathematics';
        });
    }

    public function test_email_lists_every_field(): void
    {
        $html = (new TutorRequestSubmitted($this->validRequest()))->render();

        $this->assertStringContainsString('New tutor request', $html);
        $this->assertStringContainsString('Asha Verma', $html);
        $this->assertStringContainsString('Class 10 (CBSE)', $html);
        $this->assertStringContainsString('Mathematics', $html);
    }

    public function test_missing_fields_are_rejected(): void
    {
        $this->post(route('find-tutor.store'), [])
            ->assertSessionHasErrors(['first_name', 'last_name', 'email', 'phone', 'class_or_course', 'subject']);

        Mail::assertNothingSent();
    }

    public function test_invalid_phone_is_rejected(): void
    {
        $this->post(route('find-tutor.store'), $this->validRequest(['phone' => '98765']))
            ->assertSessionHasErrors('phone');

        Mail::assertNothingSent();
    }

    public function test_spam_bots_filling_the_hidden_field_are_rejected(): void
    {
        $this->post(route('find-tutor.store'), $this->validRequest(['website' => 'http://spam.test']))
            ->assertSessionHasErrors('website');

        Mail::assertNothingSent();
    }

    /**
     * @param  array<string, string>  $overrides
     * @return array<string, string>
     */
    private function validRequest(array $overrides = []): array
    {
        return array_merge([
            'first_name' => 'Asha',
            'last_name' => 'Verma',
            'email' => 'parent@example.test',
            'phone' => '9876543210',
            'class_or_course' => 'Class 10 (CBSE)',
            'subject' => 'Mathematics',
        ], $overrides);
    }
}
