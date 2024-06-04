<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outing extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'date',
        'exit_date',
        'return_date',
    ];

    public function patient()
    {
         return $this->belongsTo(Patient::class);
    }
}
