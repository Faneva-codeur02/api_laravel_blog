<?php

namespace App\Http\Validation;

class PictureValidation {
    public function rules() {
        return [
            'title' => ['required','string', 'max:150'],
            'description' => ['required', 'max:250'],
            'image' => ['required', 'image']
        ];
    }

    public function messages() {
        return [
            'title.required' => 'Vous devez spécifier un titre',
            'description.required' => 'Vous devez spécifier une description',
            'image.required' => 'Vous devez spécifier une image',
            'image.image' => 'Votre format d\'image n\'est pas valide'
        ];
    }
}