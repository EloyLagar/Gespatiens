<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'text'
    ];

    protected $cast = [
        'user_id' => 'integer',
        'text' => 'string'
    ];

    protected $dates = ['date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
