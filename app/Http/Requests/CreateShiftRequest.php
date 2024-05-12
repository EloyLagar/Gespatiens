<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateShiftRequest extends FormRequest
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
            'interesting_info' => 'nullable|string|max:500',
            'day_part' => 'required|in:mañana,tarde,noche',
            'activity' => 'required|string|max:100',
            'state' => 'required|boolean',
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
            'interesting_info.max' => 'La información interesante no puede exceder los 500 caracteres.',
            'day_part.required' => 'La parte del día es obligatoria.',
            'day_part.in' => 'La parte del día debe ser una de: mañana, tarde, noche.',
            'activity.required' => 'La actividad es obligatoria.',
            'activity.string' => 'La actividad debe ser una cadena de texto.',
            'activity.max' => 'La actividad no puede exceder los 100 caracteres.',
            'state.required' => 'El estado es obligatorio.',
            'state.boolean' => 'El estado debe ser un booleano.',
            'user_id.required' => 'El ID del usuario es obligatorio.',
            'user_id.exists' => 'El ID del usuario proporcionado no es válido.',
        ];
    }
}
