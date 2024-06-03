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
        'satisfaction',
        'utility'
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
        return $this->belongsToMany(Patient::class, 'attend')->withPivot('assists')->wherePivot('assists', true);
    }


    public function reducteds()
    {
        return $this->belongsToMany(Patient::class, 'attend')->withPivot('reducted')->wherePivot('reducted', true);
    }

    public function justifieds()
    {
        return $this->belongsToMany(Patient::class, 'attend')->withPivot('justified')->wherePivot('justified', true);
    }

    public function no_justifieds()
    {
        return $this->belongsToMany(Patient::class, 'attend')->withPivot('assists', 'reducted', 'justified')->wherePivot('reducted', false)
            ->wherePivot('assists', false)
            ->wherePivot('justified', false);
    }


    //Relaciones con los tipos de actividad
    public function sport()
    {
        return $this->hasOne(Sport::class, 'activity_id', 'id');
    }

    public function walk()
    {
        return $this->hasOne(Walk::class, 'activity_id', 'id');
    }

    public function therapeuticGroup()
    {
        return $this->hasOne(Therapeutic_group::class, 'activity_id', 'id');
    }

    public function lesson()
    {
        return $this->hasOne(Lesson::class, 'activity_id', 'id');
    }

    public function getTypeAttribute()
    {
        if ($this->lesson) {
            return 'lesson';
        } elseif ($this->therapeuticGroup) {
            return 'therapeutic_group';
        } elseif ($this->sport) {
            return 'sport';
        } elseif ($this->walk) {
            return 'walk';
        }
    }
}
