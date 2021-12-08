<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookInterviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $availabilities = json_decode(\File::get(base_path() . '/database/data/interview-availability.json'));
        return [
            'email' => 'required|email',
            'date' => 'required|date|in:' . implode(',', array_column($availabilities, 'date')),
            'resume-file' => 'nullable|mimes:pdf,doc,docx|max:3000',
            // 'g-recaptcha-response' => 'recaptcha'
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'The <span class=text-decoration-underline>email</span> is required',
            'email.email' => 'The <span class=text-decoration-underline>email</span> must be a valid email address',
            'date.required' => 'The <span class=text-decoration-underline>availability date</span> is required',
            'date.date' => 'The given <span class=text-decoration-underline>date</span> is not valid',
            'date.in' => 'The <span class=text-decoration-underline>availability date</span> must be one of the input choices',
            // 'resume-file.required' => 'The <span class=text-decoration-underline>CV file</span> is required',
            'resume-file.mimes' => 'The <span class=text-decoration-underline>CV file</span> must be a file of type: pdf, doc, docx',
            'resume-file.max' => 'The <span class=text-decoration-underline>CV file</span> must have a size of 3Mb or less',
            'g-recaptcha-response.recaptcha' => 'The <span class=text-decoration-underline>reCaptcha</span> is expired or was not provided',
        ];
    }
}
