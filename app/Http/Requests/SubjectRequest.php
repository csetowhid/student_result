<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubjectRequest extends FormRequest
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
            'subject_name' => [
                'required',
                Rule::unique('subjects')->ignore($this->route('subjects')),
            ],
        ];
    }

    public function messages()
    {
        return [
            'subject_name.unique' => 'This Subject Already Exists'
        ];
    }
}
