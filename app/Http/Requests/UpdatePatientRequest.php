<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientRequest extends FormRequest
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
            'number' => 'sometimes|required|integer',
            'visit_code' => 'sometimes|required|string|max:25',
            'address' => 'sometimes|required|string|max:500',
            'belongings' => 'nullable|string',
            'extra_info' => 'nullable|string',
            'abuse_substances' => 'nullable|string|max:100',
            'entry_date' => 'sometimes|required|date',
            'exit_date' => 'nullable|date',
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
            'number.required' => 'El número es obligatorio.',
            'number.integer' => 'El número debe ser un número entero.',
            'visit_code.required' => 'El código de visita es obligatorio.',
            'visit_code.string' => 'El código de visita debe ser una cadena de texto.',
            'visit_code.max' => 'El código de visita no puede exceder los 25 caracteres.',
            'address.required' => 'La dirección es obligatoria.',
            'address.string' => 'La dirección debe ser una cadena de texto.',
            'address.max' => 'La dirección no puede exceder los 500 caracteres.',
            'entry_date.required' => 'La fecha de entrada es obligatoria.',
            'entry_date.date' => 'La fecha de entrada debe ser una fecha válida.',
            'exit_date.date' => 'La fecha de salida debe ser una fecha válida.',
            'abuse_substances.max' => 'El campo de sustancias abusivas no puede exceder los 100 caracteres.',
        ];
    }
}
