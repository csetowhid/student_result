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
            'marks.*' => [
                'required',
                // 'in_array:marks.*',
            ],
            'student_id' => [
                'required',
            ],
            'subject_id' =>[
                'required',
                // 'in_array:subject_id.*'
            ],
        ];
    }

    public function messages()
    {
        return [
            'student_id.required' => 'Student ID Field Is Required',
            'marks.*.required' => 'Marks Field Is Required',
        ];
    }
}
