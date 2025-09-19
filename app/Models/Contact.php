<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
       'address',
        'address_two',   // ✅ second address
        'email',
        'phone',
        'phone_two',     // ✅ second phone
        'working_days',
        'weekend_days',
    ];
}
