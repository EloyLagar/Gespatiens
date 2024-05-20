<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'mark',
        'date',
        'lesson_type',
        'user_id',
    ];

    protected $casts = [
        'mark' => 'float',
        'date' => 'date',
        'lesson_type' => 'string',
        'user_id' => 'integer',
    ];

    public function patient()
    {
         return $this->belongsTo(Patient::class);
    }
}
