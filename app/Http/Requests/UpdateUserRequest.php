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
            'speciality' => 'nullable|string|in:none,educator,worker,medical,psychologist,admin',
            'signature' => 'nullable|image|mimes:jpeg,png,jpg',
            'phone_number' => 'sometimes|integer|unique:users,phone_number,' . $this->user,
            'password' => 'sometimes|string|confirmed|min:8|nullable'
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
            'phone_number.required' => 'required',
            'phone_number.integer' => 'integer',
            'phone_number.unique' => 'unique',
            'speciality.required' => 'required',
            'speciality.string' => 'string',
            'speciality.in' => 'in',
            'password.required' => 'required',
            'password.string' => 'string',
            'password.confirmed' => 'password_confirmed',
            'password.min' => 'min',
        ];
    }


}
