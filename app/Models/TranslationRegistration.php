<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TranslationRegistration extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'translation_category_id',
        'document_file',
        'status',
        'payment_proof',
    ];

    // Relasi ke tabel Registrant
    public function registrant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // relasi ke tabel CategoryTranslate

    public function translationCategory(): BelongsTo
    {
        return $this->belongsTo(translationCategory::class, 'translation_category_id');
    }
}
