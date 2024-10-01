<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:20',
            'description' => 'required|string|min:3|max:250',
            'type_id' => 'required|exists:types,id',
            'path_image' => 'nullable|file|image|max:2048',
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
            'type_id.required' => 'Selezionare una tipologia è obbligatorio.',
            'type_id.exists' => 'La tipologia selezionata non è valida.',
            'technologies.array' => 'Le technologie devono essere valide',
            'technologies.*.exist' => 'Una o più technologie non sono valide',
        ];
    }
}
