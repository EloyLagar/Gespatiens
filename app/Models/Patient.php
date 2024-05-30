<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'dni',
        'visit_code',
        'number',
        'birth_date',
        'address',
        'belongings',
        'phone_number',
        'extra_info',
        'abuse_substances',
        'exit_date',
        'entry_date',
        'name',
        'surname',
    ];

    protected $dates = ['birth_date', 'exit_date', 'entry_date']; //Campos tratados por Carbon directamente

    protected $casts = [
        'number' => 'integer',
        'phone_number' => 'integer',
    ];

    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'attendances')
            ->withPivot('justified', 'reducted', 'assists')
            ->withTimestamps();
    }

    public function reports()
    {
        return $this->belongsToMany(Report::class, 'writes_about')
            ->withPivot('user_id')
            ->withTimestamps();
    }

    public function tutors()
    {
        return $this->belongsToMany(User::class, 'tutors')
            ->withTimestamps();
        //$patient->tutors()->attach($user->id); Asignación de tutor
    }

    public function interventions()
    {
        return $this->belongsToMany(User::class, 'interventions')
            ->withPivot('intervention')
            ->withTimestamps();

        //$patient->interventions()->attach($user->id, ['intervention' => $intervencion]);
    }

    public function reductions()
    {
        return $this->hasMany(Reduction::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }

    public function visitors()
    {
        return $this->hasMany(Visitor::class);
    }

    public function getFullNameAttribute()
    {
        return $this->getAttribute('name') . ' ' . $this->getAttribute('surname');
    }

    public function getFinalReports()
    {
        //Se accede a los reportes finales a través de reports (Patients-> 1:N Reports -> 1:1 Final_reports)
        return $this->hasManyThrough(Final_report::class, Report::class);
    }
    public function getMidStayReports()
    {
        //Se accede a los reportes de media estancia a través de reports (Patients-> 1:N Reports -> 1:1 Mid_stay_reports)
        return $this->hasManyThrough(Mid_stay_report::class, Report::class);
    }


}
