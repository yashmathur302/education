<?php

namespace App\Http\Controllers\Concerns;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Shared responses for the website's enquiry forms.
 *
 * Forms are sent in the background by resources/js/modules/ajax-form.js,
 * which expects JSON. Without JavaScript the browser posts normally and
 * gets the usual redirect, so the forms work either way.
 */
trait RespondsToFormSubmissions
{
    /**
     * Flash the success message and send the visitor back to the form,
     * where the message is shown after the page reloads.
     */
    protected function submissionSucceeded(Request $request, string $formUrl, string $message): JsonResponse|RedirectResponse
    {
        $request->session()->flash('status', $message);

        if ($request->expectsJson()) {
            return response()->json(['redirect' => $formUrl]);
        }

        return redirect()->to($formUrl);
    }

    /**
     * Report that the email could not be sent. The visitor keeps what they typed.
     */
    protected function submissionFailed(Request $request, string $formUrl, string $message): JsonResponse|RedirectResponse
    {
        if ($request->expectsJson()) {
            return response()->json(['message' => $message], 503);
        }

        return redirect()->to($formUrl)->withInput()->with('error', $message);
    }
}
