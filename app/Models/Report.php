<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_familiars',
        'familiar_evo_and_realtionship',
        'habit_adaptation',
        'activities_adaptation',
        'normativity_adaptation',
        'workout_adaptation',
        'leisure_adaptation',
        'partners_relationship',
        'therapeutic_crew_relationship',
        'psycho_entry_valoration',
        'psycho_evaluation_with_instruments',
        'about_motivation',
        'psycho_interventions',
        'psycho_diagnosis',
        'social_familiar_situation',
        'laboral_educative_economical_situation',
        'judicial_situation',
        'social_evo_and_objectives',
        'social_diagnosis',
        'health_at_entry',
        'about_toxicology',
        'toxicological_controls',
        'health_diagnosis',
        'physical_health_condition',
        'state',
        'request_number',
    ];
    public function users()
    {
        return $this->belongsToMany(User::class, 'writes_about');
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
