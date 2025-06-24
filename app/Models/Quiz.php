<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'creator_id',
        'title',
        'color',
        'password',
        'question_count',
        'submission_count',
        'average_score',
        'tags',
        'auto_grade',
        'is_public'
    ];

    protected $casts = [
        'tags' => 'array',
        'auto_grade' => 'boolean',
        'is_public' => 'boolean'
    ];

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }
}
