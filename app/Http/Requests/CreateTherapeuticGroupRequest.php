<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTherapeuticGroupRequest extends FormRequest
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
            'activity_id' => 'required|exists:activities,id',
            'group' => 'required|string|max:70',
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
            'activity_id.required' => 'El ID de la actividad es obligatorio.',
            'activity_id.exists' => 'El ID de la actividad proporcionado no es válido.',
            'group.required' => 'El grupo terapéutico es obligatorio.',
            'group.string' => 'El grupo terapéutico debe ser una cadena de texto.',
            'group.max' => 'El grupo terapéutico no puede exceder los 70 caracteres.',
        ];
    }
}
