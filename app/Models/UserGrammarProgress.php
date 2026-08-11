<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Grammar;

class UserGrammarProgress extends Model
{
    protected $fillable = [
    'user_id',
    'grammar_id',
    'status',
    'mastery_score',
    'last_studied_at',
];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function grammar(): BelongsTo
    {
        return $this->belongsTo(Grammar::class);
    }
}