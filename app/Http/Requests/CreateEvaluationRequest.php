<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEvaluationRequest extends FormRequest
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
    public function rules()
    {
        return [
            'mark' => 'required|numeric|min:0|max:10',
            'date' => 'required|date',
            'lesson_type' => 'required|string|in:Grupos terapéuticos,Habilidades para la vida,Escuela de salud,Orientación e inserción laboral,Taller ocupacional,Vídeo fórum,Mantenimiento',
            'user_id' => 'required|exists:users,id',
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
            'mark.required' => 'La nota es obligatoria.',
            'mark.numeric' => 'La nota debe ser un número.',
            'mark.min' => 'La nota no puede ser menor que 0.',
            'mark.max' => 'La nota no puede ser mayor que 10.',
            'date.required' => 'La fecha es obligatoria.',
            'date.date' => 'La fecha debe ser una fecha válida.',
            'lesson_type.required' => 'El tipo de lección es obligatorio.',
            'lesson_type.string' => 'El tipo de lección debe ser una cadena de texto.',
            'lesson_type.in' => 'El tipo de lección seleccionado no es válido.',
            'user_id.required' => 'El ID del usuario es obligatorio.',
            'user_id.exists' => 'El ID del usuario proporcionado no es válido.',
        ];
    }
}
