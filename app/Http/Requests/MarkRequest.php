<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MarkRequest extends FormRequest
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
            'marks' => [
                'required',
            ],
            'student_id' => [
                'required',
            ],
            'subject_id' =>[
                Rule::unique('marks')->ignore($this->route('marks')),
                'required',
            ],
        ];
    }

    public function messages()
    {
        return [
            'subject_id.unique' => 'Subject Already Exists For This Student'
        ];
    }
}