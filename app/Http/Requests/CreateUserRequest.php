<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:256|unique:employees,email,' . $this->employee,
            'password' => 'required|string|min:8|max:256',
            'speciality' => 'required|string|in:educador social,trabajador social,médico,psicólogo,admin',
            'signature' => 'nullable',
            'phone_number' => 'required|integer|unique:employees,phone_number,' . $this->employee,
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
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.max' => 'El nombre no puede exceder los 50 caracteres.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.string' => 'El correo electrónico debe ser una cadena de texto.',
            'email.email' => 'El formato del correo electrónico no es válido.',
            'email.max' => 'El correo electrónico no puede exceder los 256 caracteres.',
            'email.unique' => 'El correo electrónico ya está siendo utilizado por otro empleado.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.string' => 'La contraseña debe ser una cadena de texto.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.max' => 'La contraseña no puede exceder los 256 caracteres.',
            'speciality.required' => 'La especialidad es obligatoria.',
            'speciality.string' => 'La especialidad debe ser una cadena de texto.',
            'speciality.in' => 'La especialidad seleccionada no es válida.',
            'phone_number.required' => 'El número de teléfono es obligatorio.',
            'phone_number.integer' => 'El número de teléfono debe ser un número entero.',
            'phone_number.unique' => 'El número de teléfono ya está siendo utilizado por otro empleado.',
        ];
    }
}
