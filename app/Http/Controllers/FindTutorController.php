<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\RespondsToFormSubmissions;
use App\Http\Requests\TutorRequest;
use App\Mail\TutorRequestSubmitted;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Throwable;

class FindTutorController extends Controller
{
    use RespondsToFormSubmissions;

    public function store(TutorRequest $request): JsonResponse|RedirectResponse
    {
        $formUrl = route('find-tutor') . '#find-tutor-form';
        $submission = $request->safe()->except(['website']);

        try {
            Mail::to(config('site.tutor_request.recipient'))->send(new TutorRequestSubmitted($submission));
        } catch (Throwable $exception) {
            report($exception);

            return $this->submissionFailed(
                $request,
                $formUrl,
                'Sorry, we could not send your request right now. Please try again or call us on ' . config('site.phone.display') . '.',
            );
        }

        return $this->submissionSucceeded(
            $request,
            $formUrl,
            'Thank you! We have received your request and will contact you shortly with a suitable tutor.',
        );
    }
}
