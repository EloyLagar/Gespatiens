<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShiftRequest extends FormRequest
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
            'day_part' => 'sometimes|required|in:mañana,tarde,noche',
            'interesting_info' => 'sometimes|nullable|string|max:500',
            'activity' => 'sometimes|required|string|max:100',
            'user_id' => 'sometimes|required|exists:users,id',
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
            'day_part.required' => 'La parte del día es obligatoria.',
            'day_part.in' => 'La parte del día debe ser una de: mañana, tarde, noche.',
            'interesting_info.max' => 'La información interesante no puede exceder los 500 caracteres.',
            'activity.required' => 'La actividad es obligatoria.',
            'activity.string' => 'La actividad debe ser una cadena de texto.',
            'activity.max' => 'La actividad no puede exceder los 100 caracteres.',
            'user_id.required' => 'El ID del usuario es obligatorio.',
            'user_id.exists' => 'El ID del usuario proporcionado no es válido.',
        ];
    }
}
