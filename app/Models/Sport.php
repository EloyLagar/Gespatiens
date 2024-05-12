<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_id',
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
