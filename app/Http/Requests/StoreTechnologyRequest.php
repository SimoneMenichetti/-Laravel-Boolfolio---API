<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTechnologyRequest extends FormRequest
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

            'name' => 'required|string|min:3|max:50|unique:technologies,name',
            'slug' => 'string|max:255|unique:technologies,slug',
            'description' => 'nullable|string|min:3|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Il nome della tecnologia è obbligatorio.',
            'name.unique' => 'Esiste già una tecnologia con questo nome.',
            'name.max' => 'Il nome della tecnologia non può superare i 50 caratteri.',
        ];
    }
}
