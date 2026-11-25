<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactFormSubmitted;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Throwable;

class ContactController extends Controller
{
    public function store(ContactRequest $request): RedirectResponse
    {
        $submission = $request->safe()->except(['website']);

        try {
            Mail::to(config('site.contact_form.recipient'))->send(new ContactFormSubmitted($submission));
        } catch (Throwable $exception) {
            report($exception);

            return $this->backToForm()
                ->withInput()
                ->with('error', 'Sorry, we could not send your message right now. Please try again or call us on ' . config('site.phone.display') . '.');
        }

        return $this->backToForm()
            ->with('status', 'Thank you! Your message has been sent. Our team will contact you shortly.');
    }

    private function backToForm(): RedirectResponse
    {
        return redirect()->to(route('contact') . '#contact-form');
    }
}
