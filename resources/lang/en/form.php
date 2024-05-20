<?php

return [
    'name' => [
        'required' => 'The name is required.',
        'string' => 'The name must be a string.',
        'max' => 'The name may not be greater than 50 characters.',
    ],
    'phone_number' => [
        'required' => 'The phone number is required.',
        'integer' => 'The phone number must be an integer.',
        'unique' => 'The phone number is already in use by another employee.',
    ],
    'speciality' => [
        'required' => 'The speciality is required.',
        'string' => 'The speciality must be a string.',
        'in' => 'The selected speciality is invalid.',
    ],
    'password' => [
        'required' => 'The password field is required.',
        'string' => 'The password field must be a string.',
        'confirmed' => 'The passwords do not match.',
        'min' => 'The password field must be at least 8 characters long.',
    ],
];
