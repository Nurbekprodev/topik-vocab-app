<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Vocabulary;
use App\Models\Grammar;

class Bookmark extends Model
{
    protected $fillable = [
        'user_id',
        'vocabulary_id',
        'grammar_id',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function vocabulary(): BelongsTo
    {
        return $this->belongsTo(Vocabulary::class);
    }

    public function grammar(): BelongsTo
    {
        return $this->belongsTo(Grammar::class);
    }
}