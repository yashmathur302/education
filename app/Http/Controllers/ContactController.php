<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\RespondsToFormSubmissions;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactFormSubmitted;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Throwable;

class ContactController extends Controller
{
    use RespondsToFormSubmissions;

    public function store(ContactRequest $request): JsonResponse|RedirectResponse
    {
        $formUrl = route('contact') . '#contact-form';
        $submission = $request->safe()->except(['website']);

        try {
            Mail::to(config('site.contact_form.recipient'))->send(new ContactFormSubmitted($submission));
        } catch (Throwable $exception) {
            report($exception);

            return $this->submissionFailed(
                $request,
                $formUrl,
                'Sorry, we could not send your message right now. Please try again or call us on ' . config('site.phone.display') . '.',
            );
        }

        return $this->submissionSucceeded(
            $request,
            $formUrl,
            'Thank you! Your message has been sent. Our team will contact you shortly.',
        );
    }
}
