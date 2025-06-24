<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = [
        'creator_id',
        'title',
        'description',
        'color',
        'password',
        'field_count',
        'submission_count',
        'tags',
        'is_public',
    ];

    protected $casts = [
        'tags' => 'array',
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
