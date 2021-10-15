<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentRequest extends FormRequest
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
            'email' => [
                'required',
                Rule::unique('students')->ignore($this->route('students')),
                // Rule::unique('studentuploads')->ignore($this->route('studentuploads')),
            ],
            'first_name' => [
                'required',
            ],
            'last_name' =>[
                'required',
            ],
            'class_id' => [
                'required',
            ],
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'Email Must Be Unique'
        ];
    }
}
