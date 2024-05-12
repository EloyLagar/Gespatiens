<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reduction extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'partial_reduction',
        'total_reduction',
        'sport_reduction',
        'patient_id',
    ];

    protected $dates = ['date'];

    protected $casts = [
        'total_reduction' => 'boolean',
        'sport_reduction' => 'boolean',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
