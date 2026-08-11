<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Vocabulary;

class UserVocabularyProgress extends Model
{
    protected $fillable = [
        'user_id',
        'vocabulary_id',
        'status',
        'correct_count',
        'wrong_count',
        'last_reviewed_at',
        'next_review_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function vocabulary(): BelongsTo
    {
        return $this->belongsTo(Vocabulary::class);
    }
}