<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'state',
        'date',
    ];

    protected $dates = ['date'];

    protected $casts = [
        'state' => 'boolean',
    ];

    public function patients()
    {
        return $this->belongsToMany(Patient::class, 'attendances')
                    ->withPivot('justified', 'reducted', 'assists')
                    ->withTimestamps();
    }
}
