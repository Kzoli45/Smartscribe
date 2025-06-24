<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormField extends Model
{
    protected $fillable = [
        'form_id',
        'field_name',
        'field_description',
        'field_type',
        'field_label',
        'field_options',
        'is_required',
    ];

    protected $casts = [
        'field_options' => 'array',
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}
