<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|min:3|max:100',
            'topic' => 'required|string|min:3|max:50',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'number_of_posts' => 'required|integer|min:1|max:500',
            'collaborators' => 'required|string|max:255',
        ];
    }


    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio.',
            'title.min' => 'Il titolo deve avere almeno 3 caratteri.',
            'title.max' => 'Il titolo non può superare i 255 caratteri.',
            'topic.required' => 'Il topic è obbligatorio.',
            'start_date.required' => 'La data di inizio è obbligatoria.',
            'end_date.after_or_equal' => 'La data di fine deve essere uguale o successiva alla data di inizio.',
            'number_of_posts.required' => 'Il numero di post è obbligatorio.',
            'number_of_posts.min' => 'Il numero di post deve essere almeno 1.',
            'collaborators.required' => 'Il campo collaboratori è obbligatorio.',
        ];
    }
}
