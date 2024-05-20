<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'speciality',
        'signature',
        'phone_number',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $enums = [
        'speciality' => SpecialityEnum::class,
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'name' => 'string',
    ];

    public function patients()
    {
        return $this->belongsToMany(Patient::class, 'tutors')
                    ->withTimestamps();
    }

    public function reports()
    {
        return $this->belongsToMany(Report::class, 'writes_about')
                    ->withPivot('user_id')
                    ->withTimestamps();
    }

    public function notices()
    {
        return $this->hasMany(Notice::class);
    }

    public function interventions()
    {
        return $this->belongsToMany(Patient::class, 'interventions')
                    ->withPivot('intervention')
                    ->withTimestamps();
        //$patient->interventions()->attach($user->id, ['intervention' => $intervencion]);
    }


}
