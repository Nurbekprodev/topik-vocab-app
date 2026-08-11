<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Quiz;

class QuizAttempt extends Model
{protected $fillable = [
    'user_id',
    'quiz_id',
    'score',
    'total_questions',
    'completed_at',
];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class);
    }
}