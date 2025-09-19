<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutUs extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'content', 'mission', 'vision', 'idea', 'opening_hours'
    ];

    protected $casts = [
        'opening_hours' => 'array', // ✅ automatically casts JSON
    ];
}
