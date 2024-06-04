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
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:256|unique:users,email,' . $this->user,
            'speciality' => 'required|string|in:educator,worker,medical,psychologist,admin',
            'signature' => 'nullable',
            'phone_number' => 'required|integer|unique:users,phone_number,' . $this->user,
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
            'name.required' => 'required',
            'name.string' => 'string',
            'name.max' => 'max',
            'email.required' => 'required',
            'email.string' => 'string',
            'email.email' => 'email',
            'email.max' => 'max',
            'email.unique' => 'unique',
            'speciality.required' => 'required',
            'speciality.string' => 'string',
            'speciality.in' => 'in',
            'phone_number.required' => 'required',
            'phone_number.integer' => 'integer',
            'phone_number.unique' => 'unique',
        ];
    }
}
