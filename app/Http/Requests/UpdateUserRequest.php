<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'sometimes|string|max:50',
            'speciality' => 'sometimes|string|in:educator,worker,medical,psychologist,admin',
            'signature' => 'nullable',
            'phone_number' => 'sometimes|integer|unique:users,phone_number,' . $this->user,
            'password' => ['sometimes', 'string', 'confirmed', 'min : 8']
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function messages()
    {
        return [
            'name.required' => 'name.required',
            'name.string' => 'name.string',
            'name.max' => 'name.max',
            'phone_number.required' => 'phone_number.required',
            'phone_number.integer' => 'phone_number.integer',
            'phone_number.unique' => 'phone_number.unique',
            'speciality.required' => 'speciality.required',
            'speciality.string' => 'speciality.string',
            'speciality.in' => 'speciality.in',
            'password.required' => 'password.required',
            'password.string' => 'password.string',
            'password.confirmed' => 'password.confirmed',
            'password.min' => 'password.min',
        ];
    }


}
