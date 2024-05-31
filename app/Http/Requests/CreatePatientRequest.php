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
            'phone_number' => 'required|text|unique:patients,phone_number',
            'extra_info' => 'nullable|string',
            'abuse_substances' => 'nullable|string|max:100',
            'exit_date' => 'nullable|date',
            'entry_date' => 'required|date',
            'name' => 'required|string|max:50',
            'surname' => 'required|string|max:100',
            'sip' => 'nullable|string|max:25',
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
            'dni.required' => 'required',
            'dni.string' => 'string',
            'dni.size' => 'size',
            'dni.unique' => 'unique',
            'visit_code.required' => 'required',
            'visit_code.string' => 'string',
            'visit_code.max' => 'max',
            'visit_code.unique' => 'unique',
            'number.required' => 'required',
            'number.integer' => 'integer',
            'number.unique' => 'unique',
            'birth_date.required' => 'required',
            'birth_date.date' => 'date',
            'address.required' => 'required',
            'address.string' => 'string',
            'address.max' => 'max',
            'phone_number.required' => 'required',
            'phone_number.integer' => 'integer',
            'phone_number.unique' => 'unique',
            'entry_date.required' => 'required',
            'entry_date.date' => 'date',
            'name.required' => 'required',
            'name.string' => 'string',
            'name.max' => 'max',
            'surname.required' => 'required',
            'surname.string' => 'string',
            'surname.max' => 'max',
            'sip.string' => 'string',
            'sip.max' => 'max',
        ];
    }
}
