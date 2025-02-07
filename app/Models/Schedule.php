<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'test_date',

    ];

    // Relasi ke banyak TestRegistration
    public function testRegistrations(): HasMany
    {
        return $this->hasMany(TestRegistration::class);
    }
}
