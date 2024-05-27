<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Final_report extends Model
{
    use HasFactory;

    protected $fillable = [
        'educational_therapeutic_outgoings',
        'leaving_date',
        'leaving_reason',
        'psycho_therapeutic_outgoings',
        'psycho_intervention_objectives',
        'discharge_psycho_situation',
        'health_evolution',
        'evolution_and_objectives_achieved',
        'discharge_medical_situation',
        'other_medical_care',
        'after_program_objectives',
        'toxicological_summary',
        'discharge_family_situation',
    ];

    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id', 'id');
    }
}
