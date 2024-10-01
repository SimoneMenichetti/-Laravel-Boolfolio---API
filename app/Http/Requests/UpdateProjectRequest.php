<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'type_id' => 'required|exists:types,id',
            // inserisco le validation per  technology
            'technologies' => 'array',
            'technologies' => 'required|exists:technologies,id'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il nome del progetto è obbligatorio.',
            'description.required' => 'La descrizione del progetto è obbligatoria.',
            'type_id.required' => 'La tipologia è obbligatoria.',
            'type_id.exists' => 'La tipologia selezionata non esiste.',
            'technologies.array' => 'Le technologie devono essere valide',
            'technologies.*.exist' => 'Una o più technologie non sono valide',
        ];
    }
}
