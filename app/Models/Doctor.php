<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Doctor extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'image',
        'phone',
        'email',
        'location',
        'department_id',
        'working_hours', // store as JSON
        'bio',           // biography field
        'slug',          // add slug to fillable
    ];

    /**
     * Cast working_hours to array for automatic JSON handling.
     */
    protected $casts = [
        'working_hours' => 'array',
    ];

    /**
     * Automatically generate slug from name
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($doctor) {
            if (empty($doctor->slug)) {
                $doctor->slug = Str::slug($doctor->name);
            }
        });

        static::updating(function ($doctor) {
            if (empty($doctor->slug)) {
                $doctor->slug = Str::slug($doctor->name);
            }
        });
    }

    /**
     * Doctor belongs to one department.
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Doctor can have multiple specialities.
     */
    public function specialities()
    {
        return $this->belongsToMany(
            Speciality::class,
            'doctor_speciality',
            'doctor_id',
            'speciality_id'
        )->withTimestamps();
    }
}
