<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Speciality extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    /**
     * A speciality can belong to many doctors.
     */
    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'doctor_speciality', 'speciality_id', 'doctor_id')
                    ->withTimestamps();
    }
}
