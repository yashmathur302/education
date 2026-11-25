<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

/**
 * Email sent to the site owner when someone submits the Find a Tutor form.
 */
class TutorRequestSubmitted extends Mailable
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
            subject: 'New tutor request from ' . $this->submission['name'],
            replyTo: [new Address($this->submission['email'], $this->submission['name'])],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.enquiry',
            with: [
                'heading' => 'New tutor request',
                'pageName' => 'Find a Tutor',
                'details' => [
                    'Name' => $this->submission['name'],
                    'Email' => $this->submission['email'],
                    'Phone' => $this->submission['phone'],
                    'Class / course' => $this->submission['class_or_course'],
                    'Subject' => $this->submission['subject'],
                ],
            ],
        );
    }
}
