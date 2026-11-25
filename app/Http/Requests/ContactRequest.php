<?php

namespace App\Http\Requests;

use App\Support\StartMonthOptions;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:60'],
            'last_name' => ['required', 'string', 'max:60'],
            'email' => ['required', 'email:rfc', 'max:120'],
            'pin_code' => ['required', 'regex:/^[1-9][0-9]{5}$/'],
            'phone' => ['required', 'regex:/^(\+91[\s-]?)?[6-9][0-9]{9}$/'],
            'child_date_of_birth' => ['required', 'date', 'before:today', 'after:-25 years'],
            'start_month' => ['required', Rule::in(array_keys(StartMonthOptions::all()))],
            'visit_date' => ['required', 'date', 'after_or_equal:today'],
            'message' => ['nullable', 'string', 'max:2000'],
            'privacy_consent' => ['accepted'],
            'website' => ['prohibited'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'pin_code.regex' => 'Please enter a valid 6-digit PIN code.',
            'phone.regex' => 'Please enter a valid 10-digit mobile number.',
            'child_date_of_birth.before' => "Your child's date of birth must be in the past.",
            'child_date_of_birth.after' => "Please check your child's date of birth.",
            'start_month.in' => 'Please choose a month from the list.',
            'visit_date.after_or_equal' => 'Please choose today or a later date.',
            'privacy_consent.accepted' => 'Please agree to the privacy notice to continue.',
        ];
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'child_date_of_birth' => "child's date of birth",
            'start_month' => 'start month',
            'visit_date' => 'visit date',
            'pin_code' => 'PIN code',
        ];
    }
}
