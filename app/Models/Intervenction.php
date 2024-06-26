<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervenction extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'intervention',
        'patient_id',
        'user_id',
    ];

    protected $dates = ['date'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
