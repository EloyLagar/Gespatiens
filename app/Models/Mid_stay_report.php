<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mid_stay_report extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_id',
        'estimated_duration',
        'educational_objectives',
        'start_toxicological_state',
        'psycho_intervention',
        'medical_evolution_valoration',
        'social_objectives',
        'psycho_objectives',
        'health_objectives',
    ];

    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id', 'id');
    }
}
