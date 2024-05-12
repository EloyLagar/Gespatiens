<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateReductionRequest extends FormRequest
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
            'date' => 'required|date',
            'partial_reduction' => 'nullable|string|max:100',
            'total_reduction' => 'required|boolean',
            'sport_reduction' => 'required|boolean',
            'patient_id' => 'required|exists:patients,id',
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
            'partial_reduction.max' => 'La reducción parcial no puede exceder los 100 caracteres.',
            'total_reduction.required' => 'El campo de reducción total es obligatorio.',
            'total_reduction.boolean' => 'El campo de reducción total debe ser un booleano.',
            'sport_reduction.required' => 'El campo de reducción deportiva es obligatorio.',
            'sport_reduction.boolean' => 'El campo de reducción deportiva debe ser un booleano.',
            'patient_id.required' => 'El ID del paciente es obligatorio.',
            'patient_id.exists' => 'El ID del paciente proporcionado no es válido.',
        ];
    }
}
