<?php

return [
    'name' => [
        'required' => 'El nombre es obligatorio.',
        'string' => 'El nombre debe ser una cadena de caracteres.',
        'max' => 'El nombre no puede tener más de 50 caracteres.',
    ],
    'phone_number' => [
        'required' => 'El número de teléfono es obligatorio.',
        'integer' => 'El número de teléfono debe ser un número entero.',
        'unique' => 'El número de teléfono ya está en uso por otro empleado.',
    ],
    'speciality' => [
        'required' => 'La especialidad es obligatoria.',
        'string' => 'La especialidad debe ser una cadena de caracteres.',
        'in' => 'La especialidad seleccionada es inválida.',
    ],
    'password' => [
        'required' => 'El campo de contraseña es obligatorio.',
        'string' => 'El campo de contraseña debe ser una cadena de caracteres.',
        'confirmed' => 'Las contraseñas no coinciden.',
        'min' => 'La contraseña debe tener al menos 8 caracteres.',
    ],
    'string' => 'El campo debe ser una cadena de caracteres.',
    'number' => 'El campo debe ser un número.',

];
