<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePatientRequest extends FormRequest
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
            'dni' => 'required|string|size:9|unique:patients,dni',
            'visit_code' => 'required|string|max:25|unique:patients,visit_code',
            'number' => 'integer|unique:patients,number',
            'birth_date' => 'required|date',
            'address' => 'required|string|max:500',
            'belongings' => 'nullable|string',
            'phone_number' => 'required|integer|unique:patients,phone_number',
            'extra_info' => 'nullable|string',
            'abuse_substances' => 'nullable|string|max:100',
            'exit_date' => 'nullable|date',
            'entry_date' => 'required|date',
            'name' => 'required|string|max:50',
            'surname' => 'required|string|max:100',
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
            'dni.required' => 'El DNI es obligatorio.',
            'dni.string' => 'El DNI debe ser una cadena de texto.',
            'dni.size' => 'El DNI debe tener 9 caracteres.',
            'dni.unique' => 'El DNI ya está siendo utilizado por otro paciente.',
            'visit_code.required' => 'El código de visita es obligatorio.',
            'visit_code.string' => 'El código de visita debe ser una cadena de texto.',
            'visit_code.max' => 'El código de visita no puede exceder los 25 caracteres.',
            'visit_code.unique' => 'El código de visita ya está siendo utilizado por otro paciente.',
            'number.required' => 'El número es obligatorio.',
            'number.integer' => 'El número debe ser un número entero.',
            'number.unique' => 'El número ya está siendo utilizado por otro paciente.',
            'birth_date.required' => 'La fecha de nacimiento es obligatoria.',
            'birth_date.date' => 'La fecha de nacimiento debe ser una fecha válida.',
            'address.required' => 'La dirección es obligatoria.',
            'address.string' => 'La dirección debe ser una cadena de texto.',
            'address.max' => 'La dirección no puede exceder los 500 caracteres.',
            'phone_number.required' => 'El número de teléfono es obligatorio.',
            'phone_number.integer' => 'El número de teléfono debe ser un número entero.',
            'phone_number.unique' => 'El número de teléfono ya está siendo utilizado por otro paciente.',
            'entry_date.required' => 'La fecha de entrada es obligatoria.',
            'entry_date.date' => 'La fecha de entrada debe ser una fecha válida.',
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.max' => 'El nombre no puede exceder los 50 caracteres.',
            'surname.required' => 'El apellido es obligatorio.',
            'surname.string' => 'El apellido debe ser una cadena de texto.',
            'surname.max' => 'El apellido no puede exceder los 100 caracteres.',
        ];
    }
}
