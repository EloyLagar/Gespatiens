<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'dni',
        'visit_code',
        'number',
        'birth_date',
        'address',
        'belongings',
        'phone_number',
        'extra_info',
        'abuse_substances',
        'exit_date',
        'entry_date',
        'name',
        'surname',
    ];

    protected $dates = ['birth_date', 'exit_date', 'entry_date']; //Campos tratados por Carbon directamente

    protected $casts = [
        'number' => 'integer',
        'phone_number' => 'integer',
    ];
}
