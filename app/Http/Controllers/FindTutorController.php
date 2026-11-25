<?php

namespace App\Http\Controllers;

use App\Http\Requests\TutorRequest;
use App\Mail\TutorRequestSubmitted;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Throwable;

class FindTutorController extends Controller
{
    public function store(TutorRequest $request): RedirectResponse
    {
        $submission = $request->safe()->except(['website']);

        try {
            Mail::to(config('site.tutor_request.recipient'))->send(new TutorRequestSubmitted($submission));
        } catch (Throwable $exception) {
            report($exception);

            return $this->backToForm()
                ->withInput()
                ->with('error', 'Sorry, we could not send your request right now. Please try again or call us on ' . config('site.phone.display') . '.');
        }

        return $this->backToForm()
            ->with('status', 'Thank you! We have received your request and will contact you shortly with a suitable tutor.');
    }

    private function backToForm(): RedirectResponse
    {
        return redirect()->to(route('find-tutor') . '#find-tutor-form');
    }
}
