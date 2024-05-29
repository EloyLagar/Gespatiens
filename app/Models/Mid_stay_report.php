<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mid_stay_report extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_duration_forecast',
        'psycho_objectives',
        'health_objectives',
        'nip',
    ];

    public function report()
    {
        return $this->hasOne(Report::class, 'id', 'report_id');
    }
}
