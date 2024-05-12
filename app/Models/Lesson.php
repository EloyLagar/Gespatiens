<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_id',
        'type',
        'utility',
        'satisfaction',
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
