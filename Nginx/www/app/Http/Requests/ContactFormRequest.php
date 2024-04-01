<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|max:35',
            'email' => 'required|email|max:35',
            'phone' => 'required',
            'message' => 'nullable|max:500',
            'checkbox' => 'nullable',
        ];

        if ($this->input('checkbox') === 'on') {
            $rules['file'] = 'nullable|image';
        }

        return $rules;
    }
}
