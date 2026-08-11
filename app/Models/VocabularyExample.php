<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Vocabulary;

class VocabularyExample extends Model
{
    protected $fillable = [
        'vocabulary_id',
        'korean_sentence',
        'english_translation',
    ];
    public function vocabulary(): BelongsTo
    {

        return $this->belongsTo(Vocabulary::class);
    }
}