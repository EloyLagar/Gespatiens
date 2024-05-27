<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'psycho_diagnosis',
        'NIP',
        'psycho_evaluation',
        'partners_relationships',
        'family_relationship',
        'about_families',
        'dealing_with_employees',
        'social_diagnosis',
        'social_familiar_situation',
        'judicial_situation',
        'toxicological_controls',
        'adaptation_and_implication',
        'life_general_situation',
        'motivation',
        'date',
        'request_number',
        'initial_health',
        'psychological',
        'evaluation',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'writes_about')
                    ->withPivot('patient_id')
                    ->withTimestamps();
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function finalReport()
    {
        return $this->hasOne(Final_report::class, 'report_id', 'id');
    }

    public function midStayReport()
    {
        return $this->hasOne(Mid_stay_report::class, 'report_id', 'id');
    }
}
