<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTechnologyRequest extends FormRequest
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
        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:50',
                Rule::unique('technologies')->ignore($this->technology->id),
            ],
            'description' => 'nullable|string',
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'Il nome della tecnologia è obbligatorio.',
            'name.unique' => 'Esiste già una tecnologia con questo nome.',
            'name.max' => 'Il nome della tecnologia non può superare i 50 caratteri.',
        ];
    }
}
