<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TestRegistration extends Model
{
    //

    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'test_category_id',
        'study_program_id',
        'schedule_id',
        'purpose',
        'payment_proof',
        'status',
    ];


    public function registrant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    // Relasi ke tabel CategoryTest
    public function testCategory(): BelongsTo
    {
        return $this->belongsTo(TestCategory::class, 'test_category_id');
    }

    // Relasi ke tabel StudyProgram
    public function studyProgram(): BelongsTo
    {
        return $this->belongsTo(StudyProgram::class, 'study_program_id');
    }

    // Relasi ke tabel Schedule
    public function schedule(): BelongsTo
    {
        return $this->belongsTo(Schedule::class, 'schedule_id');
    }
}
