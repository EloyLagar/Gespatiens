<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateWalkRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'activity_id' => 'required|exists:activities,id',
        ];
    }

    public function messages()
    {
        return [
            'activity_id.required' => 'El ID de la actividad es obligatorio.',
            'activity_id.exists' => 'El ID de la actividad proporcionado no es válido.',
        ];
    }
}
