<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Final_report extends Model
{
    use HasFactory;

    protected $fillable = [
        'health_situation_at_discharge',
        'other_medical_attention',
        'familiar_situation_at_discharge',
        'discharge_fundamentals',
        'after_discharge_objectives',
        'educative_outgoings_value',
        'psycho_situation_at_discharge',
        'psycho_outgoings_value',
    ];

    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id');
    }

}
