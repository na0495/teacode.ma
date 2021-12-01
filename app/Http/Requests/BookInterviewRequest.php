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
        return [
            'username' => 'required|max:100',
            'date' => 'required|date|after:now',
            'resume-file' => 'required|mimes:pdf,doc,docx'
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
            'username.required' => 'The <span class=text-decoration-underline>discord username</span> is required',
            'username.max' => 'The <span class=text-decoration-underline>discord username</span> must be less than 100 characters',
            'date.required' => 'The <span class=text-decoration-underline>availability date</span> is required',
            'date.date' => 'The given <span class=text-decoration-underline>date</span> is not valid',
            'date.after' => 'The <span class=text-decoration-underline>availability date</span> must be one of the input choices',
            'resume-file.required' => 'The <span class=text-decoration-underline>resume file</span> is required',
            'resume-file.mimes' => 'The <span class=text-decoration-underline>resume file</span> must be a file of type: pdf, doc, docx',
        ];
    }
}
