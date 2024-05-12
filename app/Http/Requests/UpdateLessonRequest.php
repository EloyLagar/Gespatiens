<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLessonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true; // Cambia esto según tus necesidades de autorización
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type' => 'sometimes|in:Habilidades para la vida,Escuela de salud,Orientación e inserción laboral,Taller ocupacional,Vídeo fórum,Mantenimiento',
            'utility' => 'sometimes|numeric',
            'satisfaction' => 'sometimes|numeric',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'type.required' => 'El tipo de lección es obligatorio.',
            'type.in' => 'El tipo de lección debe ser uno entre: Habilidades para la vida, Escuela de salud, Orientación e inserción laboral, Taller ocupacional, Vídeo fórum, Mantenimiento.',
            'utility.required' => 'La utilidad es obligatoria.',
            'utility.numeric' => 'La utilidad debe ser un número.',
            'satisfaction.required' => 'La satisfacción es obligatoria.',
            'satisfaction.numeric' => 'La satisfacción debe ser un número.',
        ];
    }
}
