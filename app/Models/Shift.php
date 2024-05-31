<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'interesting_info',
        'day_part',
        'state',
    ];

    protected $dates = ['date'];

    protected $casts = [
        'state' => 'boolean',
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'works_in');
    }
}
