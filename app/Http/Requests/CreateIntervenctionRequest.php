<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateIntervenctionRequest extends FormRequest
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
            'date' => 'required|date',
            'intervention' => 'required|string|max:300',
            'patient_id' => 'required|exists:patients,id',
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
            'date.required' => 'La fecha es obligatoria.',
            'date.date' => 'La fecha debe ser una fecha válida.',
            'intervention.required' => 'La intervención es obligatoria.',
            'intervention.string' => 'La intervención debe ser una cadena de texto.',
            'intervention.max' => 'La intervención no puede exceder los 300 caracteres.',
            'patient_id.required' => 'El ID del paciente es obligatorio.',
            'patient_id.exists' => 'El ID del paciente proporcionado no es válido.',
            'user_id.required' => 'El ID del usuario es obligatorio.',
            'user_id.exists' => 'El ID del usuario proporcionado no es válido.',
        ];
    }
}
