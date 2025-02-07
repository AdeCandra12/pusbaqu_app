<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudyProgram extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'faculty',
    ];


    // Relasi ke banyak TestRegistration
    public function testRegistrations(): HasMany
    {
        return $this->hasMany(TestRegistration::class);
    }

    // Relasi ke banyak CourseRegistration
    public function courseRegistrations(): HasMany
    {
        return $this->hasMany(CourseRegistration::class);
    }
}
