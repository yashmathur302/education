<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TutorRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email:rfc', 'max:120'],
            'phone' => ['required', 'regex:/^(\+91[\s-]?)?[6-9][0-9]{9}$/'],
            'class_or_course' => ['required', 'string', 'max:120'],
            'subject' => ['required', 'string', 'max:120'],
            'website' => ['prohibited'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'phone.regex' => 'Please enter a valid 10-digit mobile number.',
        ];
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'class_or_course' => 'class or course',
        ];
    }
}
