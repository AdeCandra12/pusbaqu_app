<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\TestRegistration;

class TestCategory extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
    ];

    public function testRegistrations(): HasMany
    {
        return $this->hasMany(TestRegistration::class);
    }
}
