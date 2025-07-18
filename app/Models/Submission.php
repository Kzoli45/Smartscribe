<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = [
        'quiz_id',
        'user_id',
        'score',
    ];

    public function form()
    {
        return $this->belongsTo(Quiz::class, 'form_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
