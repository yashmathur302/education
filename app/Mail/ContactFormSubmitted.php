<?php

namespace App\Mail;

use App\Support\StartMonthOptions;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Support\Carbon;

/**
 * Email sent to the site owner when someone submits the Contact Us form.
 */
class ContactFormSubmitted extends Mailable
{
    /**
     * @param  array<string, string|null>  $submission  validated form data
     */
    public function __construct(public readonly array $submission)
    {
    }

    public function envelope(): Envelope
    {
        $fullName = $this->submission['first_name'] . ' ' . $this->submission['last_name'];

        return new Envelope(
            subject: 'New contact enquiry from ' . $fullName,
            replyTo: [new Address($this->submission['email'], $fullName)],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-form-submitted',
            with: ['details' => $this->details()],
        );
    }

    /**
     * Human-readable label => value pairs for the email body.
     *
     * @return array<string, string>
     */
    private function details(): array
    {
        $data = $this->submission;

        return [
            'Name' => $data['first_name'] . ' ' . $data['last_name'],
            'Email' => $data['email'],
            'Phone' => $data['phone'],
            'PIN code' => $data['pin_code'],
            "Child's date of birth" => Carbon::parse($data['child_date_of_birth'])->format('j F Y'),
            'Would like to start in' => StartMonthOptions::label($data['start_month']),
            'Preferred visit date' => Carbon::parse($data['visit_date'])->format('j F Y'),
            'Questions' => $data['message'] ?: 'None',
        ];
    }
}
