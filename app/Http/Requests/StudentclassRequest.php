<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentclassRequest extends FormRequest
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
            'class_name' =>[
                Rule::unique('studentclasses')->ignore($this->route('studentclasses')),
                'required',
            ],
        ];
    }

    public function messages()
    {
        return [
            'class_name.unique' => 'Class Already Exists'
        ];
    }
}
