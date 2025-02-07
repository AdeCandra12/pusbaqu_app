<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseCategory extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',

    ];

    // Relasi ke tabel Course
    public function CourseRegistrations(): HasMany
    {
        return $this->hasMany(CourseRegistration::class);
    }
}
