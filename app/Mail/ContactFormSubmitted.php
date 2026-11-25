<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

/**
 * Email sent to the site owner when someone submits the Contact Us form.
 */
class ContactFormSubmitted extends Mailable
{
    /**
     * @param  array<string, string>  $submission  validated form data
     */
    public function __construct(public readonly array $submission)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New contact enquiry from ' . $this->fullName(),
            replyTo: [new Address($this->submission['email'], $this->fullName())],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.enquiry',
            with: [
                'heading' => 'New contact enquiry',
                'pageName' => 'Contact Us',
                'details' => [
                    'Name' => $this->fullName(),
                    'Email' => $this->submission['email'],
                    'Phone' => $this->submission['phone'],
                    'Message' => $this->submission['message'],
                ],
            ],
        );
    }

    private function fullName(): string
    {
        return $this->submission['first_name'] . ' ' . $this->submission['last_name'];
    }
}
