<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Therapeutic_group extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_id',
        'group',
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
