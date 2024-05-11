<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evalutation extends Model
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
