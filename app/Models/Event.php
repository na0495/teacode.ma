<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'url',
        'start_date',
        'start_time',
        'end_time',
        'end_date',
        'background_color',
        'text_color',
        'days_of_week',
        'extended_props',
    ];

    protected $casts = [
        'days_of_week' => 'array',
        'extended_props' => 'array',
    ];
}
