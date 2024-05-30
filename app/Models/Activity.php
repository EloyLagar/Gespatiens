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
        return $this->belongsToMany(Patient::class, 'attend')->withPivot('reducted', 'assists', 'justified');
    }

    public function assistants()
    {
        return $this->alumnos()->wherePivot('assists', true);
    }

    public function reducteds()
    {
        return $this->alumnos()->wherePivot('reducted', true);
    }

    public function justifieds()
    {
        return $this->alumnos()->wherePivot('justified', true);
    }

    public function no_justifieds()
    {
        return $this->alumnos()->wherePivot('reducted', false)
                               ->wherePivot('assists', false)
                               ->wherePivot('justified', false);
    }
}
